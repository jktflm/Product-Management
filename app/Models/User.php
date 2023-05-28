<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    // Relationship with Product model
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    use Notifiable, SoftDeletes;

    /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password',
    'username', // Add comma here
];

/**
 * The attributes that should be mutated to dates.
 *
 * @var array
 */
protected $dates = [
    'deleted_at',
];

}