@include('header')

<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">📺 All TV Shows</h2>

    @if($tvshows->isEmpty())
        <p class="text-gray-600">No TV shows available.</p>
    @else
         <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach($tvshows as $show)
                <a href="{{ auth()->check() ? route('tvshows.show', $show->id) : route('login') }}" 
   class="group block">
  <div class="relative overflow-hidden rounded-2xl shadow-xl bg-gray-900">
    
    <!-- Poster Image -->
    <img src="{{ $show->poster }}" 
         alt="{{ $show->title }}" 
         class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110"/>

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

    <!-- Content Overlay -->
    <div class="absolute bottom-0 left-0 w-full p-4 text-white">
      
      <!-- Title -->
      <h3 class="text-lg font-bold truncate group-hover:text-red-400 transition">
        {{ $show->title }}
      </h3>

      <!-- Genres as pills -->
      <div class="flex flex-wrap gap-2 mt-2">
        @foreach(explode(',', $show->genres) as $genre)
          <span class="px-2 py-1 bg-gray-900/60 text-gray-300 text-xs rounded-full border border-gray-700">
            {{ trim($genre) }}
          </span>
        @endforeach
      </div>
      <!-- Review Status -->
      <div class="mt-3 flex items-center justify-between text-sm">
        @php $avg = $show->reviews()->where('approved', true)->avg('rating'); @endphp

        @if(!$avg)
          <span class="text-gray-300">No reviews</span>
        @elseif($avg < 3)
          <span class="text-red-400 font-semibold flex items-center gap-1">
            💀 Rotten
          </span>
        @else
          <span class="text-green-400 font-semibold flex items-center gap-1">
            🍅 Fresh
          </span>
        @endif

        <!-- Avg Rating Stars -->
        <div class="flex items-center space-x-1">
          @for ($i = 1; $i <= 5; $i++)
            <span class="{{ $i <= round($avg) ? 'text-yellow-400' : 'text-gray-500' }}">★</span>
          @endfor
        </div>
      </div>
    </div>
  </div>
</a>
      @endforeach
    </div>
    @endif
</div>

@include('footer')
