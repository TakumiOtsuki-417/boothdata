@extends('layouts.app')

@section('content')

    <div class="my-6">
        <h2 class="w-full text-center text-xl font-bold">ログイン</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-full max-w-2xl flex flex-wrap justify-center">
            @csrf

            <div class="form-control w-9/12 my-4">
                <label for="email" class="label">
                    <span class="label-text">ポジションアドレス</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="form-control w-9/12 my-4">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary btn-outline w-9/12 my-6">ログインする</button>
        </font>

    </div>
@endsection