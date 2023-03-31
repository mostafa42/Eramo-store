<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Exports\OrderExport;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{


    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        $this->middleware(['permission:orders-read'])->only(
            [
                'index',
                'export',
                'newOrders',
                'inprogressOrders',
                'deliveredOrders',
                'cancelledOrders',
                'show',
            ]
        );
        $this->middleware(['permission:orders-update'])->only([
            'inprogressAction',
            'deliveredAction',
            'updateComment',
            'updateCustomAddressFromAdmin',
            'cancelledAction',
        ]);

        $this->middleware(['permission:orders-extra-fees-create'])->only(['AddExtraFees']);
        $this->middleware(['permission:orders-extra-fees-delete'])->only(['deleteExtraFees']);


        $this->middleware(['permission:orders-special-discounts-create'])->only(['AddSpecialDiscount']);
        $this->middleware(['permission:orders-special-discounts-delete'])->only(['deleteSpecialDiscount']);

        // $this->middleware(['permission:orders-delete'])->only(['destroy']);
    }



    public function index()
    {



        return redirect()->route('admin.orders.newOrders');

        // return Order::with(['extra_fees', 'products'])->get();

        $data = ['shipping_id' => 2, 'promo_id' => 1];
        $order = Order::create($data);


        $total = 0;
        $items = [];
        $quantities = collect([1, 2, 3, 4]);
        foreach ([2] as $id) {



            $product = Product::find($id);

            if ($product) {

                $quantity = $quantities->random();

                $items[$product->id] = [
                    'price' => $product->real_price,
                    'quantity' => $quantity,
                    'total' => $product->price_after_taxes * $quantity,
                    'taxes' => $product->price_after_taxes - $product->real_price,
                ];

                $total += $product->price_after_taxes * $quantity;

            }


        }


        $order->products()->attach($items);
        $order->extra_fees()->create([
            'cost' => 100
        ]);
        $order->total = $total;
        $order->save();
        $order->generateUniqueOrderNumber();
        $order->calcPromoCode();
        $order->calcShipping();
        $order->calcOrderTotalSum();
        $order->save();




        return $order;


    }





    public function newOrders(Request $request)
    {



        $type = 'new';
        $order_by = 'created_at';

        $orders = $this->orderService->getAll($request, $type, $order_by);
        // return $orders;
        return \view('admin.order.index', \compact('orders', 'type'));
    }


    public function inprogressOrders(Request $request)
    {



        $type = 'inprogress';
        $order_by = 'inprogress_at';

        $orders = $this->orderService->getAll($request, $type, $order_by);
        // return $orders;
        return \view('admin.order.index', \compact('orders', 'type'));
    }



    public function deliveredOrders(Request $request)
    {



        $type = 'delivered';
        $order_by = 'delivered_at';

        $orders = $this->orderService->getAll($request, $type, $order_by);
        // return $orders;
        return \view('admin.order.index', \compact('orders', 'type'));
    }



    public function cancelledOrders(Request $request)
    {



        $type = 'cancelled';
        $order_by = 'cancelled_at';

        $orders = $this->orderService->getAll($request, $type, $order_by);
        // return $orders;
        return \view('admin.order.index', \compact('orders', 'type'));
    }




    public function export($type)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new OrderExport($type), Carbon::now() . '-' . $type . '-orders.xlsx');

    }



    public function show(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();


        }

        $order->load([
            'products',
            'country',
            'city',
            'inprogress_admin',
            'delivered_admin',
            'cancelled_admin'
        ]);

        // return $order;

        return \view('admin.order.show', \compact('order'));


    }



    public function inprogressAction(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();


        }


        $updated = $this->orderService->inprogressAction($order);

        if ($updated) {
            $request->session()->flash('success', 'Order Now In Progress ');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }


    public function deliveredAction(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();

        }


        $updated = $this->orderService->deliveredAction($order);

        if ($updated) {
            $request->session()->flash('success', 'Order delivered SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }





    public function cancelledAction(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();


        }


        $updated = $this->orderService->cancelledAction($order);

        if ($updated) {
            $request->session()->flash('success', 'Order Cancelled SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }





    public function AddExtraFees(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();

        }



        $validator = \Validator::make($request->all(), [
            'cost' => ['required', 'numeric'],
            'note' => ['required', 'string'],

        ]);

        if ($validator->fails()) {

            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();

        }
        $updated = $this->orderService->AddExtraFees($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Extra Fees Added SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }


    public function AddSpecialDiscount(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();

        }



        $validator = \Validator::make($request->all(), [
            'cost' => ['required', 'numeric'],
            'note' => ['required', 'string'],

        ]);

        if ($validator->fails()) {
            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();
        }
        $updated = $this->orderService->AddSpecialDiscount($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Special Discount Added SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }



    public function updateComment(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();

        }
        $request->validate([
            'comment' => ['required', 'string',
            ],
        ]);

        $updated = $this->orderService->updateComment($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Order Comment Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();

    }


    public function updateCustomAddressFromAdmin(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();

        }
        $request->validate([
            'custom_address_from_admin' => ['required', 'string',
            ],
        ]);

        $updated = $this->orderService->updateCustomAddressFromAdmin($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Order Custom Address Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();

    }



    public function deleteExtraFees(Request $request, $orderId, $id)
    {
        $order = $this->orderService->getById($orderId);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();

        }


        $deleted = $this->orderService->deleteExtraFees($order, $id);

        if ($deleted) {
            $request->session()->flash('success', 'Extra Fees Deleted SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }


    public function deleteSpecialDiscount(Request $request, $orderId, $id)
    {
        $order = $this->orderService->getById($orderId);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();

        }


        $deleted = $this->orderService->deleteSpecialDiscount($order, $id);

        if ($deleted) {
            $request->session()->flash('success', 'Special Discount Deleted SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }




}
