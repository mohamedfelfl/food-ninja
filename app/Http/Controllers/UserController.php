<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use response;

    public function save(Request $request)
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
            //$user->verification_code = $verificationCode;
            //$user->addresses = $request->input('addresses');
            /*            $data = [
                            'name' => $user->name,
                            'email' => $user->email,
                            'verification_code' => $verificationCode,
                        ];*/
            if ($user->save()) {
                //MailController::sendEmail($data);
                return $this->jsonResponseMessage('User saved successfully');
            } else {
                return $this->jsonResponseMessage('Something went wrong', false);
            }
        }

    }
}
