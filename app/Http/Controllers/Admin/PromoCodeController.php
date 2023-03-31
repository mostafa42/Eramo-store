<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\PromoCodeExport;
use App\Services\PromoCodeService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PromoCodeController extends Controller
{
    protected $promoServices;
    public function __construct(PromoCodeService $promoServices){
          $this->promoServices = $promoServices;
          $this->middleware(['permission:promo-codes-read'])->only(['index','export']);
          $this->middleware(['permission:promo-codes-create'])->only(['create', 'store']);
          $this->middleware(['permission:promo-codes-update'])->only(['update', 'edit']);
          $this->middleware(['permission:promo-codes-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $promo_codes =$this->promoServices->getAll($request);
        // return $promo_codes;
        return \view('admin.promoCode.index' ,\compact('promo_codes'));
    }

    public function create( Request $request){


        return \view('admin.promoCode.create' );
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new PromoCodeExport,  Carbon::now() .'-promo_codes.xlsx');

    }



    public function store(Request $request)
    {
        // return $request->all();


        $request->validate([
            'title'=>['required','string','min:2' , 'unique:promo_codes'],
            'from'=>['required','date'],
            'to'=>['required','date'],
            'value'=>['required','numeric', ],
            'maximum_times_of_use'=>['required','numeric', ],
            'status'=>['required','string', Rule::in([1,0])],
            'dedicated_to'=>['required','string', Rule::in(['all_users','females','males','spacial_user'])],
            'type'=>['required','string', Rule::in(['percent','amount'])],
            'user_id'=>['nullable' ,  'exists:users,id'],
         ]);



        $created = $this->promoServices->store($request);

        if($created){
            $request->session()->flash('success', 'Promo Code Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $promo = $this->promoServices->getById($id);
        if(!$promo ){
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();
        }


        return \view('admin.promoCode.edit' ,\compact( 'promo'));


    }


    public function update(Request $request, $id)
    {
        $promo = $this->promoServices->getById($id);
        if(!$promo ){
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();


        }

        // return $request->all();
        $request->validate([
            'title'=>['required','string','min:2' ,  Rule::unique('promo_codes' ,'title')->ignore($promo->id)],
            'from'=>['required','date'],
            'to'=>['required','date'],
            'value'=>['required','numeric', ],
            'maximum_times_of_use'=>['required','numeric', ],
            'status'=>['required','string', Rule::in([1,0])],
            'dedicated_to'=>['required','string', Rule::in(['all_users','females','males','spacial_user'])],
            'type'=>['required','string', Rule::in(['percent','amount'])],
            'user_id'=>['nullable' ,  'exists:users,id'],
        ]);

        $updated = $this->promoServices->update($request , $promo);

        if($updated){
            $request->session()->flash('success', 'Promo Code Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $promo = $this->promoServices->getById($id);
        if(!$promo ){
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();


        }
        $promo->delete();
        $request->session()->flash('success', 'Promo Code Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $promo = $this->promoServices->getById($id);
        if(!$promo ){
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();
        }
        $promo->restore();
        $request->session()->flash('success', 'Promo Code Restored SuccessFully');

        return redirect()->back();



    }
}
