<?php

namespace App\Http\Controllers;

use App\Interfaces\LikeServiceInterface;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    private $likeService;

    public function __construct(LikeServiceInterface $likeService)
    {
        $this->likeService = $likeService;
    }

    public function postLikePost(Request $request)
    {
        return $this->likeService->like($request);
    }
}
