<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Exports\TaxExport;
use App\Services\TaxService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class TaxController extends Controller
{
    protected $texService;
    public function __construct(TaxService $texService){
          $this->texService = $texService;
          $this->middleware(['permission:taxes-read'])->only(['index','export']);
          $this->middleware(['permission:taxes-create'])->only(['create', 'store']);
          $this->middleware(['permission:taxes-update'])->only(['update', 'edit']);
          $this->middleware(['permission:taxes-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $taxes =$this->texService->getAll($request);
        // return $taxes;
        return \view('admin.tax.index' ,\compact('taxes'));
    }

    public function create( Request $request){


        return \view('admin.tax.create' );
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new TaxExport,  Carbon::now() .'-taxes.xlsx');

    }



    public function store(Request $request)

    {


        $request->validate([
            'title_ar'=>['required','string','min:2' , 'unique:taxes'],
            'title_en'=>['required','string','min:2','unique:taxes'],
            'percentage'=>['required','numeric', ],
            'status'=>['required','string', Rule::in([1,0])],
         ]);



        $created = $this->texService->store($request);

        if($created){
            $request->session()->flash('success', 'Tax Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $tax = $this->texService->getById($id);
        if(!$tax ){
            $request->session()->flash('failed', 'Tax Not Found');
            return redirect()->back();


        }


        return \view('admin.tax.edit' ,\compact( 'tax'));


    }


    public function update(Request $request, $id)
    {
        $tax = $this->texService->getById($id);
        if(!$tax ){
            $request->session()->flash('failed', 'Tax Not Found');
            return redirect()->back();


        }
        $request->validate([
            'title_ar'=>['required','string','min:2' ,  Rule::unique('taxes' ,'title_ar')->ignore($tax->id)],
            'title_en'=>['required','string','min:2', Rule::unique('taxes' ,'title_en')->ignore($tax->id)],
            'percentage'=>['required','numeric', ],
            'status'=>['required','string', Rule::in([1,0])],
        ]);

        $updated = $this->texService->update($request , $tax);

        if($updated){
            $request->session()->flash('success', 'Tax Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $tax = $this->texService->getById($id);
        if(!$tax ){
            $request->session()->flash('failed', 'Tax Not Found');
            return redirect()->back();


        }
        $tax->delete();
        $request->session()->flash('success', 'Tax Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $tax = $this->texService->getById($id);
        if(!$tax ){
            $request->session()->flash('failed', 'Tax Not Found');
            return redirect()->back();
        }
        $tax->restore();
        $request->session()->flash('success', 'Tax Restored SuccessFully');

        return redirect()->back();



    }
}
