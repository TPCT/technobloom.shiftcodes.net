<?php

function getCities($countryCode) {
    $username = 'your_geonames_username'; // Register at geonames.org and get a username
    $url = "http://api.geonames.org/searchJSON?country=$countryCode&featureClass=P&maxRows=1000&lang=ar&username=$username";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    $cities = [];
    if (isset($data['geonames'])) {
        foreach ($data['geonames'] as $city) {
            $cities[] = [
                'en' => $city['name'],
                'ar' => $city['toponymName'] ?? $city['name']
            ];
        }
    }

    return $cities;
}

// Example: Fetch cities for Egypt
$cities = getCities('LBN');
var_dump($cities);
?>