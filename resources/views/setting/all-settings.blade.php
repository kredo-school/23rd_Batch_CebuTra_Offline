<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Settings</title>
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

  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    
    <!-- ヘッダー -->
    <div class="bg-white pt-10 pb-4 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
      <div class="flex justify-between items-center absolute top-3 left-6 right-6 text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>

      <div class="flex justify-between items-center mt-2">
        <!-- 💡 aタグの遷移先をLaravelのプロフィール画面ルートに変更 -->
        <a href="{{ route('profile') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> {{ __('messages.settings.back') }}
        </a>
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.settings.settings') }}</h1>
        <div class="w-12"></div> 
      </div>
    </div>

    <!-- メイン領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
      
      <!-- Account & Security -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">{{ __('messages.settings.account_security') }}</h3>
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 overflow-hidden divide-y divide-gray-50">
          
          <a href="#" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center text-sm"><i class="fa-solid fa-share-nodes"></i></div>
              <span class="text-xs font-bold text-slate-800">{{ __('messages.settings.linked_account') }}</span>
            </div>
            <div class="flex items-center gap-1.5 text-gray-300">
              <span class="text-[9px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">{{ __('messages.settings.connected') }}</span>
              <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </div>
          </a>

          <a href="{{ route('setting.language') }}" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-teal-50 text-[#008080] flex items-center justify-center text-sm"><i class="fa-solid fa-language"></i></div>
              <span class="text-xs font-bold text-slate-800">{{__('messages.settings.language')}}</span>
            </div>
            <div class="flex items-center gap-1.5 text-gray-300">
              <span class="text-[10px] text-gray-400 font-medium">{{__('messages.settings.selection')}}</span>
              <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </div>
          </a>

        </div>
      </div>

      <!-- Support & Legal -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">{{ __('messages.settings.support_legal') }}</h3>
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 overflow-hidden divide-y divide-gray-50">
          
          <a href="{{ route('setting.emergency') }}" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-red-50 text-red-500 flex items-center justify-center text-sm"><i class="fa-solid fa-phone-flip"></i></div>
              <span class="text-xs font-bold text-slate-800">{{__('messages.settings.emerg_contact')}}</span>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-300"></i>
          </a>

          <a href="{{ route('setting.help') }}" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-purple-50 text-purple-500 flex items-center justify-center text-sm"><i class="fa-regular fa-circle-question"></i></div>
              <span class="text-xs font-bold text-slate-800">{{__('messages.settings.help_center')}}</span>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-300"></i>
          </a>

          <a href="{{ route('setting.terms') }}" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-gray-50 text-gray-500 flex items-center justify-center text-sm"><i class="fa-regular fa-file-lines"></i></div>
              <span class="text-xs font-bold text-slate-800">{{__('messages.settings.terms')}}</span>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-300"></i>
          </a>

        </div>
      </div>

      <!-- アクションボタン領域（JSなし仕様） -->
      <div class="space-y-4 pt-2">
        
        <div class="space-y-3">
          <!-- ログアウトボタン -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="button" 
                    onclick="openConfirmModal('logout')" 
                    class="w-full bg-white border border-gray-100 text-red-500 text-xs font-bold py-3.5 px-4 rounded-[20px] shadow-sm hover:bg-red-50/40 active:scale-[0.99] transition-all cursor-pointer">
              {{ __('messages.settings.logout') }}
            </button>
          </form>

          <!-- アカウント削除ボタン -->
          <form id="delete-account-form" action="{{ route('profile.destroy') }}" method="POST" class="text-center m-0">
            @csrf
            @method('DELETE')
            <button type="button" 
                    onclick="openConfirmModal('delete')" 
                    class="text-[11px] font-semibold text-gray-400 hover:text-red-500 underline transition-colors cursor-pointer bg-transparent border-0 p-0">
              {{ __('messages.settings.delete_account') }}
            </button>
          </form>
        </div>

        <!-- ========================================== -->
        <!-- 2. カスタム確認モーダル（アプリデザイン共通） -->
        <!-- ========================================== -->
        <div id="custom-confirm-modal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-200">
          
          <div id="modal-card" class="bg-white rounded-[28px] p-6 max-w-xs w-full shadow-2xl border border-gray-100 text-center space-y-4 transform scale-95 transition-all duration-200">
            
            <!-- 警告アイコン背景 -->
            <div class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center mx-auto text-lg">
              <i id="modal-icon" class="fa-solid fa-triangle-exclamation"></i>
            </div>

            <!-- メッセージ文言 -->
            <div class="space-y-1">
              <h3 id="modal-title" class="text-base font-bold text-gray-800"></h3>
              <p id="modal-message" class="text-xs text-gray-400 font-medium leading-relaxed px-2"></p>
            </div>

            <!-- ボタンエリア -->
            <div class="grid grid-cols-2 gap-2.5 pt-2">
              <!-- キャンセルボタン -->
              <button type="button" 
                      onclick="closeConfirmModal()" 
                      class="w-full bg-gray-100 text-gray-600 text-xs font-bold py-3 rounded-2xl hover:bg-gray-200 active:scale-95 transition-all cursor-pointer">
                {{ __('messages.settings.cancel') ?? 'Cancel' }}
              </button>

              <!-- 実行ボタン -->
              <button type="button" 
                      id="modal-confirm-btn" 
                      onclick="submitActiveForm()" 
                      class="w-full bg-red-500 text-white text-xs font-bold py-3 rounded-2xl shadow-md shadow-red-500/20 hover:bg-red-600 active:scale-95 transition-all cursor-pointer">
                {{ __('messages.settings.confirm') ?? 'OK' }}
              </button>
            </div>

          </div>
        </div>

        <!-- ========================================== -->
        <!-- 3. 制御用JavaScript -->
        <!-- ========================================== -->
        <script>
          let targetFormId = '';

          // 翻訳データをJSへ定義（3言語自動対応）
          const modalTranslations = {
            logout: {
              title: @json(__('messages.settings.logout')),
              message: @json(__('messages.settings.confirm_logout')),
              icon: 'fa-solid fa-right-from-bracket'
            },
            delete: {
              title: @json(__('messages.settings.delete_account')),
              message: @json(__('messages.settings.confirm_delete_account')),
              icon: 'fa-solid fa-triangle-exclamation'
            }
          };

          // モーダルを開く処理
          function openConfirmModal(type) {
            const modal = document.getElementById('custom-confirm-modal');
            const modalCard = document.getElementById('modal-card');
            const titleEl = document.getElementById('modal-title');
            const msgEl = document.getElementById('modal-message');
            const iconEl = document.getElementById('modal-icon');

            if (type === 'logout') {
              targetFormId = 'logout-form';
              titleEl.innerText = modalTranslations.logout.title;
              msgEl.innerText = modalTranslations.logout.message;
              iconEl.className = modalTranslations.logout.icon;
            } else if (type === 'delete') {
              targetFormId = 'delete-account-form';
              titleEl.innerText = modalTranslations.delete.title;
              msgEl.innerText = modalTranslations.delete.message;
              iconEl.className = modalTranslations.delete.icon;
            }

            // 表示アニメーション
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modalCard.classList.remove('scale-95');
            modalCard.classList.add('scale-100');
          }

          // モーダルを閉じる処理
          function closeConfirmModal() {
            const modal = document.getElementById('custom-confirm-modal');
            const modalCard = document.getElementById('modal-card');

            modalCard.classList.remove('scale-100');
            modalCard.classList.add('scale-95');
            modal.classList.add('opacity-0', 'pointer-events-none');
            targetFormId = '';
          }

          // フォーム実行
          function submitActiveForm() {
            if (targetFormId) {
              document.getElementById(targetFormId).submit();
            }
          }
        </script>
        
      </div>

    </div>

    <!-- ボトムナビ（各ボタンにrouteを適用） -->
    @include('components.bottom-nav')

    {{-- <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
      <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-house text-lg"></i><span class="text-[10px] font-medium mt-0.5">Home</span></a>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-magnifying-glass text-lg"></i><span class="text-[10px] font-medium mt-0.5">Explore</span></a>
      <div class="relative -top-5 flex flex-col items-center">
        <a href="#" class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white border-4 border-white shadow-lg shadow-orange-500/30"><i class="fa-solid fa-plus text-xl"></i></a>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">Recruit</span>
      </div>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-map text-lg"></i><span class="text-[10px] font-medium mt-0.5">Itinerary</span></a>
      <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]"><i class="fa-solid fa-user text-lg"></i><span class="text-[10px] font-bold mt-0.5">Profile</span></a>
    </div> --}}

  </div>

</body>
</html>