@extends('layouts.app')

@section('content')
    <div class="my-6">
        <h2 class="w-full text-center text-xl font-bold">スタッフポジション編集</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="w-full max-w-2xl flex flex-wrap justify-center">
            @csrf
            @method('PUT')
            <div class="form-control w-9/12 my-4">
                <label for="name" class="label">
                    <span class="label-text">氏名</span>
                </label>
                <input type="text" name="name" class="input input-bordered w-full" value='{{ $user->name }}'>
            </div>
            <div class="form-control w-9/12 my-4">
                <label for="position" class="label">
                    <span class="label-text">ポジション</span>
                </label>
                <select name="position" class="select select-bordered w-full">
                    @forEach($positions as $position)
                        @if($user->position == $position['name'])
                            <option selected>{{ $position['name'] }}</option>
                        @else
                            <option>{{ $position['name'] }}</option>
                        @endif
                    @endforEach
                </select>
            </div>
            <div class="form-control w-9/12 my-4">
                <label for="email" class="label">
                    <span class="label-text">ポジションアドレス</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full" value="{{ $user->email }}">
            </div>

            <div class="form-control w-9/12 my-4">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <div class="form-control w-9/12 my-4">
                <label for="password_confirmation" class="label">
                    <span class="label-text">パスワード確認</span>
                </label>
                <input type="password" name="password_confirmation" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary btn-outline w-9/12 my-6">更新する</button>
        </form>
    </div>

@endsection