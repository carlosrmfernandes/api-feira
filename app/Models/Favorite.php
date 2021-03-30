<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id'
    ];
    protected $visible = [
        'id', 'user_id', 'product_id','product'
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
