<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'prix_unitaire',
        'sous_total',
        'order_id',
        'article_id'
    ];
}

