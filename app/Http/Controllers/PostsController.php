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
        $posts = Post::all();
        $data = [
            'posts'=>$posts,
            'booths'=>Post::BOOTHS,
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
            'datetime' => 'required|date_format',
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
        
        // 前のURLへリダイレクトさせる
        return back();
        
    }
}
