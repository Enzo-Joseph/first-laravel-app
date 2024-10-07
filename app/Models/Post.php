<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SebastianBergmann\Type\VoidType;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use hasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            isset($filters['search']) ? $filters['search'] : false,
                fn ($query, $search) =>
                    $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            isset($filters['category']) ? $filters['category'] : false,
            fn ($query, $category)=>
                $query->whereHas('category', fn($query) =>
                $query->where('slug', $category))
        );

        $query->when(
            isset($filters['author']) ? $filters['author'] : false,
            fn ($query, $author)=>
                $query->whereHas('author', fn($query) =>
                $query->where('username', $author))
        );
    }

}

