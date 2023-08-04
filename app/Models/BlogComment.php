<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $table ='blog_comment';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }
}
