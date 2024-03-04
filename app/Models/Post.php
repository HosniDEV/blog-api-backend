<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable =['title','slug','content','published','user_id','category_id','image'];
// a post belongs to only one user

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

//  a  post can has one or many comments

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //  a  post can has one or many tags
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
