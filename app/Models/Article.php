<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Consoles;
use App\Models\Category;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'platform_id', 'body', 'image', 'user_id', 'category_id', 'is_accepted', 'slug', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function consoles()
    {
        return $this->belongsTo(Consoles::class , 'platform_id');
        // return $this->belongsTo(Consoles::class);
    }
    

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'platform' => $this->platform,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }
    public function getRouteKeyName(){

        return 'slug';
    }
    public function readDuration(){
        $totalWords = Str::wordCount($this->body);
        $minutesToRead = round($totalWords / 200);
        return intval ($minutesToRead);
    }
}
