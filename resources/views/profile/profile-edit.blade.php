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

  <!-- 💡 JS不要：フォームデータを送信するために、全体を <form> で囲みます -->
  <form action="{{ route('profile.update') }}" method="POST" class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    @csrf <!-- CSRF保護用のトークン（Laravel必須項目） -->
    
    <!-- 1. ヘッダー（上部固定） -->
    <div class="bg-white pt-10 pb-4 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
      <div class="flex justify-between items-center absolute top-3 left-6 right-6 text-xs font-semibold text-gray-800">
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
        <!-- 💡 JS不要：保存はSubmitボタンでコントローラーにPOSTします -->
        <button type="submit" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold bg-transparent border-0 cursor-pointer">
          {{__('messages.edit_profile.save')}}
        </button>
      </div>
    </div>

    <!-- 2. 入力フォーム領域（スクロールエリア） -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-32">
      
      <!-- アバター -->
      <div class="flex flex-col items-center justify-center space-y-2 py-2">
        <div class="relative group">
          <div class="w-24 h-24 bg-[#2E9AA4] rounded-3xl flex items-center justify-center border-4 border-white shadow-md text-5xl">
            🌺
          </div>
          <div class="absolute bottom-0 right-0 bg-[#FF6347] text-white w-7 h-7 rounded-xl flex items-center justify-center shadow border-2 border-white text-xs">
            <i class="fa-solid fa-camera"></i>
          </div>
        </div>
        <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">{{__('messages.edit_profile.change_avatar')}}</p>
      </div>

      <!-- Basic Info -->
      <div class="space-y-4">
        <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">{{__('messages.edit_profile.basic_info')}}</h3>
        <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.nickname')}}</label>
            <input type="text" name="nickname" value="{{ old('nickname', $user->name) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.bio')}}</label>
            <textarea name="bio" rows="3" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-700 font-medium resize-none leading-relaxed">Studying English in Cebu! Enjoying island trips on weekends 🌴</textarea>
          </div>
        </div>
      </div>

      <!-- Study & Stay Info -->
      <div class="space-y-4">
        <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">{{__('messages.edit_profile.study_info')}}</h3>
        <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.school')}}</label>
            <input type="text" name="school" value="EV Academy" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.english_level')}}</label>
            <div class="relative">
              <select name="english_level" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none">
                <option value="Beginner">Beginner (A1-A2)</option>
                <option value="Intermediate" selected>Intermediate (B1)</option>
                <option value="Upper-Intermediate">Upper-Intermediate (B2)</option>
                <option value="Advanced">Advanced (C1-C2)</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </div>
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.current_area')}}</label>
            <div class="relative">
              <select name="current_area" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none">
                <option value="IT Park" selected>Around IT Park</option>
                <option value="Cebu City Center">Cebu City Center</option>
                <option value="Mactan">Mactan Island (Resort Area)</option>
                <option value="Mandaue">Mandaue City</option>
                <option value="Others">Others</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Other Details -->
      <div class="space-y-4">
        <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">{{__('messages.edit_profile.other_details')}}</h3>
        <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
          <div class="grid grid-cols-2 gap-3">
            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.age')}}</label>
              <input type="number" name="age" value="22" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
            </div>
            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.gender')}}</label>
              <div class="relative">
                <select name="gender" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none">
                  <option value="Male">Male</option>
                  <option value="Female" selected>Female</option>
                  <option value="Rather Not Say">Rather Not Say</option>
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
              <input type="text" name="nationality" value="Japan" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
            </div>
            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.native_lang')}}</label>
              <input type="text" name="native_lang" value="Japanese" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
            </div>
          </div>
          <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">{{__('messages.edit_profile.email_address')}}</label>
            <input type="email" name="email" value="sakura@example.com" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-600 font-medium">
          </div>
        </div>
      </div>

      <!-- 💡 下部のアクションエリアもSubmitボタンに変更 -->
      <div class="pt-2 space-y-3">
        <button type="submit" class="w-full bg-[#008080] hover:bg-[#0D7880] text-white font-bold py-3.5 px-4 rounded-2xl shadow-md shadow-teal-900/10 transition-transform active:scale-[0.99] text-sm cursor-pointer">
          {{__('messages.edit_profile.save_changes')}}
        </button>
        <a href="{{ route('profile') }}" class="block w-full bg-white hover:bg-gray-50 border border-gray-200 text-gray-500 font-bold py-3.5 px-4 rounded-2xl text-center transition-all text-sm">
          {{__('messages.edit_profile.cancel')}}
        </a>
      </div>

    </div>

    <!-- 3. ボトムナビゲーションバー（下部固定） -->
    @include('components.bottom-nav')
    {{-- <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
      <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-house text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">Home</span>
      </a>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-magnifying-glass text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">Explore</span>
      </a>
      <div class="relative -top-5 flex flex-col items-center">
        <a href="#" class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-500/30 border-4 border-white transition-transform active:scale-95">
          <i class="fa-solid fa-plus text-xl"></i>
        </a>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">Recruit</span>
      </div>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-map text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">Itinerary</span>
      </a>
      <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]">
        <i class="fa-solid fa-user text-lg"></i>
        <span class="text-[10px] font-bold mt-0.5">Profile</span>
      </a>
    </div> --}}

  </form>
</body>
</html>