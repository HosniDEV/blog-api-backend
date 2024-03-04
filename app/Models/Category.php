<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


 protected $fillable=['name','user_id'];
    // a  category can create
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function  posts(){
        return $this->hasMany(Post::class);
    }

}
