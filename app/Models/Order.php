<?php

namespace App\Models;

use App\Models\DOT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function dot()
    {
        return $this->belongsTo(DOT::class, 'dot_id','id');
    }

}
