<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DOT extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id', 'id');
    }
}
