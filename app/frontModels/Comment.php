<?php

namespace App\frontModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_name', 'email','subject','message'];
    protected $attributes= ['subject'=>'نظر'];


}
