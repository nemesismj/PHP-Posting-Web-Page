<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface LikeServiceInterface
{
    public function like(Request $request);
}
