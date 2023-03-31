<?php

namespace App\Services;
use App\Models\Admin;
use App\Models\Tax;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class TaxService {



protected $tax;
public function __construct(Tax $tax){

    $this->tax = $tax;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';
    $countries = $this->tax::with('admin')
     -> where(function($query)use($request){
        return $query->when($request->search ,function($q ) use($request){
            return $q->where('title_ar' ,'like' , '%'.$request->search.'%')
                    ->orWhere('title_en' ,'like' , '%'.$request->search.'%');
        });

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
        return $query->when($request->tax_id ,function($q ) use($request){
            return $q->where('id' ,$request->tax_id);
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
            'percentage',
            'status'

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $this->tax::create($data);

    return true;


}


public function update(Request $request ,Tax $tax){


    $data = $request->only([
        'title_ar',
        'title_en',
        'percentage',
        'status'
    ]);

    $tax->update($data);



    return $tax ? true :false;


}

public function getById(int $id){
   return  $this->tax::withTrashed()->find($id);

}



public function getActiveTaxes(){
    return  $this->tax::whereStatus(1)->get();

 }
}
