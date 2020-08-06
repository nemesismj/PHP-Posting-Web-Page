<?php

namespace App\Http\Controllers;

use App\Interfaces\LikeServiceInterface;
use App\Like;
use App\Post;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;

class LikeService implements LikeServiceInterface
{


    public function like($request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true' ? true : false;
        $container = Container::getInstance();
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }

        } else {
            $like = $container->make(Like::class);;
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post_id;

        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
