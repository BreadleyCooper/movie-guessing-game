
<div>
    @if($selectedMovie->title)
    <div class="flex w-full justify-center mx-auto">
        @foreach($stats as $key => $value)
            <div class="flex min-w-24 p-2 border border-black border-1 rounded-lg mx-2 {{ $selectedMovie->title ? $value : 'bg-gray-100' }}">
                <p>{{$key}}</p>
            </div>
        @endforeach
    </div>
    @endif
</div>
