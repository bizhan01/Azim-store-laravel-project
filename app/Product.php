<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productName','category', 'model', 'price', 'quantity', 'expireDate','image'];
}
