<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Trait\BelongToStore;
use App\Trait\BelongToStore;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , BelongToStore;
    public function products()
    {
        return $this->hasMany(Product::class);
 
    }
    // public function store()
    // {
    //     return $this->belongsTo(Store::class);
 
    // }
}
