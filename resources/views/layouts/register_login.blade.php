<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra Login & Sign Up</title>
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
    // URLのパラメータ (?mode=signup) で表示を切り替えます（デフォルトは login）
    $mode = request()->query('mode', 'login');
  @endphp

  <div class="w-full max-w-[412px] bg-[#FFFBF3] min-h-screen sm:min-h-[852px] shadow-2xl relative flex flex-col justify-between overflow-x-hidden sm:rounded-[40px]">
    
    <div class="flex justify-between items-center px-6 pt-3 text-xs font-semibold text-gray-800 z-10">
      <div>9:41</div>
      <div class="w-28 h-6 bg-[#1a1c24] rounded-full absolute left-1/2 transform -translate-x-1/2 top-2 hidden sm:block"></div>
      <div class="flex items-center space-x-1">
        <i class="fa-solid fa-signal text-[10px]"></i>
        <i class="fa-solid fa-water text-[10px]"></i>
        <i class="fa-solid fa-battery-three-quarters"></i>
      </div>
    </div>

    <div class="flex-1 flex flex-col justify-between p-6 pt-12 relative z-10">
      
      <div class="text-center my-auto pt-4">
        <div class="w-16 h-16 bg-[#008080] rounded-2xl flex items-center justify-center shadow-md mx-auto mb-3">
          <span class="text-white font-bold text-4xl">C</span>
        </div>
        <h1 class="text-3xl font-extrabold tracking-tight text-[#333]">
          <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
        </h1>
        <p class="text-[11px] text-gray-400 font-bold tracking-wider uppercase mt-0.5">Cebu Travel Community</p>
        
        <p class="text-gray-600 text-sm font-medium mt-6">
          @if($mode === 'login')
            おかえりなさい！アカウントにログインしてください
          @else
            CebuTraコミュニティに参加して、セブ旅をシェアしよう！
          @endif
        </p>
      </div>

      <div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 shadow-sm border border-orange-50/50 mt-4">
        
        <!-- 💡 クエリパラメータを使ってタブのアクティブ状態を動的に切り替えます -->
        <div class="flex bg-gray-100 p-1 rounded-xl mb-5">
          <a href="?mode=login" class="flex-1 text-center py-2 text-xs font-bold rounded-lg transition-all {{ $mode === 'login' ? 'bg-white text-[#008080] shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
            ログイン
          </a>
          <a href="?mode=signup" class="flex-1 text-center py-2 text-xs font-bold rounded-lg transition-all {{ $mode === 'signup' ? 'bg-white text-[#008080] shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
            新規登録
          </a>
        </div>

        <!-- 💡 Laravel標準のエラーメッセージ表示パーツ -->
        @if ($errors->any())
          <div class="mb-4 p-3 bg-red-50 text-red-500 rounded-xl text-xs font-semibold">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- 💡 モードによって送信先ルートを動的に切り替え -->
        <form action="{{ $mode === 'login' ? route('login.post') : route('signup.post') }}" method="POST" class="space-y-4">
          @csrf

          @if($mode === 'signup')
            <div id="field-username" class="transition-all duration-300">
              <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">ユーザー名</label>
              <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
                  <i class="fa-regular fa-user"></i>
                </span>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="セブ太郎" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
              </div>
            </div>
          @endif

          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">メールアドレス</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
                <i class="fa-regular fa-envelope"></i>
              </span>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="example@cebutra.com" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          <div>
            <div class="flex justify-between items-center mb-1 ml-1">
              <label class="block text-xs font-bold text-gray-500">パスワード</label>
              @if($mode === 'login')
                <a href="#" id="link-forgot" class="text-[11px] font-bold text-[#008080] hover:underline">忘れた場合</a>
              @endif
            </div>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
                <i class="fa-solid fa-lock"></i>
              </span>
              <input type="password" name="password" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          @if($mode === 'signup')
            <div id="field-terms" class="flex items-center ml-1 pt-1">
              <input type="checkbox" id="terms" required class="w-4 h-4 text-[#008080] border-gray-300 rounded focus:ring-[#008080]">
              <label for="terms" class="ml-2 text-xs text-gray-500 font-medium">
                <a href="#" class="text-[#008080] font-bold hover:underline">利用規約</a>と<a href="#" class="text-[#008080] font-bold hover:underline">プライバシーポリシー</a>に同意する
              </label>
            </div>
          @endif

          <button type="submit" class="w-full bg-[#FF6347] hover:bg-[#e55338] text-white font-bold py-3.5 rounded-xl shadow-md shadow-orange-500/20 transition-all text-sm mt-2 active:scale-[0.99]">
            {{ $mode === 'login' ? 'ログイン' : 'アカウントを作成' }}
          </button>
        </form>

        <div class="relative flex py-4 items-center">
          <div class="flex-grow border-t border-gray-100"></div>
          <span class="flex-shrink mx-4 text-gray-400 text-[10px] font-bold tracking-wider uppercase">または</span>
          <div class="flex-grow border-t border-gray-100"></div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <button class="flex items-center justify-center gap-2 border border-gray-200 bg-white hover:bg-gray-50 py-2.5 rounded-xl text-xs font-bold text-gray-700 transition-all active:scale-[0.98]">
            <i class="fa-brands fa-google text-red-500 text-sm"></i> Google
          </button>
          <button class="flex items-center justify-center gap-2 border border-gray-200 bg-white hover:bg-gray-50 py-2.5 rounded-xl text-xs font-bold text-gray-700 transition-all active:scale-[0.98]">
            <i class="fa-brands fa-apple text-black text-sm"></i> Apple
          </button>
        </div>

      </div>

      <div class="text-center pt-6 pb-2">
        <p class="text-xs text-gray-500 font-medium">
          @if($mode === 'login')
            アカウントをお持ちでないですか？
            <a href="?mode=signup" class="text-[#008080] font-bold hover:underline ml-1">新規登録</a>
          @else
            すでにアカウントをお持ちですか？
            <a href="?mode=login" class="text-[#008080] font-bold hover:underline ml-1">ログイン</a>
          @endif
        </p>
      </div>

    </div>

    <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#FFB03A]/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-[#008080]/5 to-transparent pointer-events-none"></div>

  </div>

</body>
</html>





{{-- <!DOCTYPE html>
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

  <div class="w-full max-w-[412px] bg-[#FFFBF3] min-h-screen sm:min-h-[852px] shadow-2xl relative flex flex-col justify-between overflow-x-hidden sm:rounded-[40px]">
    
    <div class="flex justify-between items-center px-6 pt-3 text-xs font-semibold text-gray-800 z-10">
      <div>9:41</div>
      <div class="w-28 h-6 bg-[#1a1c24] rounded-full absolute left-1/2 transform -translate-x-1/2 top-2 hidden sm:block"></div>
      <div class="flex items-center space-x-1">
        <i class="fa-solid fa-signal text-[10px]"></i>
        <i class="fa-solid fa-water text-[10px]"></i>
        <i class="fa-solid fa-battery-three-quarters"></i>
      </div>
    </div>

    <div class="flex-1 flex flex-col justify-between p-6 pt-12 relative z-10">
      
      <div class="text-center my-auto pt-4">
        <div class="w-16 h-16 bg-[#008080] rounded-2xl flex items-center justify-center shadow-md mx-auto mb-3">
          <span class="text-white font-bold text-4xl">C</span>
        </div>
        <h1 class="text-3xl font-extrabold tracking-tight text-[#333]">
          <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
        </h1>
        <p class="text-[11px] text-gray-400 font-bold tracking-wider uppercase mt-0.5">Cebu Travel Community</p>
        
        <p class="text-gray-600 text-sm font-medium mt-6" id="welcome-text">Welcome back! Please log in to your account.</p>
      </div>

      <div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 shadow-sm border border-orange-50/50 mt-4">
        
        <div class="flex bg-gray-100 p-1 rounded-xl mb-5">
          <button id="tab-login" onclick="switchTab('login')" class="flex-1 py-2 text-xs font-bold rounded-lg bg-white text-[#008080] shadow-sm transition-all">
            Log In
          </button>
          <button id="tab-signup" onclick="switchTab('signup')" class="flex-1 py-2 text-xs font-bold rounded-lg text-gray-500 hover:text-gray-700 transition-all">
            Sign Up
          </button>
        </div>

        <form onsubmit="handleSubmit(event)" class="space-y-4">
          <div id="field-username" class="hidden transition-all duration-300">
            <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Username</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
                <i class="fa-regular fa-user"></i>
              </span>
              <input type="text" placeholder="CebuTraveler" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium">
            </div>
          </div>

          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Email Address</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
                <i class="fa-regular fa-envelope"></i>
              </span>
              <input type="email" placeholder="example@cebutra.com" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          <div>
            <div class="flex justify-between items-center mb-1 ml-1">
              <label class="block text-xs font-bold text-gray-500">Password</label>
              <a href="#" id="link-forgot" class="text-[11px] font-bold text-[#008080] hover:underline">Forgot?</a>
            </div>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
                <i class="fa-solid fa-lock"></i>
              </span>
              <input type="password" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
            </div>
          </div>

          <div id="field-terms" class="hidden items-center ml-1 pt-1">
            <input type="checkbox" id="terms" class="w-4 h-4 text-[#008080] border-gray-300 rounded focus:ring-[#008080]">
            <label for="terms" class="ml-2 text-xs text-gray-500 font-medium">
              I agree to the <a href="#" class="text-[#008080] font-bold hover:underline">Terms</a> and <a href="#" class="text-[#008080] font-bold hover:underline">Privacy Policy</a>
            </label>
          </div>

          <button type="submit" id="btn-submit" class="w-full bg-[#FF6347] hover:bg-[#e55338] text-white font-bold py-3.5 rounded-xl shadow-md shadow-orange-500/20 transition-all text-sm mt-2 active:scale-[0.99]">
            Log In
          </button>
        </form>

        <div class="relative flex py-4 items-center">
          <div class="flex-grow border-t border-gray-100"></div>
          <span class="flex-shrink mx-4 text-gray-400 text-[10px] font-bold tracking-wider uppercase">or</span>
          <div class="flex-grow border-t border-gray-100"></div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <button class="flex items-center justify-center gap-2 border border-gray-200 bg-white hover:bg-gray-50 py-2.5 rounded-xl text-xs font-bold text-gray-700 transition-all active:scale-[0.98]">
            <i class="fa-brands fa-google text-red-500 text-sm"></i> Google
          </button>
          <button class="flex items-center justify-center gap-2 border border-gray-200 bg-white hover:bg-gray-50 py-2.5 rounded-xl text-xs font-bold text-gray-700 transition-all active:scale-[0.98]">
            <i class="fa-brands fa-apple text-black text-sm"></i> Apple
          </button>
        </div>

      </div>

      <div class="text-center pt-6 pb-2">
        <p class="text-xs text-gray-500 font-medium" id="footer-text">
          Don't have an account?
          <button onclick="switchTab('signup')" class="text-[#008080] font-bold hover:underline ml-1">Sign Up</button>
        </p>
      </div>

    </div>

    <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#FFB03A]/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-[#008080]/5 to-transparent pointer-events-none"></div>

  </div>

  <script>
    let currentMode = 'login';

    function switchTab(mode) {
      currentMode = mode;
      
      const tabLogin = document.getElementById('tab-login');
      const tabSignup = document.getElementById('tab-signup');
      const welcomeText = document.getElementById('welcome-text');
      const fieldUsername = document.getElementById('field-username');
      const fieldTerms = document.getElementById('field-terms');
      const btnSubmit = document.getElementById('btn-submit');
      const linkForgot = document.getElementById('link-forgot');
      const footerText = document.getElementById('footer-text');

      if (mode === 'login') {
        tabLogin.className = "flex-1 py-2 text-xs font-bold rounded-lg bg-white text-[#008080] shadow-sm transition-all";
        tabSignup.className = "flex-1 py-2 text-xs font-bold rounded-lg text-gray-500 hover:text-gray-700 transition-all";
        welcomeText.textContent = "Welcome back! Please log in to your account.";
        fieldUsername.classList.add('hidden');
        fieldTerms.classList.remove('flex');
        fieldTerms.classList.add('hidden');
        linkForgot.classList.remove('hidden');
        btnSubmit.textContent = "Log In";
        footerText.innerHTML = 'Don\'t have an account?<button type="button" onclick="switchTab(\'signup\')" class="text-[#008080] font-bold hover:underline ml-1">Sign Up</button>';
      } else {
        tabLogin.className = "flex-1 py-2 text-xs font-bold rounded-lg text-gray-500 hover:text-gray-700 transition-all";
        tabSignup.className = "flex-1 py-2 text-xs font-bold rounded-lg bg-white text-[#008080] shadow-sm transition-all";
        welcomeText.textContent = "Join the CebuTra community and share your journeys!";
        fieldUsername.classList.remove('hidden');
        fieldTerms.classList.remove('hidden');
        fieldTerms.classList.add('flex');
        linkForgot.classList.add('hidden');
        btnSubmit.textContent = "Create Account";
        footerText.innerHTML = 'Already have an account?<button type="button" onclick="switchTab(\'login\')" class="text-[#008080] font-bold hover:underline ml-1">Log In</button>';
      }
    }

    function handleSubmit(event) {
      event.preventDefault();
      alert(currentMode === 'login' ? 'Logged in successfully (Simulated)' : 'Account created successfully (Simulated)');
    }
  </script>

</body>
</html> --}}