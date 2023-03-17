<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Api\V1\User;
use App\Http\Requests\Api\V1\AuthRequest;
use App\Http\Controllers\AbstractApiController;

class AuthController extends AbstractApiController
{
    //
    /**
     * @param AuthRequest $request
     * 
     * @return [type]
     */
    public function login(AuthRequest $request)
    {
        $credentials =$request->validated();
        $token = auth()->attempt($credentials);
        if (empty($token)) {
            return $this->errorResponse('認証エラー', 401000);
        }
        $token = $this->makeJwtToken($token);
        return $this->modelResponse($this->getUserResponse(), $token, 200000);
    }
    private function makeJwtToken($token) {
        return [
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60

        ];
    }

    /**
     * @return [type]
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    /**
     * @return [type]
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    /**
     * @return [type]
     */
    private function getUserResponse()
    {
        $user = auth()->user();
        if (empty($user)) {
            return null;
        }
        if (!($user instanceof User)) {
            return null;
        }
        return $user;
    }

    
    /**
     * @return [type]
     */
    public function me()
    {
        return $this->modelResponse($this->getUserResponse());
    }
}
