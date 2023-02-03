<?php

namespace App\Models;


use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body'
    ];

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function users() {
        return $this->belongsToMany(User::class, 'post_user', 'user_id', 'post_id');
    }
}
