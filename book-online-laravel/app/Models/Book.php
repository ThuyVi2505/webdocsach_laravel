<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Book extends Model
{
    use HasFactory;
    protected $table = "book";
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'book_name',
        'book_slug',
        'book_description',
        'book_image',
        'book_status',
        'genre_id',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
    
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function chapter(): hasMany
    {
        return $this->hasMany(Chapter::class, 'book_id', 'id');
    }
    public function latestChapters(): hasMany
    {
        return $this->hasMany(Chapter::class, 'book_id', 'id')->latest();
    }
}
