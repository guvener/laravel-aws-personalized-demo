<x-guest-layout>
<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex justify-between items-center">
        <a href="/" class="my-3 block text-lg font-semibold bg-gray-200 hover:bg-gray-300 px-8 py-2 rounded">Back</a>
    </div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 pb-10 mt-12">
        <div class="inline-block min-w-full shadow bg-white rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-indigo-400  bg-indigo-400 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-5 py-3 border-indigo-400 w-full  bg-indigo-400 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Title
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                    <tr class="hover:bg-indigo-50 text-md" onmousedown="window.location='/?movie_id={{ $movie->id }}';">
                        <td class="px-5 py-5 border-b border-gray-200">
                            <div class="flex items-center">
                                #{{ $movie->id }}
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 w-full flex justify-between items-center">
                            <div class="text-gray-900 whitespace-no-wrap">
                                {{ $movie->title }}
                            </div>
                            <div class="text-gray-600 text-sm whitespace-no-wrap hidden lg:block">
                                {{ $movie->genres }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="py-10 max-w-4xl mx-auto ">
        {{ $movies->onEachSide(1)->links() }}
    </div>
</div>
</x-guest-layout>