@include('header')
<div class="min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md bg-gray-800 p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-white">Create an account</h2>
    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
      @csrf
      <input type="text" name="name" placeholder="Full name" class="w-full p-3 rounded bg-gray-700 text-white"/>
      <input type="email" name="email" placeholder="Email" class="w-full p-3 rounded bg-gray-700 text-white"/>
      <input type="password" name="password" placeholder="Password" class="w-full p-3 rounded bg-gray-700 text-white"/>
      <input type="password" name="password_confirmation" placeholder="Confirm password" class="w-full p-3 rounded bg-gray-700 text-white"/>
      <button class="w-full bg-emerald-500 py-3 rounded text-black">Create Account</button>
    </form>
    <p class="text-sm text-gray-400 mt-4">Already have an account? <a href="/login" class="text-red-400">Log in</a></p>
  </div>
</div>
@include('footer')