<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User; // もしくは独自に作成したProfileモデルなど
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * プロフィール表示画面 (profile.blade.php)
     */
    public function show()
    {
        // 💡 ログインしているユーザーの情報を取得（未ログイン時の仮データも考慮）
        $user = Auth::user();

        // ビューにユーザーデータを渡して表示
        return view('profile.profile', compact('user'));
    }

    /**
     * プロフィール編集画面 (profile-edit.blade.php)
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.profile-edit', compact('user'));
    }

    /**
     * プロフィール更新処理（JS不要・Form送信の受け皿）
     */
    public function update(Request $request)
    {
        // 1. 入力データのバリデーション（ルールチェック）
        $validated = $request->validate([
            'nickname'      => 'required|string|max:50',
            'bio'           => 'nullable|string|max:500',
            'school'        => 'nullable|string|max:100',
            'english_level' => 'required|string',
            'current_area'  => 'required|string',
            'age'           => 'nullable|integer|min:0|max:120',
            'gender'        => 'required|string',
            'nationality'   => 'nullable|string|max:50',
            'native_lang'   => 'nullable|string|max:50',
            'email'         => 'required|email|max:255',
        ]);

        // 2. ログインユーザーの情報を更新
        $user = Auth::user();
        
        if ($user) {
            // データベースの対応するカラムに保存
            $user->update([
                'name'          => $validated['nickname'], // ログイン用のnameカラムなどをニックネームに流用する場合
                'bio'           => $validated['bio'],
                'school'        => $validated['school'],
                'english_level' => $validated['english_level'],
                'current_area'  => $validated['current_area'],
                'age'           => $validated['age'],
                'gender'        => $validated['gender'],
                'nationality'   => $validated['nationality'],
                'native_lang'   => $validated['native_lang'],
                'email'         => $validated['email'],
            ]);
        }

        // 3. 💡 保存完了後、JSを使わずにプロフィール画面へリダイレクト（戻す）
        // フラッシュメッセージ（保存完了の通知など）も一緒に送れます
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }


    /**
     * 設定画面の表示
     * (もし resources/views/profile/settings.blade.php に置いている場合は 'profile.settings' にする)
     */
    public function settings()
    {
        return view('setting.all-settings'); // または view('settings') フォルダ構成に合わせてドット表記
    }

    /**
     * 緊急連絡先画面の表示
     * (※ビューの保存場所が resources/views/profile/emergency-contacts.blade.php の場合)
     */
    public function emergency()
    {
        return view('setting.emergency-contacts');
    }


    /**
     * ヘルプセンター画面の表示
     */
    public function helpCenter()
    {
        return view('setting.help-center');
    }

    /**
     * 利用規約＆免責事項画面の表示
     */
    public function terms()
    {
        return view('setting.terms');
    }
    

    /**
     * アカウント削除 ＆ ログアウト
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $user->delete();
        }

        // ログアウトとセッション破棄
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 💡 ログアウト後に auth ルート（auth.blade.php）へ飛ばす
        return redirect()->route('auth')->with('status', 'Your account has been deleted.');
    }
        



    /**
     * 言語設定画面の表示
     */
    public function editLanguage()
    {
        return view('setting.language');
    }

    /**
     * 言語設定の更新（POST）
     */
    public function updateLanguage(Request $request)
    {
        $request->validate([
            'locale' => 'required|in:english,japanese,chinese',
        ]);

        // セッションに選択した言語を保存
        session(['locale' => $request->locale]);
        
        // 選択された言語をアプリケーションに即座に反映
        App::setLocale($request->locale);

        // 設定一覧画面へ戻る（メッセージ等を付与してもOK）
        return redirect()->route('all-settings');
    }
}
    
