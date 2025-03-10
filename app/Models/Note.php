<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Trait\BelongToStore;
use App\Trait\BelongToStore;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory ;
    protected $fillable = [
         'name',
         'created_at',
        'updated_at',
        
    ];
     protected $connection = 'tenant' ;
 //   use HasFactory , BelongToStore;
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
 
    // }
    // public function store()
    // {
    //     return $this->belongsTo(Store::class);
 
    // }
}
