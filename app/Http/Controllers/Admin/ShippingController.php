<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Exports\ShippingExport;
use Illuminate\Validation\Rule;
use App\Services\ShippingService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ShippingController extends Controller
{
    protected $shippingService;
    protected $cityService;

    public function __construct(ShippingService $shippingService ,CityService $cityService ){
          $this->shippingService = $shippingService;
          $this->cityService = $cityService;

          $this->middleware(['permission:shippings-read'])->only(['index','export']);
          $this->middleware(['permission:shippings-create'])->only(['create', 'store']);
          $this->middleware(['permission:shippings-update'])->only(['update', 'edit']);
          $this->middleware(['permission:shippings-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $shippings =$this->shippingService->getAll($request);
        // return $shippings;
        return \view('admin.shipping.index' ,\compact('shippings'));
    }

    public function create( Request $request){
        $cities = $this->cityService->getActiveCities();


        return \view('admin.shipping.create' ,\compact( 'cities'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new ShippingExport,  Carbon::now() .'-shippings.xlsx');

    }



    public function store(Request $request)

    {


        $request->validate([
            'text_ar'=>['required','string','min:2' ],
            'text_en'=>['required','string','min:2'],
            'cost'=>['required','numeric', ],
            'city_id'=>['required','exists:cities,id', 'unique:shippings'],
            'status'=>['required','string', Rule::in([1,0])],
         ]);



        $created = $this->shippingService->store($request);

        if($created){
            $request->session()->flash('success', 'Shipping Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $shipping = $this->shippingService->getById($id);
        if(!$shipping ){
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();


        }

        $cities = $this->cityService->getActiveCities();

        return \view('admin.shipping.edit' ,\compact( 'shipping' ,'cities'));


    }


    public function update(Request $request, $id)
    {
        $shipping = $this->shippingService->getById($id);
        if(!$shipping ){
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();


        }
        $request->validate([
            'text_ar'=>['required','string','min:2' , ],
            'text_en'=>['required','string','min:2', ],
            'cost'=>['required','numeric', ],
            'city_id'=>['required','exists:cities,id' ,Rule::unique('shippings' ,'city_id')->ignore($shipping->id)],
            'status'=>['required','string', Rule::in([1,0])],
        ]);

        $updated = $this->shippingService->update($request , $shipping);

        if($updated){
            $request->session()->flash('success', 'Shipping Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $shipping = $this->shippingService->getById($id);
        if(!$shipping ){
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();

        }
        $shipping->delete();
        $request->session()->flash('success', 'Shipping Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $shipping = $this->shippingService->getById($id);
        if(!$shipping ){
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();
        }
        $shipping->restore();
        $request->session()->flash('success', 'Shipping Restored SuccessFully');

        return redirect()->back();



    }
}
