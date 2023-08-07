<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body'];

    public static function getAllPosts($id)
    {
        $allPosts = Post::where('user_id', $id)->get();
        return $allPosts;
    }

    public static function getSinglePost($post_id, $user_id)
    {
        $singlePost = Post::where('id', $post_id)
            ->where('user_id', $user_id)->first();
        return $singlePost;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
