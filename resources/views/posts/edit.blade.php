@extends('layouts.app')

@section('content')
    <div class="my-6">
        <h2 class="w-full text-center text-xl font-bold">ブースデータ編集</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="w-full max-w-2xl flex flex-wrap justify-center">
            @csrf
            @method('PUT')
                <div class="form-control w-9/12 my-4">
                    <label for="booth_id" class="label">
                        <span class="label-text">どこのブース？</span>
                    </label>
                    <select name="booth_id" class="select select-bordered w-full">
                        <option disabled>ブースを選ぶ</option>
                        @for($i = 0; $i < 51; $i++)
                            @if($post->booth_id == $i)
                                <option value={{ $i }} selected>{{ $booths[$i]['name'] }}</option>
                            @else
                                <option value={{ $i }}>{{ $booths[$i]['name'] }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="form-control w-9/12 my-4">
                    <label for="datetime" class="label">
                        <span class="label-text">作業時刻</span>
                    </label>
                    <select name="datetime" class="select select-bordered w-full">
                        <option value="{{ $post->datetime }}" selected>保存時間({{ $post->datetime }})</option>
                        @for($i = 11; $i < 21; $i++)
                            <option value="{{ $post->datetime->format('Y-m-d') }} {{ $i }}:00:00">{{ $i }}:00</option>
                            <option value="{{ $post->datetime->format('Y-m-d') }} {{ $i }}:20:00">{{ $i }}:20</option>
                            <option value="{{ $post->datetime->format('Y-m-d') }} {{ $i }}:40:00">{{ $i }}:40</option>
                        @endfor
                    </select>
                </div>
                <div class="form-control w-9/12 my-4">
                    <label for="before_paper" class="label">
                        <span class="label-text">ペーパー残量:前 (％)</span>
                    </label>
                    <select name="before_paper" class="select select-bordered w-full">
                        @for($i = 0; $i < 11; $i++)
                            @if($post->before_paper == 200 - ($i*10*2))
                                <option value={{ $post->before_paper }} selected>{{ $post->before_paper }}</option>
                            @else
                                <option value="{{ 200 - ($i*10*2) }}">{{ 200 - ($i*10*2) }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="form-control w-9/12 my-4">
                    <label for="after_paper" class="label">
                        <span class="label-text">ペーパー残量:後 (％)</span>
                    </label>
                    <select name="after_paper" class="select select-bordered w-full">
                        @for($i = 0; $i < 11; $i++)
                            @if($post->after_paper == 200 - ($i*10*2))
                                <option value={{ $post->after_paper }} selected>{{ $post->after_paper }}</option>
                            @else
                                <option value="{{ 200 - ($i*10*2) }}">{{ 200 - ($i*10*2) }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            <button type="submit" class="btn btn-primary btn-outline w-9/12 my-6">データを更新する</button>
        </form>
    </div>

@endsection