<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessageReply extends Model
{
    use HasFactory;

    public $fillable = [
        "message" ,
        "contact_id" ,
        "admin_id"
    ] ;
}