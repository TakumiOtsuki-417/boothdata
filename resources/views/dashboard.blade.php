@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('commons.floor_tabs')
            {{-- 投稿一覧 --}}
            @if(isset($posts) && count($posts)>=1)
                @forEach ($posts as $post => $contents)
                <div class="w-full max-w-3xl py-10 mx-auto overflow-x-scroll md:overflow-x-auto">
                <table class="table table-compact w-full mb-10">
                    <caption class="text-left font-bold text-xl">{{ $booths[$post]['name'] }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center w-3/12 style-sticky-cancel">作業日時</th>
                            <th class="text-center w-3/12">残量1</th>
                            <th class="text-center w-3/12">残量2</th>
                            <th class="text-center w-3/12">担当</th>
                            @if($user->is_admin == true)
                                <th class="text-center w-2/12">操作</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forEach($contents as $content)
                        <tr>
                            <td>{{ $content->datetime }}</td>
                            <td class="text-center">{{ $content->before_paper }}</td>
                            <td class="text-center">{{ $content->after_paper }}</td>
                            <td>{{ $content->user->name }}({{ $content->user->position }})</td>
                            @if($user->is_admin == true)
                                <td class="flex gap-4">
                                    <a class="text-sky-500" href="{{ route('posts.edit', $content->id) }}">編集</a>
                                    {{-- メッセージ削除フォーム --}}
                                    <form method="POST" action="{{ route('posts.destroy', $content->id) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button class="text-red-500" type="submit" onclick="return confirm('削除します。よろしいですか？')">削除</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforEach
                    </tbody>
                </table>
            </div>
                @endforEach
            @else
                <div class="flex justify-center w-full my-8">
                    <p>まだデータはありません</p>
                </div>
            @endif
        </div>
    @else
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10">
                <div class="max-w-md mb-10">
                    <h2>ログインをしてください</h2>
                    {{-- ユーザ登録ページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('login') }}">ログイン</a>
                </div>
            </div>
        </div>
    @endif
@endsection