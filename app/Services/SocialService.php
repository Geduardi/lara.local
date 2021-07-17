<?php


namespace App\Services;


use App\Models\User;

class SocialService
{
    public function updateUser($user): bool
    {


        $email = $user->getEmail();
        $authUser = User::where('email', $email)->first();
//        $authUser = User::all()->where('email', $email)->first();

        if ($authUser){
//            \Auth::login($authUser);
            $authUser->name = $user->getName();
            $authUser->avatar = $user->getAvatar();
            dump($authUser->name);
            dump($authUser->avatar);
            dump($authUser);
//            dd($authUser->save);
            dd($authUser->save);
            return $authUser->save;


        }

        return false;
    }
}
