<?php

namespace Database\Seeders;

use App\Models\Affiliate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class AffiliateSeeder extends Seeder
{
    public const FILE_PATH = 'public/affiliates.txt';

    public function run()
    {
        $fileContent = Storage::get(self::FILE_PATH);
        $lines = explode("\n", $fileContent);

        foreach ($lines as $line)
        {
            $affiliateData = json_decode($line, true);

            $affiliate = new Affiliate([
                'name' => $affiliateData['name'],
                'affiliate_id' => $affiliateData['affiliate_id'],
                'latitude' => $affiliateData['latitude'],
                'longitude' => $affiliateData['longitude']

            ]);
            $affiliate->save();
        }
    }
}
