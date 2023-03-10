<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Api\V1\UserPassword;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\UserPassword\ListResource;

class UserPasswordController extends Controller
{
    const PAGE_SIZE_DEFAULT = 30;

    public function index(Request $request, Bool $forRss = false)
    {
        $password = UserPassword::paginate(10);
        ListResource::collection($password);
        return response()->json([
            'password' => $password,
        ]);
    }
}
