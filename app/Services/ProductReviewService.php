<?php

namespace App\Services;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class ProductReviewService {



protected $review;
public function __construct(ProductReview $review){

    $this->review = $review;

}

public function getAll(Request $request){

    $approved = isset($request->approved) && ($request->approved == 0 || $request->approved == 1) ?true:false;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';
    $codes = $this->review::with(['product','user'])

    ->when($request->from ,function($q ) use($request){
        return $q->whereDate('created_at','>=',$request->from);
    })
    ->when($request->to ,function($q ) use($request){
        return $q->whereDate('created_at','<=',$request->to);
    })

    ->where(function($query)use($request){
        return $query->when($request->review_id ,function($q ) use($request){
            return $q->where('id' ,$request->review_id);
        });
    })
    ->where(function($query)use($request){
        return $query->when($request->user_id ,function($q ) use($request){
            return $q->where('user_id' ,$request->user_id);
        });
    })
    ->where(function($query)use($request){
        return $query->when($request->product_id ,function($q ) use($request){
            return $q->where('product_id' ,$request->product_id);
        });
    })




    ->where(function($query)use($request , $approved){
        return $query->when($approved ,function($q ) use($request){
            return $q->whereApproved($request->approved);
        });
    })
    ->orderBy('created_at' , $order)
    ->paginate( $limit)
    ->withQueryString();


    return $codes;
}

public function store(Request $request  ){


        $data = $request->only([
            'title',
            'expiration_date',
            'type',
            'value',
            'dedicated_to',
            'percent_or_amount',
            'user_id',
            'status',
            'maximum_times_of_use'

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $this->review::create($data);

    return true;


}


public function update(Request $request ,ProductReview $review){


    $data = $request->only([
        'title',
        'expiration_date',
        'type',
        'value',
        'dedicated_to',
        'percent_or_amount',
        'status',
        'maximum_times_of_use'
    ]);

     $data['user_id'] = $request->user_id;
    $review->update($data);



    return $review ? true :false;


}

public function getById(int $id){
   return  $this->review::find($id);

}



public function getActiveProductReviews(){
    return  $this->review::whereStatus(1)->get();

}
}
