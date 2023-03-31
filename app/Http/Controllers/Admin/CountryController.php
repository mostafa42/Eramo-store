<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\CountryExport;
use Illuminate\Validation\Rule;
use App\Services\CountryService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CountryController extends Controller
{
    protected $countryService;
    public function __construct(CountryService $countryService){
          $this->countryService = $countryService;
          $this->middleware(['permission:countries-read'])->only(['index','export']);
          $this->middleware(['permission:countries-create'])->only(['create', 'store']);
          $this->middleware(['permission:countries-update'])->only(['update', 'edit']);
          $this->middleware(['permission:countries-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $countries =$this->countryService->getAll($request);



        // return $countries;
        return \view('admin.country.index' ,\compact('countries'));
    }

    public function create( Request $request){


        return \view('admin.country.create' );
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new CountryExport,  Carbon::now() .'-countries.xlsx');

    }



    public function store(Request $request)

    {


        $request->validate([
            'title_ar'=>['required','string','min:2' , 'unique:countries'],
            'title_en'=>['required','string','min:2','unique:countries'],
            'shortcut'=>['required','string','min:2','unique:countries'],
            'code'=>['required','numeric','string','min:2','unique:countries'],
            'status'=>['required','string', Rule::in([1,0])],
         ]);



        $created = $this->countryService->store($request);

        if($created){
            $request->session()->flash('success', 'Country Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $country = $this->countryService->getById($id);
        if(!$country ){
            $request->session()->flash('failed', 'Country Not Found');
            return redirect()->back();


        }


        return \view('admin.country.edit' ,\compact( 'country'));


    }


    public function update(Request $request, $id)
    {
        $country = $this->countryService->getById($id);
        if(!$country ){
            $request->session()->flash('failed', 'Country Not Found');
            return redirect()->back();


        }
        $request->validate([
            'title_ar'=>['required','string','min:2' ,  Rule::unique('countries' ,'title_ar')->ignore($country->id)],
            'title_en'=>['required','string','min:2', Rule::unique('countries' ,'title_en')->ignore($country->id)],
            'shortcut'=>['required','string','min:2', Rule::unique('countries' ,'shortcut')->ignore($country->id)],
            'code'=>['required','numeric', Rule::unique('countries' ,'code')->ignore($country->id)],
            'status'=>['required','string', Rule::in([1,0])],
        ]);

        $updated = $this->countryService->update($request , $country);

        if($updated){
            $request->session()->flash('success', 'Country Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $country = $this->countryService->getById($id);
        if(!$country ){
            $request->session()->flash('failed', 'Country Not Found');
            return redirect()->back();


        }
        $country->delete();
        $request->session()->flash('success', 'Country Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $country = $this->countryService->getById($id);
        if(!$country ){
            $request->session()->flash('failed', 'Country Not Found');
            return redirect()->back();


        }
        $country->restore();
        $request->session()->flash('success', 'Country Restored SuccessFully');

        return redirect()->back();



    }

}
