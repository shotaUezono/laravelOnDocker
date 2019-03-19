<?php

namespace App\Http\Controllers;
use App\User;
use App\Model\Bbs;
use DB;

class TestApiController extends Controller
{
    public function index(User $user) : array
    {
        //print_r($user);
        $key = $user->name;
        $user_id = $user->id;
        $return_json = array();
        $bbs = DB::table('bbs')->select()->where('name', $key)->get();
        try{
        	foreach($bbs as $data => $value){
        		$return_json = array_merge($return_json, array($value));
        	}
        	//print_r($bbs);
        }catch(\Exception $e){
        	return array('id'=>null, 'name'=>null, 'comment'=>null);
        }
        return array('user_info' => $return_json);
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