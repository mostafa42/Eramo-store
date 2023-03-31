<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreInformationFooter extends Model
{
    use HasFactory;

    public $fillable = [
        "location" ,
        "phone" ,
        "email" ,
        "fax"
    ];
}
