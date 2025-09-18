<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FreshFlix</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

@if(session('success'))
    <div id="flash-message" class="bg-green-500 text-white p-3 rounded mb-4 transition-opacity duration-1000">
        {{ session('success') }}
    </div>

    <script>
        // Hide flash message after 3 seconds
        setTimeout(() => {
            const msg = document.getElementById('flash-message');
            if (msg) {
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 1000); // remove after fade-out
            }
        }, 1000);
    </script>
@endif


<header class="bg-red-600 text-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
            <img src="https://res.cloudinary.com/dkze0rfr0/image/upload/v1756378182/Gemini_Generated_Image_jepyxljepyxljepy_cjbgai.png" 
                 alt="Site Logo" class="h-10 w-10">
            <span class="text-2xl font-bold tracking-wide">FreshFlix</span>
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-6 font-medium">
            <a href="/" class="hover:text-gray-200 transition">Home</a>
            <a href="/movies" class="hover:text-gray-200 transition">Movies</a>
            <a href="/tvshows" class="hover:text-gray-200 transition">TV Shows</a>
            <a href="/top-rated" class="hover:text-gray-200 transition">Top Rated</a>
            @auth
        @if(Auth::user()->email === 'Anuragh@gmail.com')
        <!-- Admin Navbar -->
        <a href="/admin">Admin Dashboard</a>
        @endif
            @endauth
        </nav>

        <!-- Search & User -->
        <div class="flex items-center space-x-4">
            <!-- Search -->
            <div class="relative">
                <input type="text" placeholder="Search..." 
                       class="bg-white text-black rounded-full px-4 py-2 pl-10 w-48 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M16.65 11a5.65 5.65 0 11-11.3 0 5.65 5.65 0 0111.3 0z"/>
                </svg>
            </div>

            <!-- User Auth Links -->
            @guest
                <a href="/signin" 
                   class="hidden md:inline-block bg-yellow-400 text-black px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                    Sign In
                </a>
                <a href="/login" 
                   class="hidden md:inline-block bg-yellow-400 text-black px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                    Log in
                </a>
            @endguest

            @auth
<div class="relative group">
    <!-- Dropdown Trigger -->
    <button class="flex items-center space-x-2 bg-yellow-400 text-black px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition focus:outline-none">
        <span>{{ Auth::user()->name }}</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div class="absolute right-0 mt-2 w-40 bg-white text-black rounded-lg shadow-md 
                opacity-0 scale-95 transform transition-all duration-200 
                group-hover:opacity-100 group-hover:scale-100 
                group-focus-within:opacity-100 group-focus-within:scale-100">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
        </form>
    </div>
</div>
@endauth

        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</header>

<body>
</body>