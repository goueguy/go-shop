<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'user_id'
    ];

    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
