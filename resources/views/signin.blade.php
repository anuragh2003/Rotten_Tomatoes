<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - FreshFlix</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8">
    <!-- Logo -->
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-red-600">FreshFlix</h1>
      <p class="text-gray-500">Create a new account</p>
    </div>

    <!-- Sign Up Form -->
    <form action="{{ route('users.store') }}" method="POST" class="space-y-5">
      @csrf
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="name" id="name" required 
          class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" value="{{ old('title') }}">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" required 
          class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" value="{{ old('title') }}">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" required 
          class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" value="{{ old('title') }}">
      </div>

      

      <button type="submit" 
        class="w-full bg-red-600 text-white py-2 rounded-lg font-semibold hover:bg-red-700 transition">
        Sign Up
      </button>
    </form>

    <!-- Login Redirect -->
    <p class="mt-6 text-center text-sm text-gray-600">
      Already have an account? 
      <a href="/login" class="text-red-600 font-semibold hover:underline">log In</a>
    </p>
  </div>

</body>
</html>
