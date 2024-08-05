<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'byCategory', 'byUser', 'articleSearch']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $articles = Article::where('is_accepted', TRUE)->orderBy('created_at', 'desc')->get();
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
        

        */
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|unique:articles|min:5',
                'platform' => 'required',
                'body' => 'required|min:10|max:2100',
                'image' => 'required|image',
                'category' => 'required',
                'tags' => 'required',
                'rating' => 'required|integer|between:1,5',
            ]);
        
            $article = Article::Create([
                'title' => $request->title,
                'platform_id' => $request->platform,
                'body' => $request->body,
                'image' => $request->file('image')->store('public/images'),
                'category_id' => $request->category,
                'user_id' => auth()->user()->id,
                'slug' => Str::slug($request->title),
                'rating' => $request->rating,
            ]);
        
            $tags = explode(',', $request->tags);
            
            foreach ($tags as $i => $tag) {
                $tags[$i] = trim($tag);
            }
        
            foreach ($tags as $tag) {
                $newTag = Tag::updateOrCreate([
                    'name' => strtolower($tag)
                ]);
                $article->tags()->attach($newTag);
            }
        
            return redirect(route('homepage'))
                ->with('message', 'Article created successfully');
        }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
            return view('article.show', compact('article'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id == $article->user_id) {
            return view('article.edit', compact('article'));
        }

            return redirect()->route('homepage')->with('alert', 'You are not allowed to edit this article');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'platform' => 'required',
            'body' => 'required|min:10|max:2100',
            'image' => '',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'platform_id' => $request->platform,
            'body' => $request->body,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title)
        ]);

        if($request->image){
            Storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/images'),
            ]);
        }

        $tags = explode(',', $request->tags);
        
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }
        $newTags =[];

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => strtolower($tag)
            ]);
            $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTags);

        $article->is_accepted = null;
        $article->save();

        return redirect(route('writer.dashboard'))->with('message', 'Article updated successfully and under review');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag);
        }
        Storage::delete($article->image);

        $article->delete();
        return redirect(route('writer.dashboard'))->with('message', 'Article deleted successfully');
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', TRUE)->orderBy('created_at', 'desc')->get();
        return view ('article.by-category', compact('articles', 'category'));
    }
    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', TRUE)->orderBy('created_at', 'desc')->get();
        return view ('article.by-user', compact('articles', 'user'));
    }
    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', TRUE)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }
}