<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected const GAMBLING_LATITUDE = 53.3340285;
    protected const GAMBLING_LONGITUDE = -6.2535495;

    public function displayAffiliates()
    {
        $earthRadius = 6371;
        $affiliates = Affiliate::all();

        $results = collect([]);

        foreach ($affiliates as $affiliate) {

            $lat1 = deg2rad(self::GAMBLING_LATITUDE);
            $lon1 = deg2rad(self::GAMBLING_LONGITUDE);
            $lat2 = deg2rad($affiliate->latitude);
            $lon2 = deg2rad($affiliate->longitude);

            $dLat = $lat2 - $lat1;
            $dLon = $lon2 - $lon1;

            // Haversine formula
            $a = sin($dLat / 2) * sin($dLat / 2) +
                cos($lat1) * cos($lat2) *
                sin($dLon / 2) * sin($dLon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

            // Distance in kilometers
            $distance = $earthRadius * $c;

            if ($distance < 100) {
                $results->push([
                    'affiliate_id' => $affiliate->affiliate_id,
                    'name' => $affiliate->name,
                    'distance' => $distance
                ]);
            }
        }
        $sortedResults = $results->sortBy('affiliate_id')->values()->all();




        return Inertia::render('affiliates', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'sortedResults' => $sortedResults
        ]);
    }

    public function uploadData()
    {

    }
}
