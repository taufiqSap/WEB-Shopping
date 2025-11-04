<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    
    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'content',
        'type',
        'is_published',
        'published_at',
    ];

    // TAMBAHKAN CASTS
    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Otomatis membuat slug dari title jika belum ada
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Scope untuk hanya menampilkan postingan yang sudah dipublikasikan
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->orderBy('published_at', 'desc');
    }

    // Akses URL detail postingan berdasarkan slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
