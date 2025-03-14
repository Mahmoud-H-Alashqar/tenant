<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'domain',
        'database_options',
    ];
    protected $casts = [
        'database_options' => 'array',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
 
    }
     
}
