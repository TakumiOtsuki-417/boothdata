@extends('layouts.app')

@section('content')
    <div class="my-6">
        <h2 class="w-full text-center text-xl font-bold">ブースデータ登録</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('posts.store') }}" class="w-full max-w-2xl flex flex-wrap justify-center">
            @csrf
                <div class="form-control w-9/12 my-4">
                    <label for="booth_id" class="label">
                        <span class="label-text">どこのブース？</span>
                    </label>
                    <select name="booth_id" class="select select-bordered w-full">
                        <option disabled selected>ブースを選ぶ</option>
                        @for($i = 0; $i < 51; $i++)
                            <option value={{ $i }}>{{ $booths[$i]['name'] }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-control w-9/12 my-4">
                    <label for="datetime" class="label">
                        <span class="label-text">作業時刻</span>
                    </label>
                    <select name="datetime" class="select select-bordered w-full">
                        @for($i = 11; $i < 21; $i++)
                            <option value="{{ \Carbon\Carbon::today()->format('Y-m-d') }} {{ $i }}:00:00">{{ $i }}:00</option>
                            <option value="{{ \Carbon\Carbon::today()->format('Y-m-d') }} {{ $i }}:20:00">{{ $i }}:20</option>
                            <option value="{{ \Carbon\Carbon::today()->format('Y-m-d') }} {{ $i }}:40:00">{{ $i }}:40</option>
                        @endfor
                    </select>
                </div>
                <div class="form-control w-9/12 my-4">
                    <label for="before_paper" class="label">
                        <span class="label-text">ペーパー残量:前 (％)</span>
                    </label>
                    <select name="before_paper" class="select select-bordered w-full">
                        <option disabled selected>残量を選ぶ</option>
                        @for($i = 0; $i < 11; $i++)
                            <option value="{{ 200 - ($i*10*2) }}">{{ 200 - ($i*10*2) }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-control w-9/12 my-4">
                    <label for="after_paper" class="label">
                        <span class="label-text">ペーパー残量:後 (％)</span>
                    </label>
                    <select name="after_paper" class="select select-bordered w-full">
                        <option disabled selected>残量を選ぶ</option>
                        @for($i = 0; $i < 11; $i++)
                            <option value="{{ 200 - ($i*10*2) }}">{{ 200 - ($i*10*2) }}</option>
                        @endfor
                    </select>
                </div>
            <button type="submit" class="btn btn-primary btn-outline w-9/12 my-6">データを送信する</button>
        </form>
    </div>

@endsection