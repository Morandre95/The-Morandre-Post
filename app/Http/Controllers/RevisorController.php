<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RevisorController extends Controller
{
    public function dashboard(){
        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', TRUE)->get();
        $rejectArticles = Article::where('is_accepted', FALSE)->get();
        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectArticles'));
    }

    public function acceptArticle(Article $article){
        $article->is_accepted = TRUE;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', "The article $article->title was accepted");
    }

    public function rejectArticle(Article $article){
        $article->is_accepted = FALSE;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', "The article $article->title was rejected");
    }

    public function undoArticle(Article $article){
        $article->is_accepted = NULL;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', "The article $article->title sent back for review");
    }
}
