<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category_id",
        'slug'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
