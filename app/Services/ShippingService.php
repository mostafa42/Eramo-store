<?php

namespace App\Services;
use App\Models\Admin;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class ShippingService {



protected $shipping;
public function __construct(Shipping $shipping){

    $this->shipping = $shipping;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';
    $countries = $this->shipping::with(['admin','city'])
     -> where(function($query)use($request){
        return $query->when($request->search ,function($q ) use($request){
            return $q->whereHas('city', function($query)  use($request){
                return  $query->where('title_ar', 'like', '%' . $request->search . '%')
                ->orWhere('title_en', 'like', '%' . $request->search . '%')
                ->orWhere('code', 'like', '%' . $request->search . '%');
            });
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
        return $query->when($request->shipping_id ,function($q ) use($request){
            return $q->where('id' ,$request->shipping_id);
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
            'text_ar',
            'text_en',
            'cost',
            'city_id',
            'status'

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $this->shipping::create($data);

    return true;


}


public function update(Request $request ,Shipping $shipping){


    $data = $request->only([
        'text_ar',
        'text_en',
        'cost',
        'city_id',
        'status'
    ]);

    $shipping->update($data);



    return $shipping ? true :false;


}

public function getById(int $id){
   return  $this->shipping::withTrashed()->find($id);

}



public function getActiveShippings(){
    return  $this->shipping::whereStatus(1)->get();

 }
}
