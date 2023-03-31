<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\RegionExport;
use App\Services\CityService;
use App\Services\RegionService;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class RegionController extends Controller
{
    protected $cityService;
    protected $regionService;

    public function __construct(CityService $cityService ,RegionService $regionService){
          $this->cityService = $cityService;
          $this->regionService = $regionService;

          $this->middleware(['permission:regions-read'])->only(['index','export']);
          $this->middleware(['permission:regions-create'])->only(['create', 'store']);
          $this->middleware(['permission:regions-update'])->only(['update', 'edit']);
          $this->middleware(['permission:regions-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $regions =$this->regionService->getAll($request);



        // return $regions;
        return \view('admin.region.index' ,\compact('regions'));
    }

    public function create( Request $request){



        $cities = $this->cityService->getActiveCities();



        return \view('admin.region.create' ,\compact('cities'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new RegionExport,  Carbon::now() .'-regions.xlsx');

    }



    public function store(Request $request)

    {


        $request->validate([
            'title_ar'=>['required','string','min:2' , 'unique:regions'],
            'title_en'=>['required','string','min:2','unique:regions'],
            'city_id'=>['required','exists:cities,id'],
            'status'=>['required','string', Rule::in([1,0])],
         ]);



        $created = $this->regionService->store($request);

        if($created){
            $request->session()->flash('success', 'Region Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $region = $this->regionService->getById($id);
        if(!$region ){
            $request->session()->flash('failed', 'Region Not Found');
            return redirect()->back();


        }
        $cities = $this->cityService->getActiveCities();


        return \view('admin.region.edit' ,\compact( 'region' ,'cities'));


    }


    public function update(Request $request, $id)
    {
        $city = $this->regionService->getById($id);
        if(!$city ){
            $request->session()->flash('failed', 'Region Not Found');
            return redirect()->back();


        }
        $request->validate([
            'title_ar'=>['required','string','min:2' ,  Rule::unique('regions' ,'title_ar')->ignore($city->id)],
            'title_en'=>['required','string','min:2', Rule::unique('regions' ,'title_en')->ignore($city->id)],
            'city_id'=>['required','exists:cities,id'],
            'status'=>['required','string', Rule::in([1,0])],
        ]);

        $updated = $this->regionService->update($request , $city);

        if($updated){
            $request->session()->flash('success', 'Region Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $city = $this->regionService->getById($id);
        if(!$city ){
            $request->session()->flash('failed', 'Region Not Found');
            return redirect()->back();


        }
        $city->delete();
        $request->session()->flash('success', 'Region Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $city = $this->regionService->getById($id);
        if(!$city ){
            $request->session()->flash('failed', 'Region Not Found');
            return redirect()->back();


        }
        $city->restore();
        $request->session()->flash('success', 'Region Restored SuccessFully');

        return redirect()->back();



    }
}
