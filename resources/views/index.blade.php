<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FreshFlix</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<header class="bg-red-600 text-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
            <img src="https://res.cloudinary.com/dkze0rfr0/image/upload/v1756378182/Gemini_Generated_Image_jepyxljepyxljepy_cjbgai.png" alt="Site Logo" class="h-10 w-10">
            <span class="text-2xl font-bold tracking-wide">FreshFlix</span>
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-6 font-medium">
            <a href="/" class="hover:text-gray-200 transition">Home</a>
            <a href="/movies" class="hover:text-gray-200 transition">Movies</a>
            <a href="/tv-shows" class="hover:text-gray-200 transition">TV Shows</a>
            <a href="/top-lists" class="hover:text-gray-200 transition">Top Lists</a>
            <a href="/awards" class="hover:text-gray-200 transition">Awards</a>
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
            <a href="/signin" class="hidden md:inline-block bg-yellow-400 text-black px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                Sign In
            </a>
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
<footer class="bg-black text-gray-300 mt-12">
    <div class="container mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <!-- Brand -->
        <div>
            <h2 class="text-white text-xl font-bold mb-4">FreshFlix</h2>
            <p class="text-sm">Your trusted source for movies, TV shows, ratings & reviews.</p>
        </div>

        <!-- Navigation -->
        <div>
            <h3 class="text-white font-semibold mb-3">Explore</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="/movies" class="hover:text-white">Movies</a></li>
                <li><a href="/tv-shows" class="hover:text-white">TV Shows</a></li>
                <li><a href="/top-lists" class="hover:text-white">Top Lists</a></li>
                <li><a href="/awards" class="hover:text-white">Awards</a></li>
            </ul>
        </div>

        <!-- Legal -->
        <div>
            <h3 class="text-white font-semibold mb-3">Legal</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="/privacy" class="hover:text-white">Privacy Policy</a></li>
                <li><a href="/terms" class="hover:text-white">Terms of Service</a></li>
            </ul>
        </div>

        <!-- Social -->
        <div>
            <h3 class="text-white font-semibold mb-3">Connect</h3>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-white"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Bottom -->
    <div class="bg-gray-900 text-center text-gray-500 text-sm py-4">
        © 2025 FreshFlix. All Rights Reserved.
    </div>
</footer>
