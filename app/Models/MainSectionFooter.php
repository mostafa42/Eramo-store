<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSectionFooter extends Model
{
    use HasFactory;

    public $fillable = [
        "logo" ,
        "description" ,
        "google_store_link" ,
        "app_store_link"
    ] ;

}
