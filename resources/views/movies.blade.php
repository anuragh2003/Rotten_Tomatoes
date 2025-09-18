@include('header')

<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">🎬 All Movies</h2>

    @if($movies->isEmpty())
        <p class="text-gray-600">No movies available.</p>
    @else
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
    @endif
</div>

@include('footer')
