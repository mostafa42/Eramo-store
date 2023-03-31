<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMessage extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = "contact_messages" ;

    public $fillable = [
        "name" ,
        "email" ,
        "phone" ,
        "subject" ,
        "message" ,
        "iam_not_robot" ,
        "ip_address"
    ] ;

    public function replies()
    {
        return $this->hasMany(ContactMessageReply::class , "contact_id") ;
    }
}