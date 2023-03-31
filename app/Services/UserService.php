<?php

namespace App\Services;
use App\Helper\UploadHelper;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class UserService {



protected $user;
public function __construct(User $user){


        $this->user = $user;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';

    $users = $this->user::with(['country','city'])
    ->where(function($query)use($request){
        return $query->when($request->name ,function($q ) use($request){
            return $q->where('name' ,'like' , '%'.$request->name.'%');
        });

    })
    ->where(function($query)use($request){
        return $query->when($request->email ,function($q ) use($request){
            return $q->where('email' ,'like' , '%'.$request->email.'%');
        });

    })
    ->where(function($query)use($request){
        return $query->when($request->phone ,function($q ) use($request){
            return $q->where('phone' ,'like' , '%'.$request->phone.'%');
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
        return $query->when($request->user_id ,function($q ) use($request){
            return $q->where('id' ,$request->user_id);
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


    return $users;
}

public function store(Request $request  ){
    $data =[
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'status'=>$request->status,
        'password'=>Hash::make($request->password),
        'gender'=>$request->gender,
        'country_id'=>$request->country_id,
        'city_id'=>$request->city_id,
        'sign_from'=>'web',



    ];

    $user = $this->user::create($data);


    if($request->hasFile('image')){
        $imageName = UploadHelper::upload('users_images', $request->file('image'), config('imageDimensions.users.width'), config('imageDimensions.users.height'));

        $user->image =$imageName;
    }
    $user->save();


    return true;


}


public function update(Request $request ,User $user){


    $data =[
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'status'=>$request->status,
        'gender'=>$request->gender,
        'country_id'=>$request->country_id,
        'city_id'=>$request->city_id,

    ];



    if($request->input('password')){
        $data['password']= Hash::make($request->password);
    }
    $user->update($data);
    if($request->hasFile('image')){


        if( File::exists(public_path('uploads/users_images/'. $user->image))){

            Storage::disk('public_uploads')->delete('users_images/'. $user->image);
        }

            $imageName = UploadHelper::upload('users_images', $request->file('image'), config('imageDimensions.users.width'), config('imageDimensions.users.height'));

            $user->image =$imageName;
    }
    $user->save();



    return $user ? true :false;


}

public function getById(int $id){
   return  $this->user::withTrashed()->find($id);

}



public function adminSearchForUser(string $search){

    return  $this->user::where( 'id' ,'like' ,'%' .$search .'%')
    ->orWhere('phone' ,'like' ,'%' .$search .'%')
    ->orWhere('email' ,'like' ,'%' .$search .'%')
    ->limit(50)
    ->get();
 }
}
