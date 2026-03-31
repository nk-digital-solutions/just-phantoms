<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

// Your Google Places API key
$api_key = 'AIzaSyCVxEnH2y-zmEp7bnvb5biffCZhiYDSDhM';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';
    
    switch ($action) {
        case 'find_place':
            $query = urlencode($_GET['query'] ?? 'Just Phantoms Limited');
            $url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input={$query}&inputtype=textquery&fields=place_id,name,rating,user_ratings_total&key={$api_key}";
            break;
            
        case 'place_details':
            $place_id = $_GET['place_id'] ?? '';
            if (empty($place_id)) {
                http_response_code(400);
                echo json_encode(['error' => 'Place ID is required']);
                exit;
            }
            $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$place_id}&fields=name,rating,user_ratings_total,reviews&key={$api_key}";
            break;
            
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
            exit;
    }
    
    // Make the API request
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: Just Phantoms Website'
        ]
    ]);
    
    $response = file_get_contents($url, false, $context);
    
    if ($response === false) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to fetch data from Google Places API']);
        exit;
    }
    
    // Return the response
    echo $response;
    
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>