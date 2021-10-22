<x-guest-layout>
<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="text-md py-8 font-semibold block bg-indigo-100 mb-6 px-6 rounded-lg shadow-xl bg-gradient-to-r from-purple-800  to-red-500 text-white text-center">
            <h1 class="text-2xl pb-2 font-bold max-2w-xl mx-auto">Select a viewer below, see details and get personalized movie recommendations based on viewer's rated and tagged movies.</h1>
        </div>
        <div class="pt-2 text-xs text-center">Demo using <a target="_blank" href="https://aws.amazon.com/personalize/" class="underline">AWS Personalize</a>
        with training data from <a target="_blank" href="http://files.grouplens.org/datasets/movielens/" class="underline">Movie Lens Dataset</a>
        and movie meta data from <a target="_blank" href="http://www.omdbapi.com/" class="underline">Open Movie Database</a>.
        Resource <a target="_blank" href="https://aws.amazon.com/getting-started/hands-on/real-time-movie-recommendations-amazon-personalize/" class="underline">AWS Lab</a>.
    </div>
    @if(count($viewers) < 1)


        <div class="flex flex-col items-center border bg-white p-5 mt-10">
            <div class="text-xl pt-2 font-semibold text-gray-600">Database is empty.</div>
            <div class="text-md pt-2">Download and import personalized demo movie database dump from Github.</div>

            <div class="my-3">
                <!-- Place this tag where you want the button to render. -->
                <a class="github-button" href="https://github.com/guvener/personalized-movie-demo-data" >Database Repository</a>
                <!-- Place this tag in your head or just before your close body tag. -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
            </div>

            <span>Database dump file size 289mb. Importing may take 5-10 mins.</span>
        </div>

    @else
    <div class="flex justify-center my-6">
        <a href="/movies" class="my-3 inline-block font-semibold border shadow bg-white hover:bg-gray-100 px-8 py-2 rounded mr-3">Movies List</a>
        <a href="/viewers/random" class="my-3 inline-block font-semibold border shadow bg-white hover:bg-gray-100 px-8 py-2 rounded">Random Viewer</a>
    </div>

    @if($movie)
    Viewers watched
    <a href="/">
        <div class="flex items-center my-6 bg-gray-100 p-5 max-w-sm border rounded-lg">
            <img src="{{ $movie->metadata('Poster') }}" style="max-width: 80px;" />
            <div class="px-3">
                <span class="text-lg font-semibold">#{{ $movie->title }}</span>
            </div>
        </div>
    </a>
    @endif
    <div class="inline-block min-w-full shadow bg-white rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-indigo-400  bg-indigo-400 text-left text-xs font-semibold text-white uppercase tracking-wider">
                        Viewer ID
                    </th>
                    <th class="px-5 py-3 border-indigo-400  bg-indigo-400 text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Tagged Movies
                    </th>
                    <th class="px-5 py-3 border-indigo-400  bg-indigo-400 text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Rated Movies
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewers as $viewer)
                <tr class="hover:bg-indigo-50 text-md" onmousedown="window.location='/viewers/{{ $viewer->id }}';">
                    <td class="px-5 py-5 border-b border-gray-200">
                        <div class="flex items-center">
                            #{{ $viewer->id }}
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-center">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $viewer->tags_count }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-center">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $viewer->ratings_count }}
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="py-10 max-w-4xl mx-auto ">
    {{ $viewers->onEachSide(1)->links() }}
</div>
@endif
</div>
</x-guest-layout>