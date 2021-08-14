<?php

namespace App\Models;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProvider extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
    ];
    public function providers(){
        return $this->belongsToMany(Provider::class);
    }
}
