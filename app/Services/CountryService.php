<?php

namespace App\Services;
use App\Models\Admin;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class CountryService {



protected $country;
public function __construct(Country $country){

    $this->country = $country;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';
    $countries = $this->country::withCount(['cities'])->with('admin')
     -> where(function($query)use($request){
        return $query->when($request->search ,function($q ) use($request){
            return $q->where('title_ar' ,'like' , '%'.$request->search.'%')
                    ->orWhere('title_en' ,'like' , '%'.$request->search.'%')
                    ->orWhere('code' ,'like' , '%'.$request->search.'%')
                    ->orWhere('shortcut' ,'like' , '%'.$request->search.'%');
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
        return $query->when($request->country_id ,function($q ) use($request){
            return $q->where('id' ,$request->country_id);
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
            'shortcut',
            'code',
            'status',
        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $this->country::create($data);

    return true;


}


public function update(Request $request ,Country $country){


    $data = $request->only([
        'title_ar',
        'title_en',
        'shortcut',
        'code',
        'status',
    ]);

    $country->update($data);



    return $country ? true :false;


}

public function getById(int $id){
   return  $this->country::withTrashed()->find($id);

}



public function getActiveCountries(){
    return  $this->country::whereStatus(1)->get();

 }
}
