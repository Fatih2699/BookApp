<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function detail()
    {
        $user = Auth::guard('api')->user();
        return $user;
    }

    public function update(Request $request)
    {
        $user = Auth::guard('api')->user();
        $input = $request->all();
        if ($request->hasFile('profile_img')) {
            $path = $request->file('profile_img')->store('users');
            $input['profile_img'] = $path;
        }
        $result = $user->update($input);
        if ($result) {
            $success['success'] = true;
            return $this->sendResponse($success, 'User is updated.');
        } else {
            $success['success'] = false;
            return $this->sendResponse($success, 'User is not updated.');
        }
    }
}
