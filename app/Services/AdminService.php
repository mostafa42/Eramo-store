<?php

namespace App\Services;
use App\Helper\UploadHelper;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class AdminService {



protected $admin;
public function __construct(Admin $admin){


        $this->admin = $admin;

}

public function getAdmins(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';

    $admins = $this->admin::whereRoleIs(['admin', 'super-admin'])->with(['roles'])
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
        return $query->when($request->admin_id ,function($q ) use($request){
            return $q->where('id' ,$request->admin_id);
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


    return $admins;
}

public function store(Request $request  ){
    $data =[
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'status'=>$request->status,
        'password'=>Hash::make($request->password),
        'gender'=>$request->gender,

    ];

    $admin = $this->admin::create($data);
    $admin->attachRole('admin');
    $admin->attachPermissions($request->permissions);

    if($request->hasFile('image')){
        $imageName = UploadHelper::upload('admins_images', $request->file('image'), config('imageDimensions.admins.width'), config('imageDimensions.admins.height'));

        $admin->image =$imageName;
    }
    $admin->save();


    return true;


}


public function update(Request $request ,Admin $admin){


    $data =[
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'status'=>$request->status,
        'gender'=>$request->gender,
    ];



    if($request->input('password')){
        $data['password']= Hash::make($request->password);
    }
    $admin->update($data);
    $admin->syncPermissions($request->permissions);
    if($request->hasFile('image')){


        if( File::exists(public_path('uploads/admins_images/'. $admin->image))){

            Storage::disk('public_uploads')->delete('admins_images/'. $admin->image);
        }

            $imageName = UploadHelper::upload('admins_images', $request->file('image'), config('imageDimensions.admins.width'), config('imageDimensions.admins.height'));

            $admin->image =$imageName;
    }
    $admin->save();



    return $admin ? true :false;


}

public function getAdminById(int $id){
   return  $this->admin::whereRoleIs(['admin', 'super-admin'])->withTrashed()->find($id);

}

}
