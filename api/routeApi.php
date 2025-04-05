<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once 'db.php'; // Include the database connection

// Handling API requests
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        createRoute($conn);
        break;
    case 'GET':
        if (isset($_GET['trackingNumber'])) {
            getRoute($conn, $_GET['trackingNumber']);
        } else {
            getAllRoutes($conn);
        }
        break;
    default:
        echo json_encode(["error" => "Invalid request"]);
        break;
}

// ✅ Create a new route with auto-generated tracking number
function createRoute($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['pickup_location'], $data['dropoff_location'], 
                $data['start_lat'], $data['start_lng'], $data['end_lat'], $data['end_lng'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Generate unique tracking number
    $tracking_number = "TRK" . time() . rand(100, 999);

    $stmt = $conn->prepare("INSERT INTO routes (tracking_number, pickup_location, dropoff_location, start_lat, start_lng, end_lat, end_lng) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssddd", $tracking_number, $data['pickup_location'], $data['dropoff_location'], 
                      $data['start_lat'], $data['start_lng'], $data['end_lat'], $data['end_lng']);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Route added", "tracking_number" => $tracking_number]);
    } else {
        echo json_encode(["error" => "Failed to add route"]);
    }
}

// ✅ Get route by tracking number
function getRoute($conn, $trackingNumber) {
    $stmt = $conn->prepare("SELECT * FROM routes WHERE tracking_number=?");
    $stmt->bind_param("s", $trackingNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($route = $result->fetch_assoc()) {
        $route['pickup'] = [
            "location" => $route['pickup_location'],
            "latitude" => $route['start_lat'],
            "longitude" => $route['start_lng']
        ];
        
        $route['dropoff'] = [
            "location" => $route['dropoff_location'],
            "latitude" => $route['end_lat'],
            "longitude" => $route['end_lng']
        ];

        unset($route['start_lat'], $route['start_lng'], $route['end_lat'], $route['end_lng']);
        echo json_encode(["route" => $route]);
    } else {
        echo json_encode(["error" => "Tracking number not found"]);
    }
}

// ✅ Get all routes
function getAllRoutes($conn) {
    $result = $conn->query("SELECT * FROM routes");
    $routes = [];

    while ($route = $result->fetch_assoc()) {
        $route['pickup'] = [
            "location" => $route['pickup_location'],
            "latitude" => $route['start_lat'],
            "longitude" => $route['start_lng']
        ];
        
        $route['dropoff'] = [
            "location" => $route['dropoff_location'],
            "latitude" => $route['end_lat'],
            "longitude" => $route['end_lng']
        ];

        unset($route['start_lat'], $route['start_lng'], $route['end_lat'], $route['end_lng']);
        $routes[] = $route;
    }

    echo json_encode($routes);
}

$conn->close();
?>
