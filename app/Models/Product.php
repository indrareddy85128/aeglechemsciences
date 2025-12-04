<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'inr_price',
        'usd_price',
        'quantity',
        'image',
        'catalogue_number',
        'cas_number',
        'hsn_code',
        'molecular_formula',
        'molecular_weight',
        'purity',
        'density',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function metaDetails()
    {
        return $this->hasOne(MetaDetails::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
