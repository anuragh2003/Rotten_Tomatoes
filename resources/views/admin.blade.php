@include('header')

<body class="bg-gray-900">
  <div class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-white mb-6">Admin Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Add Movie -->
      <div class="bg-gray-800 p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold text-white mb-4">Add Movie</h3>
        <form method="POST" action="api/show/movies" enctype="multipart/form-data" class="space-y-4">
          @csrf
          <input name="title" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Title"/>
          <input name="age_rating" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Age rating"/>
          <input name="duration" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Duration"/>
          <input name="genres" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Genres"/>
          <input name="trailer_url" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="YouTube URL"/>
          <input type="file" name="poster" class="text-gray-300"/>
          <button class="bg-emerald-500 px-4 py-2 rounded text-black">Add Movie</button>
        </form>
      </div>

      <!-- Add TV Show -->
      <div class="bg-gray-800 p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold text-white mb-4">Add TV Show</h3>
        <form method="POST" action="api/show/Tvshows" enctype="multipart/form-data" class="space-y-4">
          @csrf
          <input name="title" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Title"/>
          <input name="season" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Season"/>
          <input name="year" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Year"/>
          <input name="genres" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Genres"/>
          <input name="trailer_url" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="YouTube URL"/>
          <input type="file" name="poster" class="text-gray-300"/>
          <button class="bg-blue-500 px-4 py-2 rounded text-black">Add TV Show</button>
        </form>
      </div>

      <!-- Pending Reviews -->
      <div class="bg-gray-800 p-6 rounded-lg shadow md:col-span-2">
        <h3 class="text-xl font-semibold text-white mb-4">Pending Reviews</h3>
        @php $pendingReviews = $pendingReviews ?? collect(); @endphp
        @if($pendingReviews->isEmpty())
          <p class="text-gray-400">No pending reviews.</p>
        @else
          <div class="space-y-4 max-h-[420px] overflow-auto">
            @foreach($pendingReviews as $review)
              <div class="bg-gray-900 p-3 rounded">
                <div class="flex justify-between items-start">
                  <div>
                    <div class="font-semibold text-white">{{ $review->user->name }}</div>
                    <div class="text-sm text-gray-400">{{ $review->reviewable->title ?? 'N/A' }}</div>
                    <div class="text-sm text-gray-300">⭐ {{ $review->rating }}</div>
                    <p class="text-gray-300 mt-2">{{ $review->body }}</p>
                  </div>
                  <div class="flex flex-col gap-2 ml-4">
                    <form method="POST" action="{{ route('reviews.approve', $review->id) }}">
                      @csrf
                      <button class="bg-green-500 px-3 py-1 rounded text-black">Approve</button>
                    </form>
                    <form method="POST" action="{{ route('reviews.reject', $review->id) }}">
                      @csrf
                      <button class="bg-red-600 px-3 py-1 rounded text-white">Reject</button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>

@include('footer')
