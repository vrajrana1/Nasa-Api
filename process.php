<?php
require_once __DIR__ . '/vendor/autoload.php';

$fData = getPostData();

    $req = [
      'api' => 'https://api.nasa.gov/neo/rest/v1/feed',
      'params' => [
        'start_date' => $fData['start_date'],
        'end_date' => $fData['end_date'],
        'api_key' => 'hrc3atoJeFtediaxpgh7I4Jh7fp7H3SuHkANxUTJ'
      ]
    ];

    $data = json_decode((string) (new GuzzleHttp\Client())->get($req['api'] . '?' . http_build_query($req['params']))->getBody(), true);

    $speed = [];
    $distance = [];
    $minSize = [];
    $maxSize = [];

    foreach ($data['near_earth_objects'] as $astros) {
        foreach ($astros as $astro) {
            $speed[] = [
              'id' => $astro['id'],
              'name' => $astro['name'],
              'speed' => $astro['close_approach_data'][0]['relative_velocity']['kilometers_per_hour']
            ];

            $distance[] = [
              'id' => $astro['id'],
              'name' => $astro['name'],
              'distance' => $astro['close_approach_data'][0]['miss_distance']['kilometers']
            ];

            $minSize[] = [
              'id' => $astro['id'],
              'name' => $astro['name'],
              'minSize' => $astro['estimated_diameter']['kilometers']['estimated_diameter_min']
            ];

            $maxSize[] = [
              'id' => $astro['id'],
              'name' => $astro['name'],
              'maxSize' => $astro['estimated_diameter']['kilometers']['estimated_diameter_max']
            ];
        }
    }

$fastestAsteroid = getSubArrWithMinOrMaxVal($speed, 'speed', 'max');
$nearestAsteroid = getSubArrWithMinOrMaxVal($distance, 'distance', 'min');
$smallestAsteroid = getSubArrWithMinOrMaxVal($minSize, 'minSize', 'min');
$largestAsteroid = getSubArrWithMinOrMaxVal($maxSize, 'maxSize', 'max');

//dd($fastestAsteroid, $nearestAsteroid, $smallestAsteroid, $largestAsteroid);

return [
    'fastest' => $fastestAsteroid,
    'nearest' => $nearestAsteroid,
    'smallest'=> $smallestAsteroid,
    'largest'=> $largestAsteroid
];