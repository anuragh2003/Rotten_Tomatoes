@include('header')

<div class="container mx-auto px-6 py-10">
  <h1 class="text-3xl font-bold mb-6">Top Rated</h1>

  <section class="mb-8">
    <h2 class="text-2xl font-semibold mb-4">Top Movies</h2>
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach($movies as $m)
        <a href="{{ auth()->check() ? route('movies.show', $m->id) : route('login') }}" class="block">
          <div class="rounded-lg overflow-hidden bg-gray-800 shadow">
            <img src={{ $m->poster }} class="w-full h-48 object-cover"/>
            <div class="p-3 text-white">
              <h4 class="font-semibold">{{ $m->title }}</h4>
              @php
  $avg = $m->reviews_avg_rating ?? null;
@endphp
@if($avg === null)
  <div class="text-gray-400">No reviews</div>
@elseif($avg < 3)
  <div class="text-red-500 font-semibold flex items-center gap-1">
    Rotten 💀
  </div>
@else
  <div class="text-green-400 font-semibold flex items-center gap-1">
    Fresh 🍅
  </div>
@endif

            </div>
          </div>
        </a>
      @endforeach
    </div>
  </section>

  <section>
    <h2 class="text-2xl font-semibold mb-4">Top TV Shows</h2>
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach($tvshows as $s)
        <a href="{{ auth()->check() ? route('tvshows.show', $s->id) : route('login') }}" class="block">
          <div class="rounded-lg overflow-hidden bg-gray-800 shadow">
            <img src={{ $s->poster }} class="w-full h-48 object-cover"/>
            <div class="p-3 text-white">
              <h4 class="font-semibold">{{ $s->title }}</h4>
              @php
  $avg = $s->reviews_avg_rating ?? null;
@endphp
@if($avg === null)
  <div class="text-gray-400">No reviews</div>
@elseif($avg < 3)
  <div class="text-red-500 font-semibold flex items-center gap-1">
    Rotten 💀
  </div>
@else
  <div class="text-green-400 font-semibold flex items-center gap-1">
    Fresh 🍅
  </div>
@endif

            </div>
          </div>
        </a>
      @endforeach
    </div>
  </section>
</div>

@include('footer')