<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * 一覧表示(ログインユーザーの旅行プラン一覧)
     */
    public function index()
    {
        $trips = Trip::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('trips.index', compact('trips'));
    }

    /**
     * 新規作成フォーム表示
     */
    public function create()
    {
        return view('trips.create');
    }

    /**
     * 新規登録処理
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'destination'=> 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            // カラムにあわせて調整要
        ]);

        $validated['user_id'] = auth()->id();

        $trip = Trip::create($validated);

        return redirect()->route('trips.show', $trip)
            ->with('success', '旅行プランを作成しました');
    }

    /**
     * 詳細表示
     */
    public function show(Trip $trip)
    {
        // itinerary_items との関連を読み込む(Modelにリレーション定義済みの前提)
        $trip->load('itineraryItems');

        return view('trips.show', compact('trip'));
    }

    /**
     * 編集フォーム表示
     */
    public function edit(Trip $trip)
    {
        $this->authorizeTrip($trip);

        return view('trips.edit', compact('trip'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, Trip $trip)
    {
        $this->authorizeTrip($trip);

        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'destination'=> 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $trip->update($validated);

        return redirect()->route('trips.show', $trip)
            ->with('success', '旅行プランを更新しました');
    }

    /**
     * 削除処理
     */
    public function destroy(Trip $trip)
    {
        $this->authorizeTrip($trip);

        $trip->delete();

        return redirect()->route('trips.index')
            ->with('success', '旅行プランを削除しました');
    }

    /**
     * 自分の旅行プランかどうかをチェック(簡易的な認可)
     */
    private function authorizeTrip(Trip $trip)
    {
        abort_if($trip->user_id !== auth()->id(), 403);
    }
}
