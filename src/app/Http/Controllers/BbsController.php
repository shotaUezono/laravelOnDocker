<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bbs;

Class BbsController extends Controller{
    public function index(){
        $bbs = Bbs::all();
        return view('bbs.index', ["bbs" => $bbs]);
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
        
        //名前とコメントをbbsテーブルへinsertする。
        Bbs::insert(["name" => $name, "comment" => $comment]);
        
        //bbsテーブルの内容を全取得
        $bbs = Bbs::all();
        
        return view('bbs.index')->with([ "bbs" => $bbs ]);
        // return view('bbs.index')->with(["bbs" => $bbs, "name" => $name, "comment" => $comment ]);
        
    }
}
?>