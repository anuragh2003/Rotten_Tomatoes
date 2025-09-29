@include('header')

<div class="container mx-auto px-6 py-10">
  <section class="mb-10">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold">Now Showing</h2>
      <a href="/movies" class="text-sm text-red-400 hover:underline">View all movies →</a>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach($movies as $movie)
       <a href="{{ auth()->check() ? route('movies.show', $movie->id) : route('login') }}" 
   class="group block">
  <div class="relative overflow-hidden rounded-2xl shadow-xl bg-gray-900">
    
    <!-- Poster Image -->
    <img src="{{ $movie->poster }}" 
         alt="{{ $movie->title }}" 
         class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110"/>

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

    <!-- Content Overlay -->
    <div class="absolute bottom-0 left-0 w-full p-4 text-white">
      
      <!-- Title -->
      <h3 class="text-lg font-bold truncate group-hover:text-red-400 transition">
        {{ $movie->title }}
      </h3>

      <!-- Genres as pills -->
      <div class="flex flex-wrap gap-2 mt-2">
        @foreach(explode(',', $movie->genres) as $genre)
          <span class="px-2 py-1 bg-gray-900/60 text-gray-300 text-xs rounded-full border border-gray-700">
            {{ trim($genre) }}
          </span>
        @endforeach
      </div>
      <!-- Review Status -->
      <div class="mt-3 flex items-center justify-between text-sm">
        @php $avg = $movie->reviews()->where('approved', true)->avg('rating'); @endphp

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
  </section>

  <section class="mb-10">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold">Trending TV Shows</h2>
      <a href="/tvshows" class="text-sm text-red-400 hover:underline">View all TV shows →</a>
    </div>
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
  </section>

  <!-- Top Rated Carousel -->
  <section class="mb-16">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold">⭐ Top Rated</h2>
      <a href="{{ route('topRated.index') }}" class="text-sm text-red-400 hover:underline">See full list →</a>
    </div>

    <div class="swiper mySwiper rounded-xl">
      <div class="swiper-wrapper">
        <!-- Movies Slide -->
        <div class="swiper-slide p-6">
          <h3 class="text-xl font-semibold mb-4">Top Movies</h3>
          <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($topMovies as $movie)
              <a href="{{ auth()->check() ? route('movies.show', $movie->id) : route('login') }}" class="group block">
                <div class="overflow-hidden rounded-lg shadow-md bg-gray-800">
                  <img src={{ $movie->poster }} class="w-full h-48 object-cover transition-transform group-hover:scale-105"/>
                  <div class="p-3 bg-gray-900/60">
                    <h4 class="text-white font-semibold">{{ $movie->title }}</h4>
                    @php $avg = $movie->reviews()->where('approved', true)->avg('rating'); @endphp
@if(!$avg)
  <span class="text-sm text-gray-400">No reviews</span>
@elseif($avg < 3)
  <span class="text-sm text-red-500 font-semibold">Rotten 💀</span>
@else
  <span class="text-sm text-green-400 font-semibold">Fresh 🍅</span>
@endif

                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>

        <!-- TV Shows Slide -->
        <div class="swiper-slide p-6">
          <h3 class="text-xl font-semibold mb-4">Top TV Shows</h3>
          <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($topTvShows as $show)
              <a href="{{ auth()->check() ? route('tvshows.show', $show->id) : route('login') }}" class="group block">
                <div class="overflow-hidden rounded-lg shadow-md bg-gray-800">
                  <img src={{ $show->poster }}class="w-full h-48 object-cover transition-transform group-hover:scale-105"/>
                  <div class="p-3 bg-gray-900/60">
                    <h4 class="text-white font-semibold">{{ $show->title }}</h4>
                    <div class="text-yellow-400">⭐ {{ number_format($show->reviews_avg_rating,1) ?? '—' }}</div>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Controls -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <script>
      const swiper = new Swiper('.mySwiper', {
        loop: true,
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        autoplay: { delay: 4500, disableOnInteraction: false }
      });
    </script>
  </section>
</div>

@include('footer')
