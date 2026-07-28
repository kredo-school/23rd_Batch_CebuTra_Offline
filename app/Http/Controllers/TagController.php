<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * タグ一覧表示(イベント作成画面などで選択肢として使用)
     */
    public function index()
    {
        $tags = Tag::orderBy('name')->get();

        return view('tags.index', compact('tags'));
    }
}
