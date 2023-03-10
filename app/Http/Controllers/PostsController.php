<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function index()
    {
        $data = [];
        $user = Auth::user();
        $booths = Post::BOOTHS;
        $today = Carbon::now();
        $weekago = $today->subDay(30);
        $posts = Post::where('datetime', '>=', $weekago)->orderBy('datetime', 'desc')->get()->groupBy('booth_id');

        
        // floor用ボタン作成準備（全フロアカテゴリの文字列取得）
        $floor_tabs = [];
        forEach($booths as $booth){
            if(!in_array($booth['floor'], $floor_tabs)){
                $floor_tabs[] = $booth['floor'];
            }
        }

        $data = [
            'posts'=>$posts,
            'booths'=>$booths,
            'floor_tabs'=>$floor_tabs,
            'user'=>$user,
        ];
        // dashboardビューでそれらを表示
        return view('dashboard', $data);

    }
    public function create()
    {
        $post = new Post;
        $booths = Post::BOOTHS;
        return view('posts.create', [
            'post'=>$post,
            'booths'=>$booths,
        ]);
    }
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'booth_id' => 'required|numeric',
            'datetime' => 'required',
            'before_paper' => 'required|numeric|between:0,200',
            'after_paper' => 'required|numeric|between:0,200',
        ]);
        
        $today = Carbon::today();
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->posts()->create([
            'booth_id' => $request->booth_id,
            'datetime' => $request->datetime,
            'before_paper' => $request->before_paper,
            'after_paper' => $request->after_paper,
        ]);
        
        return redirect('/');
    }
    public function edit($id)
    {
        if(Auth::user()->is_admin == false){
            return redirect('/');
        }
        $post = Post::findOrFail($id);
        $booths = Post::BOOTHS;
        return view('posts.edit', [
            'post' => $post,
            'booths' => $booths,
        ]);
    }
    public function update(Request $request, $id)
    {
        if(Auth::user()->is_admin == false){
            return redirect('/');
        }
        $post = Post::findOrFail($id);
        // バリデーション
        $request->validate([
            'booth_id' => 'required|numeric',
            'datetime' => 'required',
            'before_paper' => 'required|numeric|between:0,200',
            'after_paper' => 'required|numeric|between:0,200',
        ]);
        // 対象のデータを更新
        $post->update([
            'booth_id' => $request->booth_id,
            'datetime' => $request->datetime,
            'before_paper' => $request->before_paper,
            'after_paper' => $request->after_paper,
        ]);
        
        return redirect('/');
        
    }
    public function destroy($id)
    {
        if(Auth::user()->is_admin == false){
            return redirect('/');
        }
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/');
    }
    public function floor(Request $request)
    {
        
        // リクエストに必ず指定floorが入っている
        if(!$request->floor_tab) {
            return redirect('/');
        }
        $floor = $request->floor_tab;
        $floor_booths = [];
        $data = [];
        $user = Auth::user();
        $booths = Post::BOOTHS;
        $today = Carbon::now();
        $weekago = $today->subDay(30);

        // フロア該当のbooth_idを抽出
        forEach($booths as $booth){
            if($booth['floor'] == $floor){
                $floor_booths[] = $booth['id'];
            }
        }
        // 該当するブースデータを検索
        $posts = Post::whereIn('booth_id', $floor_booths)
        ->where('datetime', '>=', $weekago)
        ->orderBy('datetime', 'desc')->get()
        ->groupBy('booth_id');

        // floor用ボタン作成準備（全フロアカテゴリの文字列取得）
        $floor_tabs = [];
        forEach($booths as $booth){
            if(!in_array($booth['floor'], $floor_tabs)){
                $floor_tabs[] = $booth['floor'];
            }
        }
        
        $data = [
            'posts'=>$posts,
            'booths'=>Post::BOOTHS,
            'floor_tabs' => $floor_tabs,
            'user'=>$user,
        ];
        // dashboardビューでそれらを表示
        return view('dashboard', $data);

    }
}
