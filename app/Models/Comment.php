<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['comment','user_id','post_id'];

    // a comment belongs to only one  user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // a comment belong to only one post

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
