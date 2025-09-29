@include('header')

<div class="container mx-auto px-6 py-8">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <div class="rounded-xl overflow-hidden shadow-lg mb-6">
        <iframe src="{{ $tvshow->trailer_url }}" class="w-full h-[520px] md:h-[600px]" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="bg-gray-800 p-6 rounded-lg text-gray-100">
        <h1 class="text-3xl font-bold mb-2">{{ $tvshow->title }}</h1>
        <div class="flex gap-4 text-sm text-gray-300 mb-4">
          @php $avg = $tvshow->reviews()->where('approved', true)->avg('rating'); @endphp
@if(!$avg)
  <span class="text-gray-400">No reviews</span>
@elseif($avg < 3)
  <span class="text-red-500 font-semibold">Rotten 💀</span>
@else
  <span class="text-green-400 font-semibold">Fresh 🍅</span>
@endif

          <span>Season {{ $tvshow->season }}</span>
          <span>{{ $tvshow->year }}</span>
        </div>
        <p class="text-gray-300">{{ $tvshow->synopsis ?? 'No synopsis available.' }}</p>
      </div>
    </div>

    <div>
      <div class="bg-gray-800 p-5 rounded-xl shadow">
        <h3 class="text-xl font-semibold mb-3">Audience Reviews</h3>

        @auth
        <form action="{{ route('tvshows.reviews.store', $tvshow->id) }}" method="POST" class="space-y-3">
          @csrf
          <div class="flex items-center gap-2">
            @for($i=1;$i<=5;$i++)
              <input type="radio" id="tstar{{$i}}" name="rating" value="{{$i}}" class="hidden peer/tstar{{$i}}"/>
              <label for="tstar{{$i}}" class="cursor-pointer text-2xl text-gray-400 peer-checked/tstar{{$i}}:text-yellow-400">★</label>
            @endfor
          </div>
          <select name="status" class="w-full p-2 rounded bg-gray-700 text-gray-200">
            <option value="Fresh">Fresh 🍅</option>
            <option value="Rotten">Rotten 💀</option>
          </select>
          <textarea name="body" rows="4" class="w-full p-2 rounded bg-gray-800 text-gray-200" placeholder="Write your review..."></textarea>
          <button class="w-full bg-red-600 py-2 rounded text-white">Submit Review</button>
        </form>
        @else
          <p class="text-yellow-300">Please <a href="{{ route('login') }}" class="underline">login</a> to leave a review.</p>
        @endauth

        <hr class="my-4 border-gray-700"/>

        <div class="space-y-4 max-h-[520px] overflow-auto pr-2">
          @forelse($tvshow->reviews()->where('approved', true)->with('user')->latest()->get() as $review)
            <div class="bg-gray-900 p-3 rounded">
              <div class="flex items-center justify-between">
                <div>
                  <div class="font-semibold">{{ $review->user->name }}</div>
                  <div class="text-sm text-gray-400">{{ $review->created_at->diffForHumans() }}</div>
                </div>
                <div class="text-yellow-400">
                  @for($i=1;$i<=5;$i++)
                    <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-700' }}">★</span>
                  @endfor
                </div>
              </div>
              <p class="mt-2 text-gray-300">{{ $review->body }}</p>
              <div class="mt-2 text-xs text-gray-500">{{ ucfirst($review->status) }}</div>
            </div>
          @empty
            <p class="text-gray-400">No reviews yet.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>

@include('footer')
