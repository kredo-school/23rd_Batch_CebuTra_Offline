<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    


    public function index()
    {
            // 💡 リアルタイム天気予報の取得（1時間キャッシュ）
        $weatherData = Cache::remember('cebu_weather_forecast', 3600, function () {
            try {
                $response = Http::timeout(3)->get('https://api.open-meteo.com/v1/forecast', [
                    'latitude'     => 10.3157,
                    'longitude'    => 123.8854,
                    'daily'        => 'weathercode,temperature_2m_max,temperature_2m_min,precipitation_probability_max',
                    'current_weather' => true,
                    'timezone'     => 'Asia/Manila',
                    'forecast_days'=> 5
                ]);
                return $response->successful() ? $response->json() : null;
            } catch (\Exception $e) {
                return null;
            }
        });

        // 💡 言語に応じた曜日名リストの定義
        $locale = app()->getLocale();
        $daysMap = [
            'japanese'    => ['日', '月', '火', '水', '木', '金', '土'],
            'chinese' => ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
            'english'    => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        ];
        $currentDays = $daysMap[$locale] ?? $daysMap['en'];

        $forecasts = [];
        if ($weatherData && isset($weatherData['daily'])) {
            $daily = $weatherData['daily'];
            
            foreach ($daily['time'] as $i => $dateStr) {
                $carbonDate = Carbon::parse($dateStr);
                $code = $daily['weathercode'][$i];

                $forecasts[] = [
                    'date'       => $carbonDate->format('m/d'),
                    'day_name'   => $currentDays[$carbonDate->dayOfWeek],
                    'is_today'   => $carbonDate->isToday(),
                    'temp_max'   => round($daily['temperature_2m_max'][$i]),
                    'temp_min'   => round($daily['temperature_2m_min'][$i]),
                    'pop'        => $daily['precipitation_probability_max'][$i] ?? 10,
                    'condition'  => $this->getCondition($code),
                ];
            }
        }

        return view('home', compact('forecasts'));
    }

    private function getCondition($code)
    {
        if (in_array($code, [0, 1])) {
            return ['key' => 'messages.weather.clear', 'icon' => 'fa-sun text-[#FFB03A]'];
        } elseif (in_array($code, [2, 3])) {
            return ['key' => 'messages.weather.cloudy', 'icon' => 'fa-cloud-sun text-[#FFB03A]'];
        } elseif (in_array($code, [45, 48])) {
            return ['key' => 'messages.weather.cloudy', 'icon' => 'fa-smog text-slate-400'];
        } else {
            return ['key' => 'messages.weather.rain', 'icon' => 'fa-cloud-showers-heavy text-blue-400'];
        }
    }
}

