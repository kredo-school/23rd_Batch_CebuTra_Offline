@php $hideFooter = true; @endphp
@extends('layouts.mobile')

@section('title', 'CebuTra - Authentication')

@section('main-class', 'flex-grow flex flex-col justify-between p-6 pt-12 relative z-10')

@section('header')
<!-- Top Background Decorative Blur -->
<div class="absolute -top-10 -right-10 w-40 h-40 bg-[#FFB03A]/10 rounded-full blur-2xl pointer-events-none"></div>
<div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-[#008080]/5 to-transparent pointer-events-none"></div>
@endsection

@section('content')
<div class="text-center my-auto pt-4 flex-shrink-0">
  <div class="w-16 h-16 bg-[#008080] rounded-2xl flex items-center justify-center shadow-md mx-auto mb-3">
    <span class="text-white font-bold text-4xl">C</span>
  </div>
  <h1 class="text-3xl font-extrabold tracking-tight text-[#333]">
    <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
  </h1>
  <p class="text-[11px] text-gray-400 font-bold tracking-wider uppercase mt-0.5">Cebu Travel Community</p>
  
  <p class="text-gray-600 text-sm font-medium mt-6" id="welcome-text">Welcome back! Please log in to your account.</p>
</div>

<div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 shadow-sm border border-orange-50/50 mt-4 flex-shrink-0">
  
  <!-- Tabs Selection -->
  <div class="flex bg-gray-100 p-1 rounded-xl mb-5">
    <button id="tab-login" type="button" onclick="switchTab('login')" class="flex-1 py-2 text-xs font-bold rounded-lg transition-all">
      Log In
    </button>
    <button id="tab-signup" type="button" onclick="switchTab('signup')" class="flex-1 py-2 text-xs font-bold rounded-lg transition-all">
      Sign Up
    </button>
  </div>

  <!-- Validation Error Display -->
  @if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 rounded-2xl p-3.5 mb-4 text-xs space-y-1">
      @foreach ($errors->all() as $error)
        <div><i class="fa-solid fa-circle-exclamation mr-1.5"></i> {{ $error }}</div>
      @endforeach
    </div>
  @endif

  <!-- Authentication Form -->
  <form id="auth-form" method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <!-- Username / Name Field (Signup Only) -->
    <div id="field-username" class="hidden transition-all duration-300">
      <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Username</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
          <i class="fa-regular fa-user"></i>
        </span>
        <input type="text" name="name" placeholder="CebuTraveler" value="{{ old('name') }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium">
      </div>
    </div>

    <!-- Email Field -->
    <div>
      <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Email Address</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
          <i class="fa-regular fa-envelope"></i>
        </span>
        <input type="email" name="email" placeholder="example@cebutra.com" value="{{ old('email') }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required autocomplete="email">
      </div>
    </div>

    <!-- Password Field -->
    <div>
      <div class="flex justify-between items-center mb-1 ml-1">
        <label class="block text-xs font-bold text-gray-500">Password</label>
        <a href="{{ route('password.request') }}" id="link-forgot" class="text-[11px] font-bold text-[#008080] hover:underline">Forgot?</a>
      </div>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
          <i class="fa-solid fa-lock"></i>
        </span>
        <input type="password" name="password" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium" required>
      </div>
    </div>

    <!-- Confirm Password Field (Signup Only) -->
    <div id="field-confirm-password" class="hidden transition-all duration-300">
      <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Confirm Password</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
          <i class="fa-solid fa-lock"></i>
        </span>
        <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-medium">
      </div>
    </div>

    <!-- Terms & Conditions (Signup Only) -->
    <div id="field-terms" class="hidden items-center ml-1 pt-1">
      <input type="checkbox" id="terms" required class="w-4 h-4 text-[#008080] border-gray-300 rounded focus:ring-[#008080] cursor-pointer">
      <label for="terms" class="ml-2 text-xs text-gray-500 font-medium select-none cursor-pointer">
        I agree to the <a href="{{ route('settings.terms') }}" class="text-[#008080] font-bold hover:underline">Terms</a> and <a href="{{ route('settings.terms') }}" class="text-[#008080] font-bold hover:underline">Privacy Policy</a>
      </label>
    </div>

    <!-- Submit Button -->
    <button type="submit" id="btn-submit" class="w-full bg-[#FF6347] hover:bg-[#e55338] text-white font-bold py-3.5 rounded-xl shadow-md shadow-orange-500/20 transition-all text-sm mt-2 active:scale-[0.99] cursor-pointer">
      Log In
    </button>
  </form>

  <div class="relative flex py-4 items-center">
    <div class="flex-grow border-t border-gray-100"></div>
    <span class="flex-shrink mx-4 text-gray-400 text-[10px] font-bold tracking-wider uppercase">or</span>
    <div class="flex-grow border-t border-gray-100"></div>
  </div>

  <div class="grid grid-cols-2 gap-3">
    <button class="flex items-center justify-center gap-2 border border-gray-200 bg-white hover:bg-gray-50 py-2.5 rounded-xl text-xs font-bold text-gray-700 transition-all active:scale-[0.98] cursor-pointer">
      <i class="fa-brands fa-google text-red-500 text-sm"></i> Google
    </button>
    <button class="flex items-center justify-center gap-2 border border-gray-200 bg-white hover:bg-gray-50 py-2.5 rounded-xl text-xs font-bold text-gray-700 transition-all active:scale-[0.98] cursor-pointer">
      <i class="fa-brands fa-apple text-black text-sm"></i> Apple
    </button>
  </div>

</div>

<div class="text-center pt-6 pb-2 flex-shrink-0">
  <p class="text-xs text-gray-500 font-medium" id="footer-text">
    Don't have an account?
    <button type="button" onclick="switchTab('signup')" class="text-[#008080] font-bold hover:underline ml-1">Sign Up</button>
  </p>
</div>
@endsection

@section('scripts')
<script>
  let currentMode = "{{ $defaultTab ?? 'login' }}";

  function switchTab(mode) {
    currentMode = mode;
    
    const tabLogin = document.getElementById('tab-login');
    const tabSignup = document.getElementById('tab-signup');
    const welcomeText = document.getElementById('welcome-text');
    const fieldUsername = document.getElementById('field-username');
    const fieldConfirmPassword = document.getElementById('field-confirm-password');
    const fieldTerms = document.getElementById('field-terms');
    const btnSubmit = document.getElementById('btn-submit');
    const linkForgot = document.getElementById('link-forgot');
    const footerText = document.getElementById('footer-text');
    const authForm = document.getElementById('auth-form');

    if (mode === 'login') {
      tabLogin.className = "flex-1 py-2 text-xs font-bold rounded-lg bg-white text-[#008080] shadow-sm transition-all";
      tabSignup.className = "flex-1 py-2 text-xs font-bold rounded-lg text-gray-500 hover:text-gray-700 transition-all";
      welcomeText.textContent = "Welcome back! Please log in to your account.";
      
      fieldUsername.classList.add('hidden');
      fieldConfirmPassword.classList.add('hidden');
      fieldTerms.classList.remove('flex');
      fieldTerms.classList.add('hidden');
      linkForgot.classList.remove('hidden');
      btnSubmit.textContent = "Log In";
      footerText.innerHTML = 'Don\'t have an account?<button type="button" onclick="switchTab(\'signup\')" class="text-[#008080] font-bold hover:underline ml-1">Sign Up</button>';
      
      authForm.action = "{{ route('login') }}";
      
      // Make username & confirm password non-required
      fieldUsername.querySelector('input').required = false;
      fieldConfirmPassword.querySelector('input').required = false;
    } else {
      tabLogin.className = "flex-1 py-2 text-xs font-bold rounded-lg text-gray-500 hover:text-gray-700 transition-all";
      tabSignup.className = "flex-1 py-2 text-xs font-bold rounded-lg bg-white text-[#008080] shadow-sm transition-all";
      welcomeText.textContent = "Join the CebuTra community and share your journeys!";
      
      fieldUsername.classList.remove('hidden');
      fieldConfirmPassword.classList.remove('hidden');
      fieldTerms.classList.remove('hidden');
      fieldTerms.classList.add('flex');
      linkForgot.classList.add('hidden');
      btnSubmit.textContent = "Create Account";
      footerText.innerHTML = 'Already have an account?<button type="button" onclick="switchTab(\'login\')" class="text-[#008080] font-bold hover:underline ml-1">Log In</button>';
      
      authForm.action = "{{ route('register.submit') }}";
      
      // Make username & confirm password required for signup
      fieldUsername.querySelector('input').required = true;
      fieldConfirmPassword.querySelector('input').required = true;
    }
  }

  // Initialize tabs based on URL or variables
  document.addEventListener('DOMContentLoaded', () => {
    // Check if the current URL contains 'register'
    if (window.location.pathname.includes('register') || currentMode === 'signup') {
      switchTab('signup');
    } else {
      switchTab('login');
    }
  });
</script>
@endsection
