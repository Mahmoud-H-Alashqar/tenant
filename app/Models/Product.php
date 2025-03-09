<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Trait\BelongToStore;
use App\Trait\BelongToStore;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory , BelongToStore;
    use HasFactory ;
    protected $fillable = [
        'category_id ',
        'name',
        'price',
        'created_at',
        'updated_at',
        
    ];
     protected $connection = 'tenant' ;
    // public function store()
    // {
    //     return $this->belongsTo(Store::class);
 
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
 
    }
    // protected static function booted()
    // {
    //     static::addGlobalScope('store',function($query){
    //         $store = app()->make('store.active');
    //         $query->where('store_id',$store->id);
    //     });
    // }
}
