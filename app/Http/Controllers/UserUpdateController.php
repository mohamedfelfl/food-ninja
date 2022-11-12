<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserUpdateController extends Controller
{
    use response;

    public function updateBasicInfo(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'receive_offers' => 'required',
        ]);
        $user = $request->user();
        $user->name = $request->input('name');
        if($request->has('birthdate'))
            $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');
        $user->receive_offers = $request->input('receive_offers');
        if($user->save()){
            return $this->jsonResponseMessage('User updated successfully', data: [
                'user' => User::where('email', $user->email)->first(),
            ]);
        }else{
            return $this->jsonResponseMessage('Something went wrong', false);
        }

    }
    public function updatePassword(Request $request): JsonResponse
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        $user = $request->user();
        $isPasswordCorrect = Hash::check($request->input('old_password'), $user->password);
        if($isPasswordCorrect){
            $user->password = Hash::make($request->input('new_password'));
            if($user->save()){
                return $this->jsonResponseMessage('User updated successfully', data: [
                    'user' => User::where('email', $user->email)->first(),
                ]);
            }else{
                return $this->jsonResponseMessage('Something went wrong', false);
            }
        }else{
            return $this->jsonResponseMessage('Incorrect password', false);
        }



    }
    public function updateEmail(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required',
        ]);
        $isEmailExists = User::where('email', $request->input('email'))->first();
        if($isEmailExists){
            return $this->jsonResponseMessage('Email already exists', false);
        }
        $user = $request->user();
        $user->email = $request->input('email');
        if($user->save()){
            return $this->jsonResponseMessage('User updated successfully', data: [
                'user' => User::where('email', $user->email)->first(),
            ]);
        }else{
            return $this->jsonResponseMessage('Something went wrong', false);
        }

    }
    public function updateCards(Request $request): JsonResponse
    {
        $request->validate([
            'cards' => 'required',
        ]);
        $user = $request->user();
        $user->cards = $request->input('cards');
        if($user->save()){
            return $this->jsonResponseMessage('User updated successfully', data: [
                'user' => User::where('email', $user->email)->first(),
            ]);
        }else{
            return $this->jsonResponseMessage('Something went wrong', false);
        }

    }
    public function updateAddresses(Request $request): JsonResponse
    {
        $request->validate([
            'addresses' => 'required',
        ]);
        $user = $request->user();
        $user->addresses = $request->input('addresses');
        if($user->save()){
            return $this->jsonResponseMessage('User updated successfully', data: [
                'user' => User::where('email', $user->email)->first(),
            ]);
        }else{
            return $this->jsonResponseMessage('Something went wrong', false);
        }

    }

    public function updateImage(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|file',
        ]);
        $user= $request->user();
        $path = $request->file('image')->store('storage/user_profile_images');
        $user->image_url = asset($path);
        if($user->save()){
            return $this->jsonResponseMessage('User updated successfully', data: [
                'user' => User::where('email', $user->email)->first(),
            ]);
        }else{
            return $this->jsonResponseMessage('Something went wrong', false);
        }
    }

    public function getImage()
    {
        return Storage::get();
    }
}
