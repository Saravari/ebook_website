<?php

namespace App\frontModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id',
        'book_id' ];
    
    protected $attributes= ['qty'=>1];


    use HasFactory;
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function books()
    {
    return $this->belongsToMany(Book::class);
    }
}
