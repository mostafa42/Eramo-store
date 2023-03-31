<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    protected $guarded = [];
    protected  $appends =['total_extra_fees','total_special_discount'];

    use HasFactory ,SoftDeletes;


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($order)  {

    //         $order_number = $order->id;
    //         dd($order_number);

    //         // Pad the order number with leading zeros to a length of 12 characters
    //         $order->order_number = str_pad($order_number, 12, '0', STR_PAD_LEFT);
    //     });
    // }

    public function generateUniqueOrderNumber(){

        $this->order_number = str_pad($this->id, 12, '0', STR_PAD_LEFT);


    }


    public function extra_fees()
    {
        return $this->hasMany(OrderExtraFees::class, 'order_id')->with('admin')->latest();
    }

    public function getTotalExtraFeesAttribute()
    {
        return $this->extra_fees()->sum('cost');
    }


    public function special_discount()
    {
        return $this->hasMany(OrderSpecialDiscount::class, 'order_id')->latest();
    }

    public function getTotalSpecialDiscountAttribute()
    {
        return $this->special_discount()->sum('cost');

    }




    public function products()
    {
        // return $this->hasMany(OrderDetail::class, 'order_id');

        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')->withPivot([
            'total',
            'price',
            'taxes',
            'quantity'
        ]);

    }



    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function inprogress_admin()
    {
        return $this->belongsTo(Admin::class, 'inprogress_action_admin_id','id');
    }

    public function delivered_admin()
    {
        return $this->belongsTo(Admin::class, 'delivered_action_admin_id','id');
    }

    public function cancelled_admin()
    {
        return $this->belongsTo(Admin::class, 'cancelled_action_admin_id','id');
    }




    public function promo_code()
    {
        return $this->belongsTo(PromoCode::class, 'promo_id');
    }

    public function shipping_details()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }



    public function calcOrderTotalSum(){

        // $this->calcPromoCode();
        // $this->calcShipping();
        $total = $this->total_products_price_with_taxes;
        $total_special_discount = $this->total_special_discount;

        $total_extra_fees = $this->total_extra_fees;
        $promo_discount =$this->promo_discount;
        $shipping =$this->shipping;
        $total_sum = $total - ($promo_discount + $total_special_discount) + ($total_extra_fees + $shipping);

        $this->total_sum = $total_sum;
    }

    public function calcPromoCode(){

        $promoValue =0;
        $promo = $this->promo_code ;
        if( $promo){
            $this->promo_code_title =$promo->title;

            if($promo->type =='percent'){
                $promoValue  = ($promo->value  * $this->total ) /	 100;
            }else{
                $promoValue  = $promo->value;
            }

        }

        $this->promo_discount  = $promoValue;



    }

    public function calcShipping(){

        $shippingValue =0;
        $shipping = $this->shipping_details ;
        if( $shipping){
            $shippingValue =$shipping->cost;

        }

        $this->shipping =$shippingValue;


    }








}
