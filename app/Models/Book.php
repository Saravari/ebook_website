<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Book extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [ 'name', 'status', 'description','writer', 'image', 'slug', 'upload_file', 'user_id', 'price'];

    protected $attributes= ['hit'=>1];

    public function categories()
    {
    return $this->belongsToMany(Category::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function purchases()
    {
    return $this->belongsToMany(Purchase::class);
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
