<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   protected $fillable=[
    'first_name',
    'last_name',
    'email',
    'postal_code',
    'address',
    'phonenumber',
    'payment_method',
    'quantity',
    'totalprice',
   ];

   public function user()
   {
       return $this->belongsTo('App\User');
   }


    
}
