<?php

namespace App\Http\Controllers;

use Socialite;
use App\User;
use Carbon\Carbon;
use Auth;
use Hash;
use Cookie;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user(); 
        $token = $user->token;
        $check = User::where('email',$user->getEmail())->get();
        $username = $user->getName();
        $password = Hash::make("1");
        if(count($check) == 0){
            $acc = new User;
            $acc->email = $user->getEmail();
            $acc->username = $user->getName();
            $acc->password = $password;
            $acc->address = "NULL";
            $acc->firstname = "NULL";
            $acc->lastname = "NULL";
            $acc->mediaID = $user->getAvatar();
            $acc->telephone = 1111111;
            if($user->user['gender'] == "male"){
                $acc->gender = 1;
            }else{
                $acc->gender = 0;
            }
            $acc->dateofcreate  = Carbon::now()->toDateTimeString();
            $acc->remember_token = $token;
            $acc->save();
        }

        if (Auth::attempt(['username' => $username, 'password' => 1])) {   
            Cookie::queue('login', 1, 180);  
            return redirect("/");                        
        }
    }
}