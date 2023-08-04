<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='product_categories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class,'product_category_id','id');
    }
}
