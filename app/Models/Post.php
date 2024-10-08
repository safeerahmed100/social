<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'post_content',
      
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Comments(){
        return $this->hasMany(Comment::class);
    }
}
