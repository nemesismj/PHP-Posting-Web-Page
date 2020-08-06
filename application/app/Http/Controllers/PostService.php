<?php

namespace App\Http\Controllers;

use App\Interfaces\PostServiceInterface;
use App\Interfaces\UserServiceInterface;
use App\Post;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService implements PostServiceInterface
{

    public function postCreate(Request $request)
    {
        $container = Container::getInstance();
        $post = $container->make(Post::class);
        $post->title = $request['title'];
        $post->body = $request['body'];
        return $post;
    }

    public function createErrorMessage(Request $request, $post)
    {
        $message = ' There was an error ';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfuly created';
        }
        return $message;
    }

    public function getPostbyId($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        return $post;
    }

    public function whosePostIs($user_id)
    {
        $whosepost = 'My Posts';
        if (Auth::id() != $user_id) {
            $whosepost = 'His Posts';
        }
        return $whosepost;
    }

    public function getAllPostsByUser($user_id)
    {
        $user = (new UserService)->getUserById($user_id);
        $posts = $user->posts()->get();
        return $posts;
    }

    public function getAllPosts(){
        return Post::all();
    }

    public function deletePost($post_id)
    {
        $post = PostService::getPostbyId($post_id);
        if (Auth::user() != $post->user) {
            return redirect()->route('dashboard', ['user_id' => Auth::id()]);
        }
        return $post->delete();

    }

    public function updatePost(Request $request)
    {
        $post = PostService::getPostbyId($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->route('dashboard', ['user_id' => Auth::id()]);
        }
        $post->title = $request['body'];
        $post->body = $request['body1'];
        $post->update();
        return $post;
    }
}
