<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'category_id', 'slug', 'excerpt', 'body'];

    protected $guarded = ['id'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {
        // check if there's a search request
        // if(request('search')) {
        //     return $query->where('title', 'like', '%' . request('search') . '%')
        //             ->orwhere('body', 'like', '%' . request('search') . '%');
        // }
        // if($filters['search'] ?? false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //             ->orwhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                    ->orwhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            }); 
        });

        $query->when($filters['author'] ?? false, fn($query, $author) => 
            $query->whereHas('author', fn($query) => 
                $query->where('name', $author)
            )
        );
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
