<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Set New Password</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4 font-['Plus_Jakarta_Sans']">

  <!-- 💡 外枠サイズを他画面と統一して sm:h-[720px] に変更 -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px] p-5 pt-2.5">
    
    <!-- Status Bar Mock -->
    <div class="flex justify-between items-center px-1 pt-1.5 text-xs font-semibold text-gray-800 z-10 flex-shrink-0">
      <div>9:41</div>
      <div class="w-24 h-5 bg-[#1a1c24] rounded-full absolute left-1/2 transform -translate-x-1/2 top-2 hidden sm:block"></div>
      <div class="flex items-center space-x-1">
        <i class="fa-solid fa-signal text-[10px]"></i>
        <i class="fa-solid fa-water text-[10px]"></i>
        <i class="fa-solid fa-battery-three-quarters"></i>
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col justify-between my-auto py-3">
      
      <!-- ロゴ・ヘッダー -->
      <div class="text-center my-auto">
        <div class="w-12 h-12 bg-[#008080] rounded-2xl flex items-center justify-center shadow-md mx-auto mb-2">
          <span class="text-white font-bold text-2xl">C</span>
        </div>
        <h1 class="text-xl font-extrabold text-[#333]">Set New Password</h1>
        <p class="text-xs text-gray-500 font-medium mt-1 leading-tight">
          Enter your email and choose a strong new password.
        </p>
      </div>

      <!-- フォームカード -->
      <div class="bg-white/80 backdrop-blur-md rounded-2xl p-4 shadow-sm border border-orange-50/50 mt-2">
        
        @if ($errors->any())
          <div class="mb-2.5 p-2 bg-red-50 text-red-500 rounded-xl text-xs font-semibold space-y-0.5">
            @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="space-y-2.5">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">

          <div>
            <label class="block text-[11px] font-bold text-gray-500 mb-0.5 ml-0.5">Email Address</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-xs">
                <i class="fa-regular fa-envelope"></i>
              </span>
              <input type="email" name="email" value="{{ old('email', $email) }}" placeholder="example@cebutra.com" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2 pl-9 pr-3 text-xs focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          <div>
            <label class="block text-[11px] font-bold text-gray-500 mb-0.5 ml-0.5">New Password</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-xs">
                <i class="fa-solid fa-lock"></i>
              </span>
              <input type="password" name="password" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2 pl-9 pr-3 text-xs focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          <div>
            <label class="block text-[11px] font-bold text-gray-500 mb-0.5 ml-0.5">Confirm New Password</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 text-xs">
                <i class="fa-solid fa-lock"></i>
              </span>
              <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2 pl-9 pr-3 text-xs focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          <button type="submit" class="w-full bg-[#FF6347] hover:bg-[#e55338] text-white font-bold py-2.5 rounded-xl shadow-md shadow-orange-500/20 transition-all text-xs cursor-pointer active:scale-[0.99] mt-1">
            Reset Password
          </button>
        </form>
      </div>

      <!-- フッターリンク -->
      <div class="text-center pt-3 pb-1">
        <a href="{{ route('auth') }}?mode=login" class="text-xs font-bold text-[#008080] hover:underline">
          <i class="fa-solid fa-arrow-left text-[10px] mr-1"></i> Back to Log In
        </a>
      </div>

    </div>

  </div>

</body>
</html>