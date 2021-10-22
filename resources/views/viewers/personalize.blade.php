<x-guest-layout>
<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <a href="/viewers/{{ $viewer->id }}" class="my-3 inline-block text-lg font-semibold bg-gray-200 hover:bg-gray-300 px-8 py-2 rounded">Back</a>
    </div>
    <div class="pt-9 pb-12 text-center text-4xl font-bold">
        <div class="pb-3">Personalized movie recomendations</div>
    </div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class=" grid grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($recommendations as $index => $movie)
            <div class="bg-white px-5 py-2 shadow">
                <div class="text-lg text-center py-3">{{ $movie->title }}</div>
                @if($index < 9)
                <img src="{{ $movie->metadata('Poster') }}" />
                <span class="text-xs text-gray-400">#{{ $movie->id }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
</x-guest-layout>