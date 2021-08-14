<?php

namespace App\Models;

use App\Models\Article;
use App\Models\CategoryProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'telephone',
        'email',
        'localisation',
        'category_provider_id'
    ];

    public function articles(){
        return $this->belongsToMany(Article::class);
    }

    public function category(){
        return $this->belongsTo(CategoryProvider::class,'category_provider_id');
    }
}
