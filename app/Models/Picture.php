<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Picture extends Model
{
    use HasFactory;
    protected  $fillable = [
        'file',
        'article_id',
        'show_as_slider'
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
