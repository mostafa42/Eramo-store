<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $table='blog_comments';
    protected $fillable=['blog_id', 'text_encomment','user_id','accepted'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, "blog_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}