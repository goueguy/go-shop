<?php

namespace App\Models;

use App\Models\Article;
use App\Models\SousCategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];
    public function articles(){
        return $this->belongsToMany(Article::class);
    }

    public function subcategory(){
        return $this->hasMany(SousCategorie::class,'category_id','id');
    }
}
