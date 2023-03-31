<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderExtraFees;
use App\Models\OrderSpecialDiscount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class OrderService
{



    protected $order;
    protected $orderExtraFess;

    protected $orderSpecialDiscount;



    public function __construct(Order $order, OrderExtraFees $orderExtraFess, OrderSpecialDiscount $orderSpecialDiscount)
    {

        $this->order = $order;
        $this->orderExtraFess = $orderExtraFess;
        $this->orderSpecialDiscount = $orderSpecialDiscount;

    }

    public function getAll(Request $request, $type, $order_by)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $order_by = $order_by == 'inprogress_at' || $order_by == 'delivered_at' || $order_by == 'cancelled_at' ? $order_by : 'created_at';
        $countries = $this->order::with([
            'inprogress_admin',
            'delivered_admin',
            'cancelled_admin',
        ])
            ->where(function ($query) use ($request) {
                return $query->when(
                    $request->search,
                    function ($q) use ($request) {
                            return $q->where('order_number', 'like', '%' . $request->search . '%')
                                ->orWhere('id', 'like', '%' . $request->search . '%');
                        }
                );

            })


            ->when($deleted, function ($q) use ($deleted) {
                return $q->onlyTrashed();
            })
            ->when($request->from, function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->from);
            })
            ->when($request->to, function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->to);
            })

            ->where(function ($query) use ($request) {
                return $query->when(
                    $request->order_id,
                    function ($q) use ($request) {
                            return $q->where('id', $request->order_id);
                        }
                );

            })
            ->where(function ($query) use ($request, $status) {
                return $query->when(
                    $status,
                    function ($q) use ($request) {
                            return $q->whereStatus($request->status);
                        }
                );
            })
            ->whereStatus($type)
            ->orderBy($order_by, $order)
            ->paginate($limit)
            ->withQueryString();


        return $countries;
    }



    public function inprogressAction(Order $order)
    {


        $order->inprogress_action_admin_id = Auth::guard('admin')->id();
        $order->status = 'inprogress';
        $order->inprogress_at = Carbon::now();

        $order->save();


        return $order ? true : false;


    }


    public function deliveredAction(Order $order)
    {


        $order->delivered_action_admin_id = Auth::guard('admin')->id();
        $order->status = 'delivered';
        $order->delivered_at = Carbon::now();

        $order->save();


        return $order ? true : false;
    }


    public function cancelledAction(Order $order)
    {


        $order->cancelled_action_admin_id = Auth::guard('admin')->id();
        $order->status = 'cancelled';
        $order->cancelled_from = 'admin';
        $order->cancelled_at = Carbon::now();
        $order->save();


        return $order ? true : false;
    }


    public function AddExtraFees(Order $order, Request $request)
    {

        $data = $request->only([
            'cost',
            'note',
        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
        $order->extra_fees()->create($data);
        $order->calcOrderTotalSum();
        $order->save();


        return $order ? true : false;
    }


    public function AddSpecialDiscount(Order $order, Request $request)
    {

        $data = $request->only([
            'cost',
            'note',
        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
        $order->special_discount()->create($data);
        $order->calcOrderTotalSum();
        $order->save();


        return $order ? true : false;
    }




    public function updateComment(Order $order, Request $request)
    {
        $order->comment = $request->comment;
        $order->save();
        return $order ? true : false;
    }


    public function updateCustomAddressFromAdmin(Order $order, Request $request)
    {
        $order->custom_address_from_admin = $request->custom_address_from_admin;
        $order->save();
        return $order ? true : false;
    }


    public function deleteExtraFees(Order $order, int $id)
    {
        $fees = $this->orderExtraFess::find($id);


        if (!$fees) {
            return false;
        }
        $fees->delete();
        $order->calcOrderTotalSum();
        $order->save();
        return true;




    }



    public function deleteSpecialDiscount(Order $order, int $id)
    {
        $discount = $this->orderSpecialDiscount::find($id);


        if (!$discount) {
            return false;
        }
        $discount->delete();
        $order->calcOrderTotalSum();
        $order->save();
        return true;


    }



    public function getById(int $id)
    {
        return $this->order::withTrashed()->find($id);

    }



    public function getActiveOrders()
    {
        return $this->order::whereStatus(1)->get();

    }
}
