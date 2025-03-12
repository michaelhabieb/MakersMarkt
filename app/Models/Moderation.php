<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderation extends Model
{
    use HasFactory;

    protected $fillable = ['moderator_id', 'product_id', 'action', 'comment', 'created_at'];

    public function moderator()
    {
        return $this->belongsTo(User::class, 'moderator_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
