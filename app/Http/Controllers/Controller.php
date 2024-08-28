<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Affiliate;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function displayAffiliates()
    {
        $earthRadius = 6371;
        $affiliates = Affiliate::all();

        $results = collect([]);

        foreach ($affiliates as $affiliate) {

            $lat1 = deg2rad(Constants::GAMBLING_LATITUDE);
            $lon1 = deg2rad(Constants::GAMBLING_LONGITUDE);
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

        return Inertia::render('Affiliates', [
            'sortedResults' => $sortedResults
        ]);
    }

    public function uploadData()
    {

    }
}
