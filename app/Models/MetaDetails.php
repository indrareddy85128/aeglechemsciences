<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaDetails extends Model
{
    protected $fillable = [
        'category_id',
        'product_id',
        'title',
        'keywords',
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
