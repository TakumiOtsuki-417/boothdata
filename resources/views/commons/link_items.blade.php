@if (Auth::check())
    <li><a class="link link-hover" href="{{ route('posts.create') }}">データ作成</a></li>
    <li class="divider lg:hidden"></li>
    {{-- スタッフ登録へのリンク（管理者のみ） --}}
    @if(Auth::user()->is_admin == true)
        <li><a class="link link-hover" href="{{ route('register') }}">スタッフ登録</a></li>
    @endif
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
@endif