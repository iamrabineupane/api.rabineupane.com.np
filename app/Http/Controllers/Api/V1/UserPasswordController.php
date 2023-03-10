<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Api\V1\UserPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Resources\Api\V1\UserPassword\ListResource;

class UserPasswordController extends Controller
{
    const PAGE_SIZE_DEFAULT = 30;

    /**
     * @param Request $request
     * @param Bool $forRss
     * 
     * @return [type]
     */
    public function index(Request $request, Bool $forRss = false)
    {
        $password = UserPassword::paginate(10);
        ListResource::collection($password);
        return response()->json([
            'password' => $password,
        ]);
    }

    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public function decryptPassword($id)
    {
        $encryptionData = UserPassword::where('id', $id)->first();
        return response()->json([
            'data' => [
                'password' => Crypt::decryptString($encryptionData->password)
            ],
        ]);
    }
}
