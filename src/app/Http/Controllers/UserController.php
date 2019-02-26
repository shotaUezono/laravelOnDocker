<?php

namespace App\Http\Controllers;
use App\User;
class UserController extends Controller
{
    public function index()
    {
        // データの追加 emailの値はランダムな文字列を使用。「.」で文字列の連結
        //$email = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8) . '@yyyy.com';
        //User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxxx']);
        // 全データの取り出し
        $users = User::all();
        return view('user', ['users' => $users]);
    }
    
    public function show(User $user){
        //$key = ((int)$user) - 1;
        //$u = User::all()[$key];
        //print_r($user->id);
        //print_r($user->name);
        //print_r($user->email);
        return view('show', compact('user'));
    }
}

/*
namespace App\Http\Controllers;
class UserController extends Controller
{
    public function index()
    {
        // ただの変数定義ですが、ここでModelにデータの処理を行わせたりします（後述）。
        $name = 'yamada taro';

        // ここでuserビュー「user.blade.php」を呼び出し、データ「name」を渡している。
        return view('user', ['name' => $name]);
    }
}
*/