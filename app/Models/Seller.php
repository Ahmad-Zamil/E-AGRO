<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function products(){
        return $this->hasMany(Product::class,'sellerId');
    }
    public function neworders(){
        return $this->hasMany(Neworder::class,'orderfromid');
    }
    // Eloquent
    //  public function orders(){
    //     return Order::where('sellerId', $this->id)->get();
    // }  
}
