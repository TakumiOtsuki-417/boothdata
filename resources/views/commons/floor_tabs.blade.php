<form method="POST" action="{{ route('posts.floor') }}" class="flex w-full justify-center">
@csrf
@forEach($floor_tabs as $floor_tab)
    <button type="submit" name="floor_tab" value="{{ $floor_tab }}" 
    class="gap-x-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    >
    {{ $floor_tab }}</button>
@endforEach
</form>