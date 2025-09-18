@include('header')

<div class="container mx-auto px-6 py-8">
    <!-- Movie Trailer -->
    <div class="aspect-w-16 aspect-h-9 mb-6">
        <iframe 
            src="{{ $movie->trailer_url }}" 
            title="{{ $movie->title }} Trailer" 
            class="w-full h-[500px] rounded-lg shadow-lg"
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    </div>

    <!-- Movie Info -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $movie->title }}</h1>
        <p class="text-gray-700"><strong>Age Rating:</strong> {{ $movie->age_rating }}</p>
        <p class="text-gray-700"><strong>Duration:</strong> {{ $movie->duration }}</p>
        <p class="text-gray-700"><strong>Genres:</strong> {{ $movie->genres }}</p>
    </div>

    <!-- Reviews Section -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Audience Reviews</h2>

    <!-- Review Form -->
    @auth
        <form action="{{ route('reviews.store', $movie->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow-md mb-8">
            @csrf

            <!-- Star Rating -->
            <label class="block text-gray-700 font-medium mb-2">Your Rating</label>
            <div class="flex items-center space-x-1 mb-4">
                @for ($i = 1; $i <= 5; $i++)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer/star{{ $i }}">
                    <label for="star{{ $i }}" class="cursor-pointer text-3xl text-gray-400 peer-checked/star{{ $i }}:text-yellow-400 hover:text-yellow-300">
                        ★
                    </label>
                @endfor
            </div>

            <!-- Fresh/Rotten -->
            <label class="block text-gray-700 font-medium mb-2">Fresh or Rotten?</label>
            <select name="status" class="w-full border rounded-md p-2 mb-4">
                <option value="Fresh">Fresh 🍅</option>
                <option value="Rotten">Rotten 🤢</option>
            </select>

            <!-- Review Body -->
            <label class="block text-gray-700 font-medium mb-2">Review Text</label>
            <textarea name="body" rows="3" class="w-full border rounded-md p-2 mb-4"></textarea>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                Submit Review
            </button>
        </form>
    @else
        <p class="text-red-500 mb-6">⚠️ You must <a href="{{ route('login') }}" class="underline">log in</a> to leave a review.</p>
    @endauth

    <!-- Reviews List -->
    <div class="space-y-6">
        @forelse($movie->reviews()->where('approved', true)->get() as $review)
            <div class="bg-gray-50 p-4 rounded-lg shadow">
                <strong class="text-lg text-gray-800">{{ $review->user->name }}</strong>
                <div class="flex items-center space-x-2 text-yellow-400">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                    @endfor
                    <span class="ml-2 text-sm text-gray-600">{{ $review->status }}</span>
                </div>
                <p class="text-gray-700 mt-2">{{ $review->body }}</p>
            </div>
        @empty
            <p class="text-gray-500">No reviews yet. Be the first one to review!</p>
        @endforelse
    </div>
</div>

@include('footer')
