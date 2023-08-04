<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'company_name',
        'country',
        'street_address',
        'town_city',
        'postcode_zip',
        'phone',
        'email',
        'total',
        'order_code',
        'payment_method',
        'shipping_method',
        "status",
        "is_paid",
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
