<?php

namespace App\Models;

use App\Models\Picture;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Provider;
use App\Models\SousCategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'slug',
        'status_stock',
        'provider_id',
        'sous_categorie_id',
        'statut',
        'user_id'
    ];

    public function subcategory(){
        return $this->belongsTo(SousCategorie::class,'sous_categorie_id','id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function images(){
        return $this->hasMany(Picture::class);
    }

    public function favorites(){
        return $this->belongsToMany(Favorite::class);
    }
    
}

