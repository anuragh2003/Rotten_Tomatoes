@include('header')

<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">⭐ Top Rated</h1>

    <!-- Movies -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">🎬 Movies</h2>
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-12">
        @forelse($movies as $movie)
            <a href="{{ auth()->check() ? route('movies.show', $movie->id) : route('login') }}" class="block">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition transform">
                    <img src="{{ asset('storage/' . $movie->poster) }}" class="w-full h-48 object-cover" alt="{{ $movie->title }}">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-900">{{ $movie->title }}</h3>
                        <p class="text-yellow-500">⭐ {{ number_format($movie->reviews_avg_rating, 1) }}/5</p>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-gray-500">No rated movies yet.</p>
        @endforelse
    </div>

    <!-- TV Shows -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">📺 TV Shows</h2>
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @forelse($tvshows as $show)
            <a href="{{ auth()->check() ? route('tvshows.show', $show->id) : route('login') }}" class="block">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition transform">
                    <img src="{{ asset('storage/' . $show->poster) }}" class="w-full h-48 object-cover" alt="{{ $show->title }}">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-900">{{ $show->title }}</h3>
                        <p class="text-yellow-500">⭐ {{ number_format($show->reviews_avg_rating, 1) }}/5</p>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-gray-500">No rated shows yet.</p>
        @endforelse
    </div>
</div>

@include('footer')
