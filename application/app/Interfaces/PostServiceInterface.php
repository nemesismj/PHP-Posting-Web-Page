<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PostServiceInterface
{
    public function postCreate(Request $request);

    public function createErrorMessage(Request $request, $post);

    public function getPostbyId($post_id);

    public function getAllPosts();

    public function whosePostIs($user_id);

    public function getAllPostsByUser($user_id);

    public function deletePost($post_id);

    public function updatePost(Request $request);
}
