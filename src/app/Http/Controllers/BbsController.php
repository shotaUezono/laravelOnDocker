<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

Class BbsController extends Controller{
    public function index(){
        return view('bbs.index');
    }
    
    public function create(Request $request){
    
        /*
        バリデーションチェック
        laravelにはvalidate関数が用意してあるのでそれを使う
        */
        $request->validate([
            'name' => 'required|max:10',
            'comment' => 'required|min:5|max:140'
        ]);
        
        /*
        Postの中身は$requestに入っている
        それらを変数に渡す ->はオブジェクト参照
        input要素の中身を参照
        */
        $name = $request->input('name');
        $comment = $request->input('comment');
        
        return view('bbs.index')->with([
            "name" => $name,
            "comment" => $comment
        ]);
        
    }
}
?>