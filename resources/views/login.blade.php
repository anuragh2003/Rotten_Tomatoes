@include('header')
<div class="min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md bg-gray-800 p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-white">Welcome back</h2>
    <form action="{{ route('users.login') }}" method="POST" class="space-y-4">
      @csrf
      <input type="email" name="email" placeholder="Email" class="w-full p-3 rounded bg-gray-700 text-white"/>
      <input type="password" name="password" placeholder="Password" class="w-full p-3 rounded bg-gray-700 text-white"/>
      <button class="w-full bg-red-600 py-3 rounded text-white">Sign in</button>
    </form>
    <p class="text-sm text-gray-400 mt-4">Don't have an account? <a href="/signin" class="text-red-400">Sign up</a></p>
  </div>
</div>
@include('footer')