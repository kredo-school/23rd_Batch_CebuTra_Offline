<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Login & Sign Up</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f3f4f6;
    }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  @php
    // URL parameter (?mode=signup) determines the view mode (default is 'login')
    $mode = request()->query('mode', 'login');
  @endphp

  <!-- 外枠コンテナ -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px]">
    
    <!-- Status Bar Mock -->
    <div class="flex justify-between items-center px-5 pt-2.5 text-xs font-semibold text-gray-800 z-10 flex-shrink-0">
      <div>9:41</div>
      <div class="w-24 h-5 bg-[#1a1c24] rounded-full absolute left-1/2 transform -translate-x-1/2 top-2 hidden sm:block"></div>
      <div class="flex items-center space-x-1">
        <i class="fa-solid fa-signal text-[10px]"></i>
        <i class="fa-solid fa-water text-[10px]"></i>
        <i class="fa-solid fa-battery-three-quarters"></i>
      </div>
    </div>

    <!-- 💡 Main Content: justify-center で全体要素を画面中央寄りに配置 -->
    <div class="flex-1 flex flex-col justify-center px-5 py-2 relative z-10 overflow-y-auto no-scrollbar space-y-3">
      
      <!-- App Header & Logo -->
      <div class="text-center">
        <div class="w-12 h-12 bg-[#008080] rounded-2xl flex items-center justify-center shadow-md mx-auto mb-2">
          <span class="text-white font-bold text-2xl">C</span>
        </div>
        <h1 class="text-2xl font-extrabold tracking-tight text-[#333]">
          <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
        </h1>
        <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase -mt-0.5">Cebu Travel Community</p>
        
        <p class="text-gray-600 text-xs font-medium mt-2">
          @if($mode === 'login')
            Welcome back! Please log in to your account.
          @else
            Join the CebuTra community and share your Cebu journey!
          @endif
        </p>
      </div>

      <!-- Form Card -->
      <div class="bg-white/80 backdrop-blur-md rounded-2xl p-4 shadow-sm border border-orange-50/50">
        
        <!-- Tab Switcher -->
        <div class="flex bg-gray-100 p-1 rounded-xl mb-3">
          <a href="?mode=login" class="flex-1 text-center py-1.5 text-xs font-bold rounded-lg transition-all {{ $mode === 'login' ? 'bg-white text-[#008080] shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
            Log In
          </a>
          <a href="?mode=signup" class="flex-1 text-center py-1.5 text-xs font-bold rounded-lg transition-all {{ $mode === 'signup' ? 'bg-white text-[#008080] shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
            Sign Up
          </a>
        </div>

        <!-- Validation Errors Display -->
        @if ($errors->any())
          <div class="mb-3 p-2.5 bg-red-50 text-red-500 rounded-xl text-xs font-semibold">
            <ul class="list-disc list-inside space-y-0.5">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Session Status -->
        @if (session('status'))
          <div class="mb-3 p-2.5 bg-emerald-50 text-[#008080] rounded-xl text-xs font-semibold">
            {{ session('status') }}
          </div>
        @endif

        <!-- Auth Form -->
        <form action="{{ $mode === 'login' ? route('login.post') : route('signup.post') }}" method="POST" class="space-y-2.5">
          @csrf

          @if($mode === 'signup')
            <div id="field-username" class="transition-all duration-300">
              <label class="block text-[11px] font-bold text-gray-500 mb-0.5 ml-0.5">Username</label>
              <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-xs">
                  <i class="fa-regular fa-user"></i>
                </span>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Cebu Traveler" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2 pl-9 pr-3 text-xs focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
              </div>
            </div>
          @endif

          <div>
            <label class="block text-[11px] font-bold text-gray-500 mb-0.5 ml-0.5">Email Address</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-xs">
                <i class="fa-regular fa-envelope"></i>
              </span>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="example@cebutra.com" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2 pl-9 pr-3 text-xs focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          <div>
            <div class="flex justify-between items-center mb-0.5 ml-0.5">
              <label class="block text-[11px] font-bold text-gray-500">Password</label>
              @if($mode === 'login')
                <a href="{{ Route::has('password.request') ? route('password.request') : '#' }}" id="link-forgot" class="text-[10px] font-bold text-[#008080] hover:underline">
                  Forgot password?
                </a>
              @endif
            </div>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-xs">
                <i class="fa-solid fa-lock"></i>
              </span>
              <input type="password" name="password" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2 pl-9 pr-3 text-xs focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          @if($mode === 'signup')
            <div id="field-terms" class="flex items-center ml-0.5 pt-0.5">
              <input type="checkbox" id="terms" required class="w-3.5 h-3.5 text-[#008080] border-gray-300 rounded focus:ring-[#008080]">
              <label for="terms" class="ml-1.5 text-[11px] text-gray-500 font-medium">
                I agree to the <a href="{{ route('welcome') }}" class="text-[#008080] font-bold hover:underline">Terms & Privacy Policy</a>
              </label>
            </div>
          @endif

          <button type="submit" class="w-full bg-[#FF6347] hover:bg-[#e55338] text-white font-bold py-2.5 rounded-xl shadow-md shadow-orange-500/20 transition-all text-xs mt-1 active:scale-[0.99] cursor-pointer">
            {{ $mode === 'login' ? 'Log In' : 'Create Account' }}
          </button>
        </form>

      </div>

      <!-- Mode Switch Footer -->
      <div class="text-center pt-1">
        <p class="text-xs text-gray-500 font-medium">
          @if($mode === 'login')
            Don't have an account?
            <a href="?mode=signup" class="text-[#008080] font-bold hover:underline ml-1">Sign Up</a>
          @else
            Already have an account?
            <a href="?mode=login" class="text-[#008080] font-bold hover:underline ml-1">Log In</a>
          @endif
        </p>
      </div>

    </div>

    <!-- Decorative Background Effects -->
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#FFB03A]/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-[#008080]/5 to-transparent pointer-events-none"></div>

  </div>

</body>
</html>