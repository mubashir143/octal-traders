<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['name', 'description', 'deal_price', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
