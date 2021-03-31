<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'name', 'description', 'image', 'user_id','price'
    ];
    protected $visible = [
        'id', 'name', 'description', 'image', 'user_id','price','favorite',
    ];
    
    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'product_id','id');
    }
}
