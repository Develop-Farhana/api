<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
class Product extends Model
{
    

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
