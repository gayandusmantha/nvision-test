<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'order_value',
        'process_id',
        'user_id'
    ];


    protected $hidden = [
        'user_id',
    ];

}
