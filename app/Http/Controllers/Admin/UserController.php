<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Services\CountryService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    protected $userService;
    protected $countryService;
    protected $cityService;

    public function __construct(UserService $userService ,CountryService $countryService ,CityService $cityService){

          $this->userService = $userService;
          $this->countryService = $countryService;
          $this->cityService = $cityService;

          $this->middleware(['permission:users-read'])->only(['index','export']);
          $this->middleware(['permission:users-create'])->only(['create', 'store']);
          $this->middleware(['permission:users-update'])->only(['update', 'edit']);
          $this->middleware(['permission:users-delete'])->only(['destroy']);
    }

      public function index( Request $request){


          $users =$this->userService->getAll($request);



          return \view('admin.user.index' ,\compact('users'));
      }

      public function create( Request $request){


        $countries = $this->countryService->getActiveCountries();
        $cities = $this->cityService->getActiveCities();

        $firstCountryCities = $countries->count()>0 ? $countries->first()->cities : $countries;

          return \view('admin.user.create' ,\compact('countries','cities','firstCountryCities'));
      }


      public function export()
      {
        ob_end_clean();
        ob_start();
          return Excel::download(new UserExport,  Carbon::now() .'-users.xlsx');

      }



      public function store(Request $request)

      {

          $this->validate($request ,[
              'name'=>['required','string','min:2'],
              'email'=>['required','email','unique:users'],
              'phone'=>['required','string','unique:users'],
              'password'=>['required','string', 'min:6'],
              'password_confirmation'=>['required','string','same:password'],
              'gender'=>['required','string', Rule::in(['male','female'])],
              'image'=>['nullable','image','max:10240'],
              'status'=>['required','string', Rule::in([1,0])],
              'country_id'=>['required','exists:countries,id'],
              'city_id'=>['required','exists:cities,id'],

          ]
          );


          $created = $this->userService->store($request);

          if($created){
              $request->session()->flash('success', 'User Added SuccessFully');

          }else{
              $request->session()->flash('failed', 'Something Wrong');

          }

          return redirect()->back();

      }



      public function edit(Request $request,$id)
      {

        $user = $this->userService->getById($id);
          if(!$user ){
              $request->session()->flash('failed', 'User Not Found');
              return redirect()->back();


          }


          $countries = $this->countryService->getActiveCountries();
          $cities = $this->cityService->getActiveCities();
          $firstCountryCities = $this->cityService->cityByCountryId($user->country_id);
          return \view('admin.user.edit' ,\compact('countries','cities', 'user','firstCountryCities'));


      }


      public function update(Request $request, $id)
      {
        $user = $this->userService->getById($id);


            if(!$user ){
              $request->session()->flash('failed', 'User Not Found');
              return redirect()->back();
            }
          $this->validate($request ,[
              'name'=>['required','string','min:2'],
              'email'=>['required','email',  Rule::unique('users')->ignore($user->id),],
              'phone'=>['required','string' , Rule::unique('users')->ignore($user->id)],
              'password'=>['nullable','string', 'min:6','confirmed'],
              'password_confirmation'=>['nullable','string','same:password'],
              'gender'=>['required','string', Rule::in(['male','female'])],
              'image'=>['nullable','image','max:10240'],
              'status'=>['required','string', Rule::in([1,0])],
              'country_id'=>['required','exists:countries,id'],
              'city_id'=>['required','exists:cities,id'],

          ]
          );



          $isUpdated = $this->userService->update($request , $user);

          if($isUpdated){
              $request->session()->flash('success', 'User Updated SuccessFully');
          }else{
              $request->session()->flash('failed', 'Something Wrong');
          }


           return redirect()->back();


      }

      public function destroy(Request $request,$id)
      {
        $user = $this->userService->getById($id);


            if(!$user ){
              $request->session()->flash('failed', 'User Not Found');
              return redirect()->back();
          }
          $user->delete();
          $request->session()->flash('success', 'User Deleted SuccessFully');


          return redirect()->back();



      }


      public function restore(Request $request,$id)
      {
        $user = $this->userService->getById($id);


          if(!$user ){
              $request->session()->flash('failed', 'User Not Found');
              return redirect()->back();
          }
          $user->restore();
          $request->session()->flash('success', 'User Restored SuccessFully');

          return redirect()->back();



      }



      public function search(Request $request)
      {

          $request->validate([
              'search'=>['required','string'],

          ]);

          $users = $this->userService->adminSearchForUser($request->search) ;



          return response()->json($users->toArray());

      }

}
