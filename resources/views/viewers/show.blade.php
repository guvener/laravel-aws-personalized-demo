<x-guest-layout>
<div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex justify-between items-center">
            <a href="/" class="my-3 block text-lg font-semibold bg-gray-200 hover:bg-gray-300 px-8 py-2 rounded">Back</a>
        </div>

        <div class="pb-9 pt-3 text-center text-4xl font-bold">
            <div class="pb-3">Viewer #{{ $viewer->id }}</div>
            <a href="/viewers/{{ $viewer->id }}/personalize" class="my-3 bg-blue-600 hover:bg-indigo-600 text-white px-8 py-2 rounded text-xl font-semibold">Personalize</a>
        </div>


        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="inline-block min-w-full">
                <h1 class="text-md pb-3 font-semibold block">Viewer Taged</h1>
                <div class=" grid grid-cols-2 lg:grid-cols-3 gap-5">
                    @php $counter = 0; @endphp
                    @foreach($tags as $movie_id => $tagResults)
                    @php $counter++; @endphp
                    <div class="bg-white px-5 py-2 shadow">
                        <div class="text-lg text-center py-3">{{ $movies[$movie_id]->title}}</div>
                        @if($counter < 10)
                        <img src="{{ $movies[$movie_id]->metadata('Poster') }}" class="w-full" />
                        <span class="text-xs text-gray-400">#{{ $movies[$movie_id]->id }}</span>
                        @endif
                        <div class="block mt-3">
                        @foreach($tagResults as $atag)
                            <span class="px-3 bg-gray-50 mb-2 inline-block font-semibold border rounded-full text-sm py-1">{{ $atag->tag }}</span>
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                <h1 class="text-md pb-3 font-semibold block mt-12 ">Viewer Rated</h1>

                <div class=" grid grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach($ratings as $movie_id => $rating)
                    <div class="bg-white p-5 shadow flex justify-center items-center flex-col">
                        <div class="mb-3 text-center">
                            {{ $movies[$movie_id]->title}}
                        </div>

                        <div class="text-xl font-semibold rounded-full overflow-hidden">
                            @if($rating[0]->rating > 3)
                            <div class="px-3 py-1 text-green-600 bg-green-100">{{ $rating[0]->rating }}</div>
                            @elseif($rating[0]->rating < 3)
                            <div class="px-3 py-1 text-red-600 bg-red-100">{{ $rating[0]->rating }}</div>
                            @else
                            <div class="px-3 py-1 text-yellow-600 bg-yellow-100">{{ $rating[0]->rating }}</div>
                            @endif
                        </div>

                    </div>
                    @endforeach
                </div>

            </div>

        </div>


    </div>
</x-guest-layout>
