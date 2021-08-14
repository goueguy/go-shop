<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePicture extends Model
{
    use HasFactory;
    protected $table = "article_picture";
    protected $fillable = [
        'picture_id',
        'article_id'
    ];
}
