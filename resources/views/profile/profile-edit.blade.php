<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Edit Profile</title>
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
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  <!-- 外枠コンテナ（ sm:h-[720px] 内でスクロール処理 ） -->
  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px]">
    @csrf
    
    <!-- 1. ヘッダー（上部固定） -->
    <div class="bg-white pt-9 pb-3.5 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
      <div class="flex justify-between items-center absolute top-2.5 left-5 right-5 text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>

      <!-- アクション -->
      <div class="flex justify-between items-center mt-2">
        <a href="{{ route('profile') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> {{__('messages.edit_profile.cancel')}}
        </a>
        <h1 class="text-base font-bold text-gray-800">{{__('messages.edit_profile.edit_prof')}}</h1>
        <button type="submit" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold bg-transparent border-0 cursor-pointer">
          {{__('messages.edit_profile.save')}}
        </button>
      </div>
    </div>

    <!-- 2. 入力フォーム領域（大きめの余白とテキストでゆったりスクロール可能） -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
      
      <!-- エラー表示 -->
      @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-2xl text-xs space-y-1">
          <p class="font-bold flex items-center gap-1.5"><i class="fa-solid fa-triangle-exclamation"></i> 入力内容を確認してください</p>
          <ul class="list-disc list-inside space-y-0.5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- アバター画像選択エリア（w-24 h-24 で大きく表示） -->
      <div class="flex flex-col items-center justify-center space-y-2 py-2">
        <input type="file" id="avatar-input" name="avatar" accept="image/*" class="hidden" onchange="previewImage(event)">

        <label for="avatar-input" class="relative group cursor-pointer">
          <div id="avatar-preview-container" class="w-24 h-24 bg-[#2E9AA4] rounded-3xl flex items-center justify-center border-4 border-white shadow-md text-5xl overflow-hidden">
            @if(isset($user->avatar_url) && $user->avatar_url)
              <img id="avatar-preview" src="{{ asset('storage/' . $user->avatar_url) }}" class="w-full h-full object-cover">
            @else
              <span id="avatar-emoji">🌺</span>
              <img id="avatar-preview" src="" class="w-full h-full object-cover hidden">
            @endif
          </div>
          <div class="absolute bottom-0 right-0 bg-[#FF6347] text-white w-7 h-7 rounded-xl flex items-center justify-center shadow border-2 border-white text-xs group-hover:scale-110 transition-transform">
            <i class="fa-solid fa-camera"></i>
          </div>
        </label>
        <label for="avatar-input" class="text-[10px] text-gray-400 font-bold tracking-wider uppercase cursor-pointer hover:text-gray-600 transition-colors">
          {{__('messages.edit_profile.change_avatar')}}
        </label>
      </div>

      <!-- Basic Info -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">{{__('messages.edit_profile.basic_info')}}</h3>
        <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.nickname')}}</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold" required>
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.bio')}}</label>
            <textarea name="bio" rows="3" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-700 font-medium resize-none leading-relaxed">{{ old('bio', $user->bio) }}</textarea>
          </div>
        </div>
      </div>

      <!-- Study & Stay Info -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">{{__('messages.edit_profile.study_info')}}</h3>
        <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.school')}}</label>
            <input type="text" name="school" value="{{ old('school', $user->school) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.english_level')}}</label>
            <div class="relative">
              <select name="english_level" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none">
                @php $level = old('english_level', $user->english_level ?? 'Intermediate'); @endphp
                <option value="Beginner" {{ $level === 'Beginner' ? 'selected' : '' }}>Beginner (A1-A2)</option>
                <option value="Intermediate" {{ $level === 'Intermediate' ? 'selected' : '' }}>Intermediate (B1)</option>
                <option value="Upper-Intermediate" {{ $level === 'Upper-Intermediate' ? 'selected' : '' }}>Upper-Intermediate (B2)</option>
                <option value="Advanced" {{ $level === 'Advanced' ? 'selected' : '' }}>Advanced (C1-C2)</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </div>
          </div>
          <div>

            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{ __('messages.edit_profile.current_area') }}</label>

            @php
              $currentArea = old('current_area', $user->current_area ?? 'IT Park');
              $presetAreas = ['IT Park', 'Cebu City Center', 'Mactan', 'Mandaue'];
              $isCustom = !in_array($currentArea, $presetAreas);
            @endphp

            <div class="space-y-2">
              <div class="relative">
                <select 
                  id="current_area_select" 
                  onchange="toggleCustomAreaInput(this)" 
                  class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none"
                >
                  <option value="IT Park" {{ $currentArea === 'IT Park' ? 'selected' : '' }}>Around IT Park</option>
                  <option value="Cebu City Center" {{ $currentArea === 'Cebu City Center' ? 'selected' : '' }}>Cebu City Center</option>
                  <option value="Mactan" {{ $currentArea === 'Mactan' ? 'selected' : '' }}>Mactan Island (Resort Area)</option>
                  <option value="Mandaue" {{ $currentArea === 'Mandaue' ? 'selected' : '' }}>Mandaue City</option>
                  <option value="custom" {{ $isCustom ? 'selected' : '' }}>Others (Type directly)</option>
                </select>
                
                <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
                  <i class="fa-solid fa-chevron-down"></i>
                </div>
              </div>

              <div id="custom_area_container" class="{{ $isCustom ? '' : 'hidden' }}">
                <input 
                  type="text" 
                  id="custom_area_input"
                  name="current_area" 
                  value="{{ $currentArea }}" 
                  placeholder="e.g. Talamban, Lapu-Lapu" 
                  class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold"
                >
              </div>
            </div>

            <script>
              function toggleCustomAreaInput(select) {
                const customContainer = document.getElementById('custom_area_container');
                const customInput = document.getElementById('custom_area_input');

                if (select.value === 'custom') {
                  customContainer.classList.remove('hidden');
                  customInput.name = 'current_area';
                  customInput.focus();
                } else {
                  customContainer.classList.add('hidden');
                  customInput.name = '';
                  
                  let hiddenInput = document.getElementById('hidden_area_input');
                  if (!hiddenInput) {
                    hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.id = 'hidden_area_input';
                    hiddenInput.name = 'current_area';
                    select.parentNode.appendChild(hiddenInput);
                  }
                  hiddenInput.value = select.value;
                }
              }

              document.addEventListener("DOMContentLoaded", function() {
                const select = document.getElementById('current_area_select');
                if (select.value !== 'custom') {
                  let hiddenInput = document.createElement('input');
                  hiddenInput.type = 'hidden';
                  hiddenInput.id = 'hidden_area_input';
                  hiddenInput.name = 'current_area';
                  hiddenInput.value = select.value;
                  select.parentNode.appendChild(hiddenInput);
                }
              });
            </script>

          </div>
        </div>
      </div>

      <!-- Other Details -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">{{__('messages.edit_profile.other_details')}}</h3>
        <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
          <div class="grid grid-cols-2 gap-3">
            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.age')}}</label>
              <input type="number" name="age" value="{{ old('age', $user->age) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
            </div>
            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.gender')}}</label>
              <div class="relative">
                <select name="gender" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none" required>
                  @php $gender = old('gender', $user->gender); @endphp
                  <option value="Male" {{ $gender === 'Male' ? 'selected' : '' }}>Male</option>
                  <option value="Female" {{ $gender === 'Female' ? 'selected' : '' }}>Female</option>
                  <option value="Rather Not Say" {{ $gender === 'Rather Not Say' ? 'selected' : '' }}>Rather Not Say</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
                  <i class="fa-solid fa-chevron-down"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-3">
            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.nationality')}}</label>
              <input type="text" name="nationality" value="{{ old('nationality', $user->nationality) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
            </div>
            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.native_lang')}}</label>
              <input type="text" name="native_lang" value="{{ old('native_lang', $user->native_lang) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
            </div>
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.email_address')}}</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-600 font-medium" required>
          </div>
        </div>
      </div>

      <!-- アクションボタン -->
      <div class="pt-2 space-y-3">
        <button type="submit" class="w-full bg-[#008080] hover:bg-[#0D7880] text-white font-bold py-3.5 px-4 rounded-2xl shadow-md shadow-teal-900/10 transition-transform active:scale-[0.99] text-sm cursor-pointer">
          {{__('messages.edit_profile.save_changes')}}
        </button>
        <a href="{{ route('profile') }}" class="block w-full bg-white hover:bg-gray-50 border border-gray-200 text-gray-500 font-bold py-3.5 px-4 rounded-2xl text-center transition-all text-sm">
          {{__('messages.edit_profile.cancel')}}
        </a>
      </div>

    </div>

    <!-- 3. ボトムナビゲーションバー -->
    @include('components.bottom-nav')
   
  </form>

  <!-- 画像プレビュー用JavaScript -->
  <script>
    function previewImage(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const preview = document.getElementById('avatar-preview');
          const emoji = document.getElementById('avatar-emoji');
          
          preview.src = e.target.result;
          preview.classList.remove('hidden');
          if (emoji) emoji.classList.add('hidden');
        }
        reader.readAsDataURL(file);
      }
    }
  </script>
</body>
</html>