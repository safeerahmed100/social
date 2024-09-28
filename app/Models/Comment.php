<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'comment_content',
      
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Post(){
        return $this->belongsTo(Post::class);
    }
}
