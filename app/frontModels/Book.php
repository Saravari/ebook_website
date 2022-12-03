<?php

namespace App\frontModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [ 'name','slug', 'status', 'description','writer', 'image', 'user_id'];

    protected $attributes= ['hit'=>1];

    public function categories()
    {
    return $this->belongsToMany(Category::class);
    }

    public function users()
    {
    return $this->belongsToMany(User::class);
    }
    public function purchases()
    {
    return $this->belongsToMany(Purchase::class);
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
