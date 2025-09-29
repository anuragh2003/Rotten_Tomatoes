<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>FreshFlix — Movie Ratings & Reviews</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
  <link href="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet"/>
  <style>
    /* small custom accents */
    .brand-gradient { background: linear-gradient(90deg,#ff4d4f,#ff8a00); -webkit-background-clip: text; color: transparent; }
  </style>
</head>
<body class="bg-gray-900 text-gray-100 antialiased">
  @if(session('success'))
    <div id="flash-message" class="fixed right-6 top-6 z-50 bg-emerald-500 text-white px-4 py-2 rounded shadow-lg">
        {{ session('success') }}
    </div>
    <script>
      setTimeout(() => {
        const msg = document.getElementById('flash-message');
        if(msg){ msg.classList.add('opacity-0'); setTimeout(()=>msg.remove(),700); }
      }, 1000);
    </script>
  @endif

  <header class="bg-gradient-to-r from-gray-800 via-gray-900 to-black border-b border-gray-800">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
      <a href="/" class="flex items-center gap-3">
        <img src="https://res.cloudinary.com/dkze0rfr0/image/upload/v1756378182/Gemini_Generated_Image_jepyxljepyxljepy_cjbgai.png" alt="logo" class="h-10 w-10 rounded-md shadow"/>
        <span class="text-xl font-bold brand-gradient">FreshFlix</span>
      </a>

      <nav class="hidden md:flex items-center gap-6 text-gray-300">
        <a href="/" class="hover:text-white transition">Home</a>
        <a href="/movies" class="hover:text-white transition">Movies</a>
        <a href="/tvshows" class="hover:text-white transition">TV Shows</a>
        <a href="/top-rated" class="hover:text-white transition">Top Rated</a>
         @if(Auth::check() && Auth::user()->email === 'Anuragh@gmail.com')
  <a href="/admin" class="hover:text-white transition">Admin Dashboard</a>
@endif
      </nav>

      <div class="flex items-center gap-4">
        <div class="hidden md:block">
          <input type="search" placeholder="Search movies, shows..." class="bg-gray-800 text-gray-200 placeholder-gray-400 rounded-full px-4 py-2 w-64 focus:ring-2 focus:ring-red-500 outline-none"/>
        </div>

        @guest
          <a href="/login" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Log in</a>
          <a href="/signin" class="border border-red-600 text-red-400 px-4 py-2 rounded-lg hover:bg-red-800">Sign up</a>
        @endguest

        @auth
  <div class="relative">
    <button id="userMenuBtn"
      class="flex items-center gap-2 bg-gray-800 px-3 py-2 rounded-lg focus:outline-none">
      <span class="text-sm">{{ Auth::user()->name }}</span>
      <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>

    <!-- Dropdown Menu -->
    <div id="userDropdown"
      class="hidden absolute right-0 mt-2 w-44 bg-white text-gray-900 rounded-lg shadow-lg py-2 z-50">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('click', function(e){
      const btn = document.getElementById('userMenuBtn');
      const menu = document.getElementById('userDropdown');
      if(!btn || !menu) return;
      if(btn.contains(e.target)) { menu.classList.toggle('hidden'); }
      else if(!menu.contains(e.target)) { menu.classList.add('hidden'); }
    });
  </script>
@endauth

      </div>
    </div>
  </header>
  <main>