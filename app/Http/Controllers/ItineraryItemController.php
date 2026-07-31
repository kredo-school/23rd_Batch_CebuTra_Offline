<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItineraryItemController extends Controller
{
    /**
     * 一覧表示(特定tripに紐づくitinerary_items)
     */
    public function index(Trip $trip)
    {
        $this->authorizeTrip($trip);

        $items = $trip->itineraryItems()->orderBy('date')->get();

        return view('itinerary_items.index', compact('trip', 'items'));
    }

    /**
     * 新規作成フォーム表示
     */
    public function create(Trip $trip)
    {
        $this->authorizeTrip($trip);

        return view('itinerary_items.create', compact('trip'));
    }

    /**
     * 新規登録処理
     */
    public function store(Request $request, Trip $trip)
    {
        $this->authorizeTrip($trip);

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'date'    => 'required|date',
            'memo'    => 'nullable|string',
            //カラムに合わせて調整要
        ]);

        $trip->itineraryItems()->create($validated);

        return redirect()->route('trips.show', $trip)
            ->with('success', '行程を追加しました');
    }

    /**
     * 詳細表示
     */
    public function show(Trip $trip, ItineraryItem $itineraryItem)
    {
        $this->authorizeTrip($trip);

        return view('itinerary_items.show', compact('trip', 'itineraryItem'));
    }

    /**
     * 編集フォーム表示
     */
    public function edit(Trip $trip, ItineraryItem $itineraryItem)
    {
        $this->authorizeTrip($trip);

        return view('itinerary_items.edit', compact('trip', 'itineraryItem'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, Trip $trip, ItineraryItem $itineraryItem)
    {
        $this->authorizeTrip($trip);

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'date'    => 'required|date',
            'memo'    => 'nullable|string',
        ]);

        $itineraryItem->update($validated);

        return redirect()->route('trips.show', $trip)
            ->with('success', '行程を更新しました');
    }

    /**
     * 削除処理
     */
    public function destroy(Trip $trip, ItineraryItem $itineraryItem)
    {
        $this->authorizeTrip($trip);

        $itineraryItem->delete();

        return redirect()->route('trips.show', $trip)
            ->with('success', '行程を削除しました');
    }

    /**
     * 自分の旅行プランに属するitinerary_itemかどうかをチェック
     */
    private function authorizeTrip(Trip $trip)
    {
        abort_if($trip->user_id !== auth()->id(), 403);
    }

}


