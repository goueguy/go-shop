<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Picture;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SousCategorie;

class FrontendController extends Controller
{
    public function home()
    {

        $pictures = Picture::orderBy('id','desc')->where('show_as_slider',1)->get();
        //dd($pictures);
        $categories = Category::with('subcategory')->get();
        return view('frontend.home',compact('pictures','categories'));
    }

    public function detailArticle($article_slug){
        $categories= Category::all();
        $pictures = Picture::all();
        $article = Article::where('slug',$article_slug)->first();
        // dd($article->subcategory->category->name);
        return view("frontend.detail-article",compact('categories','article'));
    }

    public function listArticle($category_slug){
        $category = Category::where('slug',$category_slug)->first();
        $allCategories = Category::all();
        $sous_category_id = $category->subcategory->pluck('id');
        $articles = Article::whereIn("sous_categorie_id", $sous_category_id)->get();
        // dd($articles);
        return view('frontend.list-articles',compact('articles','category'));
    }
}
