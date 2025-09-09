@include('header')
<!-- Admin: Add Movie/Show -->
<body class="bg-gray-100 min-h-screen flex flex-col">
  <!-- Dashboard -->
  <main class="flex-grow container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-center mb-10">Admin Dashboard</h2>

    <!-- Selection Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Movies Card -->
      <div onclick="showForm('movieForm')" 
           class="cursor-pointer bg-white shadow-lg rounded-2xl p-10 flex flex-col items-center justify-center hover:bg-red-50 transition">
        <img src="https://img.icons8.com/color/96/000000/clapperboard.png" class="mb-4" alt="Movies Icon"/>
        <h3 class="text-2xl font-semibold">Movies</h3>
      </div>

      <!-- TV Shows Card -->
      <div onclick="showForm('tvForm')" 
           class="cursor-pointer bg-white shadow-lg rounded-2xl p-10 flex flex-col items-center justify-center hover:bg-blue-50 transition">
        <img src="https://img.icons8.com/color/96/000000/tv.png" class="mb-4" alt="TV Shows Icon"/>
        <h3 class="text-2xl font-semibold">TV Shows</h3>
      </div>

    </div>

    <!-- Movies Form -->
    <div id="movieForm" class="hidden mt-12 bg-white shadow-lg rounded-xl p-8">
      <h3 class="text-2xl font-bold mb-6">Add Movie</h3>
      <form method="POST" action="api/show/movies" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
          <label class="block font-medium">Title</label>
          <input type="text" name="title" class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
          <label class="block font-medium">Age Rating</label>
          <input type="text" name="age_rating" class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
          <label class="block font-medium">Duration</label>
          <input type="text" name="duration" class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
          <label class="block font-medium">Genres</label>
          <input type="text" name="genres" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. Action, Drama">
        </div>
        <div>
          <label class="block font-medium">Poster</label>
          <input type="file" name="poster" class="w-full">
        </div>
        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">Add Movie</button>
      </form>
    </div>

    <!-- TV Shows Form -->
    <div id="tvForm" class="hidden mt-12 bg-white shadow-lg rounded-xl p-8">
      <h3 class="text-2xl font-bold mb-6">Add TV Show</h3>
      <form method="POST" action="api/show/Tvshows" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
          <label class="block font-medium">Title</label>
          <input type="text" name="title" class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
          <label class="block font-medium">Season</label>
          <input type="number" name="season" class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
          <label class="block font-medium">Year</label>
          <input type="number" name="year" class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
          <label class="block font-medium">Genres</label>
          <input type="text" name="genres" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. Comedy, Thriller">
        </div>
        <div>
          <label class="block font-medium">Poster</label>
          <input type="file" name="poster" class="w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Add TV Show</button>
      </form>
    </div>

  </main>

  <script>
    function showForm(formId) {
      document.getElementById('movieForm').classList.add('hidden');
      document.getElementById('tvForm').classList.add('hidden');
      document.getElementById(formId).classList.remove('hidden');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  </script>

</body>
</html>

@include('footer')
