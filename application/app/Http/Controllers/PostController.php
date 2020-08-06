<?php

namespace App\Http\Controllers;

use App\Interfaces\PostServiceInterface;
use App\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postService;
    private $userService;

    public function __construct(PostServiceInterface $postService, UserServiceInterface $userService)
    {
        $this->postService = $postService;
        $this->userService = $userService;
    }

    public function getDashboard($user_id)
    {
        $user = $this->userService->getUserById($user_id);
        $posts = $this->postService->getAllPostsByUser($user_id);
        $whosepost = $this->postService->whosePostIs($user_id);
        $loggedUser = $this->userService->getAuthUser();
        $allPosts = $this->postService->getAllPosts();
        return view('dashboard', ['posts' => $posts, 'user' => $user, 'loggeduser' => $loggedUser, 'allPosts'=>$allPosts])->with(['whoseposts' => $whosepost]);
    }

    public function getPost($user_id, $post_id)
    {
        $user = $this->userService->getUserById($user_id);
        $posts = $this->postService->getPostbyId($post_id);
        $loggedUser = $this->userService->getAuthUser();
        if (Auth::id() != $user_id) {
            event('postHasViewed', $posts);
        }
        return view('posts', ['posts' => $posts, 'user' => $user, 'loggeduser'=>$loggedUser]);
    }


    public function postCreatePost(Request $request, $user_id)
    {
        $this->validate($request, [
            'title' => 'required|max:1000',
            'body' => 'required|max:1000'
        ]);
        $user = $this->userService->getUserById($user_id);
        $post = $this->postService->postCreate($request);
        $message = $this->postService->createErrorMessage($request, $post);
        return redirect()->route('dashboard', ['user_id' => $user])->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = $this->postService->deletePost($post_id);
        $user = $this->userService->getAuthId();
        return redirect()->route('dashboard', ['user_id' => $user])->with([
            'message' => 'successfuly deleted'
        ]);
    }

    public function postEditPost(Request $request)
    {
        $post = $this->postService->updatePost($request);
        return response()->json(['new_title' => $post->title, 'new_body' => $post->body], 200);
    }
}
