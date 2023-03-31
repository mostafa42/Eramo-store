<?php

namespace App\Services;
use App\Models\ProductCategory;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class ProductCategoryService {



protected $category;
public function __construct(ProductCategory $category){

    $this->category = $category;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';

    $type = $request->type && $request->type == 'sub' ? 'sub' : 'main';
    $countries = $this->category::withCount(['sub_catagories','products','products_from_main'])->with(['admin','parent'])
     -> where(function($query)use($request){
        return $query->when($request->search ,function($q ) use($request){
            return $q->where('title_ar' ,'like' , '%'.$request->search.'%')
                    ->orWhere('title_en' ,'like' , '%'.$request->search.'%');
        });

    })

    ->when($type=='sub' ,function($q ) {
        return $q->sub();
    })
    ->when($type=='main' ,function($q ) {
        return $q->main();
    })

    ->when($deleted ,function($q ) use($deleted){
        return $q->onlyTrashed();
    })
    ->when($request->from ,function($q ) use($request){
        return $q->whereDate('created_at','>=',$request->from);
    })
    ->when($request->to ,function($q ) use($request){
        return $q->whereDate('created_at','<=',$request->to);
    })

    ->where(function($query)use($request){
        return $query->when($request->category_id ,function($q ) use($request){
            return $q->where('id' ,$request->category_id);
        });

    })

    ->where(function($query)use($request){
        return $query->when($request->parent_id ,function($q ) use($request){
            return $q->where('parent_id' ,$request->parent_id);
        });

    })
    ->where(function($query)use($request , $status){
        return $query->when($status ,function($q ) use($request){
            return $q->whereStatus($request->status);
        });
    })
    ->orderBy('created_at' , $order)
    ->paginate( $limit)
    ->withQueryString();


    return $countries;
}

public function store(Request $request  ){


        $data = $request->only([
            'title_ar',
            'title_en',
            'summary_ar',
            'summary_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'status',
            'parent_id'

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $category = $this->category::create($data);

     if($request->hasFile('image')){
        $imageName = UploadHelper::upload('products_categories_images', $request->file('image'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height'));

        $category->image =$imageName;
    }
    $category->save();

    return true;


}


public function update(Request $request ,ProductCategory $category){



    $data = $request->only([
        'title_ar',
        'title_en',
        'summary_ar',
        'summary_en',
        'description_ar',
        'description_en',
        'keywords_ar',
        'keywords_en',
        'status',
        'parent_id'
    ]);

    $category->update($data);

    if($request->hasFile('image')){


        if( File::exists(public_path('uploads/products_categories_images/'. $category->image))){

            Storage::disk('public_uploads')->delete('products_categories_images/'. $category->image);
        }

            $imageName = UploadHelper::upload('products_categories_images', $request->file('image'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height'));

            $category->image =$imageName;
    }
    $category->save();


    return $category ? true :false;


}

public function getById(int $id){
   return  $this->category::withTrashed()->find($id);

}



public function getActiveMainCategories(){
    return  $this->category::whereStatus(1)->main()->get();

 }


 public function getActiveSubCategories(){
    return  $this->category::whereStatus(1)->sub()->get();

 }

 public function subCategoryByParentId(int $id){
    return  $this->category::whereParentId($id)->get();
 }
}
