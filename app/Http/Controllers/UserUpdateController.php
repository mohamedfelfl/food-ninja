<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserUpdateController extends Controller
{
    use response;

    public function updateBasicInfo(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'receive_offers' => 'required',
        ]);
        $user = $request->user();
        $user->name = $request->input('name');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('name');
        $user->receive_offers = $request->input('receive_offers');
        if($user->save()){
            $token = $user->createToken("token")->plainTextToken;
            return $this->jsonResponseMessage('User saved successfully', data: [
                'user' => User::where('email', $user->email)->first(),
                'token' => $token,
            ]);
        }else{
            return $this->jsonResponseMessage('Something went wrong', false);
        }

    }
}
