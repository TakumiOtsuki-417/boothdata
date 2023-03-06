@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('commons.floor_tabs')
        <div class="w-full overflow-x-scroll">
            {{-- 投稿一覧ひとまず --}}
            @if(isset($posts) && count($posts)>=1)
                @forEach ($posts as $post => $contents)
                <p>{{ $booths[$post]['name'] }}</p>
                <table class="table table-compact w-full sm:overflow-x-scroll">
                    <thead>
                        <tr>
                            <th class="text-center">作業日時</th>
                            <th class="text-center">ブース名</th>
                            <th class="text-center">残量1</th>
                            <th class="text-center">残量2</th>
                            <th class="text-center">担当</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forEach($contents as $content)
                        <tr>
                            <td>{{ $content->datetime }}</td>
                            <td>{{ $booths[$content->booth_id]['name'] }}</td>
                            <td class="text-right">{{ $content->before_paper }}</td>
                            <td class="text-right">{{ $content->after_paper }}</td>
                            <td>{{ $content->user->name }}</td>
                        </tr>
                        @endforEach
                    </tbody>
                </table>
                @endforEach
            @else
                <p>まだデータはありません</p>
            @endif
        </div>
    @else
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10">
                <div class="max-w-md mb-10">
                    <h2>Welcome to the Microposts</h2>
                    {{-- ユーザ登録ページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">Sign up now!</a>
                </div>
            </div>
        </div>
    @endif
@endsection