<?php

namespace App\Http\Controllers;

use App\Models\GameUsersList;
use App\Models\UsersScore;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register($game)
    {
        return view("register", ["game" => $game]);
    }


    public function store($game)
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

//        dd(request());
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
            ]
        );

        $email = str(rand())."@mail.com";

        $pass = Hash::make($validated['name']);


        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $email,
                'password' => $pass,
            ]
        );

        GameUsersList::create([
            "game_id" => $game,
            "user_id" => $user->id,
        ]);
        UsersScore::create([
            'user_id' => $user->id,
            'game_id' => $game,
            'question' => "1",
            'score' => 0,
        ]);
        if (auth()->attempt(["email"=>$email, "password" => $validated['name']])) {
            request()->session()->regenerate();

            return redirect('/games/'.$game);
        }
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/games/1');
    }
}
