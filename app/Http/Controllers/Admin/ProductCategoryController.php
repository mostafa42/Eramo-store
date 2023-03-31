<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductCategoryExport;
use App\Services\ProductCategoryService;

class ProductCategoryController extends Controller
{
    protected $productCategoryService;
    public function __construct(ProductCategoryService $productCategoryService){
          $this->productCategoryService = $productCategoryService;
          $this->middleware(['permission:products-categories-read'])->only(['index','export']);
          $this->middleware(['permission:products-categories-create'])->only(['create', 'store']);
          $this->middleware(['permission:products-categories-update'])->only(['update', 'edit']);
          $this->middleware(['permission:products-categories-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $categories =$this->productCategoryService->getAll($request);
        $type = $request->type && $request->type == 'sub' ? 'sub' : 'main';

        // return $categories;
        return \view('admin.productCategory.index' ,\compact('categories' ,'type'));
    }

    public function create( Request $request){


        $mainCategories =$this->productCategoryService->getActiveMainCategories();

        // return $mainCategories;

        return \view('admin.productCategory.create',\compact('mainCategories') );
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();

        $type = $request->type && $request->type == 'sub' ? 'sub' : 'main';
        return Excel::download(new ProductCategoryExport($type),  Carbon::now() .'-product_categories.xlsx');

    }



    public function store(Request $request)

    {




        // return $request->all();

        $request->validate([

            'title_ar'=>['required','string','min:2' , 'unique:product_categories'],
            'title_en'=>['required','string','min:2','unique:product_categories'],
            'summary_ar'=>['required','string','min:2'],
            'summary_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'parent_id'=>['nullable','exists:product_categories,id'],
            'image'=>['nullable','image','max:10240'],

         ]);



        $created = $this->productCategoryService->store($request);

        if($created){
            $request->session()->flash('success', 'Category Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $category = $this->productCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }


        $mainCategories =$this->productCategoryService->getActiveMainCategories();

        return \view('admin.productCategory.edit' ,\compact( 'category','mainCategories'));


    }


    public function update(Request $request, $id)
    {
        $category = $this->productCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }

        if(!$request->can_add_products ){


            $request->merge(['can_add_products'=>'0']);
        }
        if(!$request->can_add_halls ){


            $request->merge(['can_add_halls'=>'0']);
        }
        $request->validate([

            'title_ar'=>['required','string','min:2' ,  Rule::unique('product_categories' ,'title_ar')->ignore($category->id)],
            'title_en'=>['required','string','min:2', Rule::unique('product_categories' ,'title_en')->ignore($category->id)],
            'summary_ar'=>['required','string','min:2'],
            'summary_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'parent_id'=>['nullable','exists:product_categories,id'],
            'image'=>['nullable','image','max:10240'],
        ]);

        $updated = $this->productCategoryService->update($request , $category);

        if($updated){
            $request->session()->flash('success', 'Category Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $category = $this->productCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }
        $category->delete();
        $request->session()->flash('success', 'Category Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $category = $this->productCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }
        $category->restore();
        $request->session()->flash('success', 'Category Restored SuccessFully');

        return redirect()->back();



    }



    public function subCategoryByParentId(Request $request)
    {


        if(!$request->input('id')){
            return response()->json(['id is required']);

        }

        $categories = $this->productCategoryService->subCategoryByParentId($request->id) ;



        return response()->json($categories->toArray());

    }
}
