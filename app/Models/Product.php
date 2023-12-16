<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $fillable = [
        'name',
        'slug', // 'slug' is a URL friendly version of the 'name' field
        'price',
        'quantity',
        'description',
    ];

    public function sells()
    {
        return $this->hasMany(Sell::class);
    }
}
