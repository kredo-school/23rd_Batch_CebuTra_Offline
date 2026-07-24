<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログイン画面（auth.blade.php）の表示
     */
    public function showLoginForm()
    {
        // もし views/auth.blade.php なら 'auth'
        // views/auth/login.blade.php などサブフォルダなら 'auth.login' に変更してください
        return view('auth'); 
    }

    /**
     * 💡 ログアウト処理（JSなし・Form送信の受け皿）
     */
    public function destroy(Request $request)
    {
        // 1. ログアウトを実行
        Auth::logout();

        // 2. 現在のユーザーセッションを無効化（安全のため）
        $request->session()->invalidate();

        // 3. CSRFトークンを再生成（二重送信やセッション固定攻撃の防止）
        $request->session()->regenerateToken();

        // 4. 💡 ログアウト成功後、auth 画面へリダイレクト
        // ルート名で指定する場合
        return redirect()->route('auth')->with('status', 'Logged out successfully.');
        
        // URLで直接指定したい場合はこちら：
        // return redirect('/auth');
    }
}