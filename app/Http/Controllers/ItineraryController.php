<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    /**
     * 旅程ストック一覧
     */

   public function index()
    {
        $trips = Trip::with([
                'itineraryItems' => function ($query) {
                    $query->orderBy('day')
                          ->orderBy('sort_order')
                          ->orderBy('time');
                }
            ])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'itineraries.index',
            compact('trips')
        );
    }
    /**
     * 新規旅程作成画面
     */
    public function create()
    {
        return view('itineraries.create');
    }


    /**
     * 旅程を新規保存
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:100',
            ],
        ]);

        $trip = Trip::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'days' => 1,
            'is_public' => false,
        ]);

        return redirect()
            ->route('itineraries.edit', $trip)
            ->with(
                'success',
                '旅程を作成しました。'
            );
    }


    /**
     * 旅程詳細
     */
    public function show(Trip $trip)
    {
        abort_unless(
            $trip->user_id === auth()->id(),
            403
        );

        $trip->load([
            'itineraryItems' => function ($query) {
                $query->orderBy('day')
                      ->orderBy('sort_order')
                      ->orderBy('time');
            }
        ]);

        return view(
            'itineraries.show',
            compact('trip')
        );
    }


    /**
     * 旅程編集画面
     */
    public function edit(Trip $trip)
    {
        abort_unless(
            $trip->user_id === auth()->id(),
            403
        );

        $trip->load([
            'itineraryItems' => function ($query) {
                $query->orderBy('day')
                      ->orderBy('sort_order')
                      ->orderBy('time');
            }
        ]);

        return view(
            'itineraries.edit',
            compact('trip')
        );
    }


    /**
     * 旅程を更新
     */
    public function update(
        Request $request,
        Trip $trip
    ) {
        abort_unless(
            $trip->user_id === auth()->id(),
            403
        );

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:100',
            ],

            'days' => [
                'required',
                'integer',
                'min:1',
                'max:30',
            ],
        ]);

        $trip->update([
            'title' => $validated['title'],
            'days' => $validated['days'],
        ]);

        return redirect()
            ->route('itineraries.edit', $trip)
            ->with(
                'success',
                '旅程を更新しました。'
            );
    }


    /**
     * 旅程を削除
     */
    public function destroy(Trip $trip)
    {
        abort_unless(
            $trip->user_id === auth()->id(),
            403
        );

        $trip->delete();

        return redirect()
            ->route('itineraries.index')
            ->with(
                'success',
                '旅程を削除しました。'
            );
    }
}
