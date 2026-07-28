@extends('layouts.mobile')

@section('title', 'CebuTra - Edit Profile')

@section('main-class', 'flex-grow overflow-y-auto no-scrollbar p-5 space-y-6 pb-32')

@section('header')
<div class="bg-white pt-10 pb-4 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
  <div class="flex justify-between items-center mt-2">
    <a href="{{ route('profile.show') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
      <i class="fa-solid fa-chevron-left text-xs"></i> Cancel
    </a>
    <h1 class="text-base font-bold text-gray-800">Edit Profile</h1>
    <button type="submit" form="edit-profile-form" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold cursor-pointer">
      Save
    </button>
  </div>
</div>
@endsection

@section('content')
<form id="edit-profile-form" method="POST" action="{{ route('profile.update') }}" class="space-y-6">
  @csrf
  @method('PATCH')

  <!-- Validation Error Display -->
  @if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 rounded-2xl p-3.5 text-xs space-y-1">
      @foreach ($errors->all() as $error)
        <div><i class="fa-solid fa-circle-exclamation mr-1.5"></i> {{ $error }}</div>
      @endforeach
    </div>
  @endif

  <!-- Avatar Icon Change Mockup -->
  <div class="flex flex-col items-center justify-center space-y-2 py-2">
    <div class="relative group cursor-pointer">
      <div class="w-24 h-24 bg-[#2E9AA4] rounded-3xl flex items-center justify-center border-4 border-white shadow-md text-5xl">
        🌺
      </div>
      <div class="absolute bottom-0 right-0 bg-[#FF6347] text-white w-7 h-7 rounded-xl flex items-center justify-center shadow border-2 border-white text-xs">
        <i class="fa-solid fa-camera"></i>
      </div>
    </div>
    <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">Change Avatar</p>
  </div>

  <!-- Basic Info Section -->
  <div class="space-y-4">
    <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">Basic Info</h3>
    <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
      <div>
        <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Nickname</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold" required>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Bio</label>
        <textarea name="bio" rows="3" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-700 font-medium resize-none leading-relaxed">{{ old('bio', $user->bio) }}</textarea>
      </div>
    </div>
  </div>

  <!-- Study & Stay Info Section -->
  <div class="space-y-4">
    <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">Study & Stay Info</h3>
    <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
      <div>
        <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">School / Organization</label>
        <input type="text" name="school" value="{{ old('school', $user->school) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">English Level</label>
        <div class="relative">
          <select name="english_level" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none">
            <option value="Beginner (A1-A2)" {{ old('english_level', $user->english_level) === 'Beginner (A1-A2)' ? 'selected' : '' }}>Beginner (A1-A2)</option>
            <option value="Intermediate (B1)" {{ old('english_level', $user->english_level) === 'Intermediate (B1)' ? 'selected' : '' }}>Intermediate (B1)</option>
            <option value="Upper-Intermediate (B2)" {{ old('english_level', $user->english_level) === 'Upper-Intermediate (B2)' ? 'selected' : '' }}>Upper-Intermediate (B2)</option>
            <option value="Advanced (C1-C2)" {{ old('english_level', $user->english_level) === 'Advanced (C1-C2)' ? 'selected' : '' }}>Advanced (C1-C2)</option>
          </select>
          <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Current Area (Cebu)</label>
        <div class="relative">
          <select name="current_area" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none">
            <option value="Around IT Park" {{ old('current_area', $user->current_area) === 'Around IT Park' ? 'selected' : '' }}>Around IT Park</option>
            <option value="Cebu City Center" {{ old('current_area', $user->current_area) === 'Cebu City Center' ? 'selected' : '' }}>Cebu City Center</option>
            <option value="Mactan Island (Resort Area)" {{ old('current_area', $user->current_area) === 'Mactan Island (Resort Area)' ? 'selected' : '' }}>Mactan Island (Resort Area)</option>
            <option value="Mandaue City" {{ old('current_area', $user->current_area) === 'Mandaue City' ? 'selected' : '' }}>Mandaue City</option>
            <option value="Others" {{ old('current_area', $user->current_area) === 'Others' ? 'selected' : '' }}>Others</option>
          </select>
          <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Other Details Section -->
  <div class="space-y-4">
    <h3 class="text-xs font-bold text-gray-400 tracking-wider uppercase px-1">Other Details</h3>
    <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100/50 space-y-4">
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Age</label>
          <input type="number" name="age" value="{{ old('age', $user->age) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Gender</label>
          <div class="relative">
            <select name="gender" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-3.5 pr-10 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold appearance-none">
              <option value="Male" {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>Female</option>
              <option value="Rather Not Say" {{ old('gender', $user->gender) === 'Rather Not Say' ? 'selected' : '' }}>Rather Not Say</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400 text-xs">
              <i class="fa-solid fa-chevron-down"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Nationality</label>
          <input type="text" name="nationality" value="{{ old('nationality', $user->nationality) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Native Lang</label>
          <input type="text" name="native_lang" value="{{ old('native_lang', $user->native_lang ?? 'Japanese') }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
        </div>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Email Address</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 px-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-600 font-medium" required>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-500 mb-1.5 ml-0.5">Instagram Username</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-sm">
            <i class="fa-brands fa-instagram"></i>
          </span>
          <input type="text" name="instagram" value="{{ old('instagram', $user->instagram) }}" placeholder="username" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-10 pr-3.5 text-sm focus:outline-none focus:border-[#008080] focus:bg-white transition-all text-gray-800 font-bold">
        </div>
      </div>
    </div>
  </div>

  <!-- Save / Cancel Buttons -->
  <div class="pt-2 space-y-3">
    <button type="submit" class="w-full bg-[#008080] hover:bg-[#0D7880] text-white font-bold py-3.5 px-4 rounded-2xl shadow-md shadow-teal-900/10 transition-transform active:scale-[0.99] text-sm cursor-pointer">
      Save Changes
    </button>
    <a href="{{ route('profile.show') }}" class="block w-full bg-white hover:bg-gray-50 border border-gray-200 text-gray-500 font-bold py-3.5 px-4 rounded-2xl text-center transition-all text-sm cursor-pointer">
      Cancel
    </a>
  </div>

</form>
@endsection