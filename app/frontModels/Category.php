<?php

namespace App\frontModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug' ];

        public function books()
        {
           return $this->belongsToMany(Book::class);
        }
}