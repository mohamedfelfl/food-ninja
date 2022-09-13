<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use response;

    public function save(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            return $this->jsonResponseMessage('The user already exists', false);
        } else {
            //$verificationCode = $this->generateVerificationCode();
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $token = $user->createToken("token")->plainTextToken;
            $user->token = $token;
            //$user->addresses = $request->input('addresses');
            /*            $data = [
                            'name' => $user->name,
                            'email' => $user->email,
                            'verification_code' => $verificationCode,
                        ];*/
            if ($user->save()) {
                //MailController::sendEmail($data);
                return $this->jsonResponseMessage('User saved successfully', data: [
                    'name' => $user->name,
                    'email' => $user->email,
                    'token' => $user->token
                ]);
            } else {
                return $this->jsonResponseMessage('Something went wrong', false);
            }
        }

    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if($user){
            if(Hash::check($request->input('password'), $user->password)){
                return $this->jsonResponseMessage('Login Successful', true, data: [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'token' => $user->token
                ]);
            }else{
                return $this->jsonResponseMessage('Invalid Password', false);
            }
        }else{
            return $this->jsonResponseMessage('User does not exist', false);
        }
    }

}
