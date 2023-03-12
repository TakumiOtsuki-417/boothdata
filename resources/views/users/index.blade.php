@extends('layouts.app')

@section('content')
    <div class="my-6">
        <h2 class="w-full text-center text-xl font-bold">登録スタッフ一覧</h2>
    </div>
    @if(isset($users) && count($users)>=1)
        <div class="w-full max-w-3xl py-10 mx-auto overflow-x-scroll md:overflow-x-auto">
            <table class="table table-compact w-full mb-10">
                <thead>
                    <tr>
                        <th class="text-center w-3/12 style-sticky-cancel">氏名</th>
                        <th class="text-center w-3/12">ポジション</th>
                        <th class="text-center w-3/12">アドレス</th>
                        <th class="text-center w-3/12">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @forEach($users as $user => $contents)
                    @forEach($contents as $content)
                    <tr>
                        <td>{{ $content->name }}</td>
                        <td class="text-center">{{ $content->position }}</td>
                        <td class="text-center">{{ $content->email }}</td>
                        <td class="flex gap-4 justify-center">
                            <a class="text-sky-500" href="{{ route('users.edit', $content->id) }}">編集</a>
                            {{-- メッセージ削除フォーム --}}
                            <form method="POST" action="{{ route('users.destroy', $content->id) }}">
                            @csrf
                            @method('DELETE')
                                <button class="text-red-500" type="submit" onclick="return confirm('削除します。よろしいですか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforEach
                    @endforEach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex justify-center w-full my-8">
            <p>まだデータはありません</p>
        </div>
    @endif
@endsection