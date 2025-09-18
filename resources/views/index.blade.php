@include('header')

<div class="container mx-auto px-6 py-8">
    <!-- Movies Section -->
    <h2 class="text-3xl font-bold mb-6 text-gray-800">🎬 Movies</h2>
    <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($movies as $movie)
    <a href="{{ auth()->check() ? route('movies.show', $movie->id) : route('login') }}" class="block">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden transform transition hover:scale-105 hover:shadow-2xl">
            <img src="{{ asset('storage/' . $movie->poster) }}" 
                 alt="{{ $movie->title }}" 
                 class="w-full h-56 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $movie->title }}</h3>
                <p class="text-sm text-gray-600 mt-1">{{ $movie->genres }}</p>
            </div>
        </div>
    </a>
@endforeach
    </div>

    <!-- TV Shows Section -->
    <h2 class="text-3xl font-bold mt-12 mb-6 text-gray-800">📺 TV Shows</h2>
    <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($tvshows as $show)
    <a href="{{ auth()->check() ? route('tvshows.show', $show->id) : route('login') }}" class="block">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden transform transition hover:scale-105 hover:shadow-2xl">
            <img src="{{ asset('storage/' . $show->poster) }}" 
                 alt="{{ $show->title }}" 
                 class="w-full h-56 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $show->title }}</h3>
                <p class="text-sm text-gray-600 mt-1">
                    Season {{ $show->season }} | {{ $show->year }}
                </p>
                <p class="text-sm text-gray-600">{{ $show->genres }}</p>
            </div>
        </div>
    </a>
@endforeach
    </div>
</div>

@include('footer')
