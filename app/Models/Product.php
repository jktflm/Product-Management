<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'product_category_id');
    }
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'product_sku',
        'product_category_id',
        'product_description',
        'product_image',
    ];

    protected $dates = ['deleted_at'];
}
