<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CityExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Exports\CountryExport;
use Illuminate\Validation\Rule;
use App\Services\CountryService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class CityController extends Controller
{
    protected $cityService;
    protected $countryService;

    public function __construct(CityService $cityService ,CountryService $countryService){
          $this->cityService = $cityService;
          $this->countryService = $countryService;

          $this->middleware(['permission:cities-read'])->only(['index','export']);
          $this->middleware(['permission:cities-create'])->only(['create', 'store']);
          $this->middleware(['permission:cities-update'])->only(['update', 'edit']);
          $this->middleware(['permission:cities-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $cities =$this->cityService->getAll($request);



        // return $cities;
        return \view('admin.city.index' ,\compact('cities'));
    }

    public function create( Request $request){



        $countries = $this->countryService->getActiveCountries();



        return \view('admin.city.create' ,\compact('countries'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new CityExport,  Carbon::now() .'-cities.xlsx');

    }



    public function store(Request $request)

    {


        $request->validate([
            'title_ar'=>['required','string','min:2' , 'unique:cities'],
            'title_en'=>['required','string','min:2','unique:cities'],
            'country_id'=>['required','exists:countries,id'],
            'status'=>['required','string', Rule::in([1,0])],
         ]);



        $created = $this->cityService->store($request);

        if($created){
            $request->session()->flash('success', 'City Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $city = $this->cityService->getById($id);
        if(!$city ){
            $request->session()->flash('failed', 'City Not Found');
            return redirect()->back();


        }
        $countries = $this->countryService->getActiveCountries();


        return \view('admin.city.edit' ,\compact( 'city' ,'countries'));


    }


    public function update(Request $request, $id)
    {
        $city = $this->cityService->getById($id);
        if(!$city ){
            $request->session()->flash('failed', 'City Not Found');
            return redirect()->back();


        }
        $request->validate([
            'title_ar'=>['required','string','min:2' ,  Rule::unique('cities' ,'title_ar')->ignore($city->id)],
            'title_en'=>['required','string','min:2', Rule::unique('cities' ,'title_en')->ignore($city->id)],
            'country_id'=>['required','exists:countries,id'],
            'status'=>['required','string', Rule::in([1,0])],
        ]);

        $updated = $this->cityService->update($request , $city);

        if($updated){
            $request->session()->flash('success', 'City Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $city = $this->cityService->getById($id);
        if(!$city ){
            $request->session()->flash('failed', 'City Not Found');
            return redirect()->back();


        }
        $city->delete();
        $request->session()->flash('success', 'City Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $city = $this->cityService->getById($id);
        if(!$city ){
            $request->session()->flash('failed', 'City Not Found');
            return redirect()->back();


        }
        $city->restore();
        $request->session()->flash('success', 'City Restored SuccessFully');

        return redirect()->back();



    }


 public function cityByCountryId(Request $request)
{

    $request->validate([
        'country_id'=>['required','numeric'],

    ]);

    $cities = $this->cityService->cityByCountryId($request->country_id) ;



    return response()->json($cities->toArray());

}

}
