<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Api\V1\UserPassword;
use App\Http\Controllers\AbstractApiController;
use App\Http\Requests\Api\V1\PasswordCreateRequest;

class UserPasswordController extends AbstractApiController
{
    const PAGE_SIZE_DEFAULT = 30;


    /**
     * @return [type]
     */
    public function index()
    {
        if (auth()->check()) {
            $auth = auth('api');
            $user = $auth->user();
            $password = UserPassword::queryPagination()->with('user');
            $password->where('user_id', $user->id);
            return $this->paginateResponse($password);
        } else {
            return $this->errorResponse('not logged in', 4000);
        }
    }

    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public function decryptPassword($id)
    {
        $encryptionData = UserPassword::decryptPassword($id);
        return $this->modelResponse($encryptionData);
    }

    public function createPasswordRecord(PasswordCreateRequest $request){
        $data =$request->validated();
        

    }
}
