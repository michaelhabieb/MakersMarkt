<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'product_type_id', 'material', 'production_time', 
        'complexity', 'durability', 'unique_features', 'maker_id', 'created_at'
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function maker()
    {
        return $this->belongsTo(User::class, 'maker_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function moderations()
    {
        return $this->hasMany(Moderation::class);
    }
}
