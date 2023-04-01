<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ProductReviewExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ProductReviewService;

class ProductReviewController extends Controller
{



    protected $reviewService;
    public function __construct(ProductReviewService $reviewService){
          $this->reviewService = $reviewService;
          $this->middleware(['permission:products-reviews-read'])->only(['index','export']);
          $this->middleware(['permission:products-reviews-create'])->only(['create', 'store']);
          $this->middleware(['permission:products-reviews-update'])->only(['update', 'edit']);
          $this->middleware(['permission:products-reviews-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $reviews =$this->reviewService->getAll($request);
        //  return $reviews;
        return \view('admin.productReview.index' ,\compact('reviews'));
    }




    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new ProductReviewExport,  Carbon::now() .'-reviews.xlsx');

    }



    public function approved(Request $request,$id)
    {
        $review = $this->reviewService->getById($id);
        if(!$review ){
            $request->session()->flash('failed', 'Product Review Not Found');
            return redirect()->back();
        }
        $review->status =1;
        $review->save();
        $request->session()->flash('success', 'Product Review Approved SuccessFully');

        return redirect()->back();

    }



    public function destroy(Request $request,$id)
    {
        $review = $this->reviewService->getById($id);
        if(!$review ){
            $request->session()->flash('failed', 'Product Review Not Found');
            return redirect()->back();


        }
        $review->delete();
        $request->session()->flash('success', 'Product Review Deleted SuccessFully');

        return redirect()->back();

    }



}
