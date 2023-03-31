<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Services\TaxService;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ProductCategoryService;

class ProductController extends Controller
{
    protected $productService;
    protected $productCategoryService;
    protected $texService;





    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService, TaxService $texService, )
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->texService = $texService;


        $this->middleware(['permission:products-read'])->only(['index', 'export']);
        $this->middleware(['permission:products-create'])->only(['create', 'store']);
        $this->middleware(['permission:products-update'])->only(['update', 'edit']);
        $this->middleware(['permission:products-delete'])->only(['destroy']);

    }




    public function index(Request $request)
    {


        $products = $this->productService->getAll($request);
        $type = $request->type && ($request->type == 'in-stock' || $request->type == 'out-of-stock') ? $request->type : 'all';

        // return $products;

        // return sprintf("%08d",'10000000009999999');
        // return str_pad(3, 12, "0", STR_PAD_LEFT);
        return \view('admin.product.index', \compact('products', 'type'));
    }

    public function create(Request $request)
    {




        $mainCategories = $this->productCategoryService->getActiveMainCategories();
        $taxes = $this->texService->getActiveTaxes();
        $firstMainCategorySubCategories = $mainCategories->count() > 0 ? $mainCategories->first()->sub_catagories : $mainCategories;

        $products = $this->productService->getActiveProducts();


        // return $products;


        return \view('admin.product.create', \compact('mainCategories', 'taxes', 'firstMainCategorySubCategories', 'products'));
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();
        $type = $request->type && ($request->type == 'in-stock' || $request->type == 'out-of-stock') ? $request->type : 'all';

        return Excel::download(new ProductExport($type), Carbon::now() . '-products.xlsx');

    }



    public function store(Request $request)
    {




        // return $request->all();

        $request->validate([

            'title_ar' => ['required', 'string', 'min:2', 'unique:products'],
            'title_en' => ['required', 'string', 'min:2', 'unique:products'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'primary_image' => ['required', 'image', 'max:10240'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:10240'],
            'category_id' => ['required', 'exists:product_categories,id'],
            'main_category_id' => ['required', 'exists:product_categories,id'],
            'taxes.*' => ['nullable', 'exists:taxes,id'],
            'stock' => ['required', 'integer'],
            'fake_price' => ['required', 'integer'],
            'real_price' => ['required', 'integer'],
            'purchase_price' => ['required', 'integer'],
            'sku_number' => ['required', 'string', 'min:2'],
            'model_number' => ['required', 'string', 'min:2'],
            'details_ar' => ['required', 'string', 'min:2'],
            'details_en' => ['required', 'string', 'min:2'],
            'summary_ar' => ['required', 'string', 'min:2'],
            'summary_en' => ['required', 'string', 'min:2'],
            'instructions_ar' => ['required', 'string', 'min:2'],
            'instructions_en' => ['required', 'string', 'min:2'],
            'features_ar' => ['required', 'string', 'min:2'],
            'features_en' => ['required', 'string', 'min:2'],
            'extras_ar' => ['required', 'string', 'min:2'],
            'extras_en' => ['required', 'string', 'min:2'],
            'to' => ['required', 'date',
            ],




        ]);



        $created = $this->productService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Product Added SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');

        }




        return redirect()->back();

    }


    public function edit(Request $request, $id)
    {

        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();


        }

        $mainCategories = $this->productCategoryService->getActiveMainCategories();
        $taxes = $this->texService->getActiveTaxes();
        $firstMainCategorySubCategories = $this->productCategoryService->subCategoryByParentId($product->main_category_id);
        $products = $this->productService->getActiveProducts();




        return \view('admin.product.edit', \compact('product', 'mainCategories', 'taxes', 'firstMainCategorySubCategories', 'products'));


    }


    public function update(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();


        }

        $request->validate([

            'title_ar' => ['required', 'string', 'min:2', Rule::unique('products', 'title_ar')->ignore($product->id)],
            'title_en' => ['required', 'string', 'min:2', Rule::unique('products', 'title_en')->ignore($product->id)],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'primary_image' => ['nullable', 'image', 'max:10240'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:10240'],
            'category_id' => ['required', 'exists:product_categories,id'],
            'main_category_id' => ['required', 'exists:product_categories,id'],
            'taxes.*' => ['nullable', 'exists:taxes,id'],
            'stock' => ['required', 'integer'],
            'fake_price' => ['required', 'integer'],
            'real_price' => ['required', 'integer'],
            'purchase_price' => ['required', 'integer'],
            'sku_number' => ['nullable', 'string', 'min:2'],
            'model_number' => ['nullable', 'string', 'min:2'],
            'details_ar' => ['required', 'string', 'min:2'],
            'details_en' => ['required', 'string', 'min:2'],
            'summary_ar' => ['required', 'string', 'min:2'],
            'summary_en' => ['required', 'string', 'min:2'],
            'instructions_ar' => ['required', 'string', 'min:2'],
            'instructions_en' => ['required', 'string', 'min:2'],
            'features_ar' => ['required', 'string', 'min:2'],
            'features_en' => ['required', 'string', 'min:2'],
            'extras_ar' => ['required', 'string', 'min:2'],
            'extras_en' => ['required', 'string', 'min:2'],
            'to' => ['required', 'date',
            ],


        ]);

        $updated = $this->productService->update($request, $product);

        if ($updated) {
            $request->session()->flash('success', 'Product Updated SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }



    public function updatePrice(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }
        $validator = Validator::make($request->all(), [
            'fake_price' => ['required', 'integer', 'min:0'],
            'real_price' => ['required', 'integer', 'min:0'],
        ]);

        if ($validator->fails()) {
            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();
        }
        $updated = $this->productService->updatePrice($request, $product);

        if ($updated) {
            $request->session()->flash('success', 'Product Price Updated SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();


    }


    public function updateStock(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }
        $validator = Validator::make($request->all(), [
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        if ($validator->fails()) {
            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();
        }
        $updated = $this->productService->updateStock($request, $product);

        if ($updated) {
            $request->session()->flash('success', 'Product Stock Updated SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();


    }








    public function destroy(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();


        }
        $product->delete();
        $request->session()->flash('success', 'Product Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }
        $product->restore();
        $request->session()->flash('success', 'Product Restored SuccessFully');

        return redirect()->back();



    }



    public function activation(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }

        $product->status = '1';
        $product->save();
        $request->session()->flash('success', 'Product  Status Changed To Active');

        return redirect()->back();



    }



    public function inactivation(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }

        $product->status = '0';
        $product->save();
        $request->session()->flash('success', 'Product  Status Changed To InActive');

        return redirect()->back();



    }



}
