<?php

require 'db.php'; // Ensure this file contains your DB connection

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $plate_number = $data['plate_number'];
    $brand = $data['brand'];
    $model = $data['model'];
    $year = $data['year'];
    $depreciation_value = $data['depreciation_value'];
    $vin = $data['vehicle_identification_number'];
    $condition = $data['vehicle_condition'];
    $status = $data['status'];

    $stmt = $conn->prepare("INSERT INTO vehicles (plate_number, brand, model, year, depreciation_value, vehicle_identification_number, vehicle_condition, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissss", $plate_number, $brand, $model, $year, $depreciation_value, $vin, $condition, $status);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Vehicle added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add vehicle"]);
    }
} elseif ($method == 'GET') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $conn->prepare("SELECT * FROM vehicles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $vehicle = $result->fetch_assoc();
        echo json_encode($vehicle ?: ["error" => "Vehicle not found"]);
    } else {
        $result = $conn->query("SELECT * FROM vehicles");
        $vehicles = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($vehicles);
    }
} elseif ($method == 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id = isset($_GET['id']) ? intval($_GET['id']) : $data['id'];
    $plate_number = $data['plate_number'];
    $brand = $data['brand'];
    $model = $data['model'];
    $year = $data['year'];
    $depreciation_value = $data['depreciation_value'];
    $vin = $data['vehicle_identification_number'];
    $condition = $data['vehicle_condition'];
    $status = $data['status'];

    $stmt = $conn->prepare("UPDATE vehicles SET plate_number=?, brand=?, model=?, year=?, depreciation_value=?, vehicle_identification_number=?, vehicle_condition=?, status=? WHERE id=?");
    $stmt->bind_param("sssissssi", $plate_number, $brand, $model, $year, $depreciation_value, $vin, $condition, $status, $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Vehicle updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update vehicle"]);
    }
} elseif ($method == 'DELETE') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM vehicles WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Vehicle deleted successfully"]);
        } else {
            echo json_encode(["error" => "Failed to delete vehicle"]);
        }
    } else {
        echo json_encode(["error" => "Vehicle ID is required"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$conn->close();
