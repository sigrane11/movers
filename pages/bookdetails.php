<?php
session_start();
include '../layout/adminLayout.php';

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: http://localhost/movers/pages/login.php'); // Redirect to login page if not logged in
    exit();
}

// Define access control for roles
$role_permissions = [
    'admin' => ['/movers/pages/bookdetails.php'],
];

// Get user role
$user_role = strtolower($_SESSION['role_name'] ?? '');

// Get the current script path
$current_page = $_SERVER['SCRIPT_NAME'];

// Check if the user has permission
$allowed_pages = $role_permissions[$user_role] ?? [];

if (!in_array($current_page, $allowed_pages)) {
    session_destroy();
    header('Location: http://localhost/movers/pages/login.php'); // Redirect to login
    exit();
}

$dashboardContent = '
<main class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold text-gray-800">Shipping</h1>
    <ul class="flex space-x-2 text-gray-600 mt-4">
        <li><a href="admindashboard.php" class="text-gray-800">Home</a></li>
        <li>/</li>
        <li><a href="#" class="text-blue-600 font-semibold">Order Details</a></li>
    </ul>

    
    <div class="mt-6 bg-white shadow-md p-4 rounded-lg">
        <h3 class="text-lg font-semibold">Order Details</h3>
        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Order ID</th>
                    <th class="border p-2">Order Type</th>
                    <th class="border p-2">Pickup Location</th>
                    <th class="border p-2">Dropoff Location</th>
                    <th class="border p-2">Shipping Date & Time</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Order details dynamically inserted here -->
            </tbody>
        </table>
    </div>
    
    <div class="mt-6 bg-white shadow-md p-4 rounded-lg">
        <h3 class="text-lg font-semibold">Recent Shipments</h3>
        <input type="text" id="shipmentSearch" placeholder="Search recent shipments..." class="w-full p-2 border border-gray-300 rounded mt-2" onkeyup="searchShipments()" />
        
        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Shipment ID</th>
                    <th class="border p-2">Shipment Date</th>
                    <th class="border p-2">Shipment Status</th>
                    <th class="border p-2">Destination</th>
                    <th class="border p-2">Tracking Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-2">#S123</td>
                    <td class="border p-2">2024-11-28</td>
                    <td class="border p-2">Shipped</td>
                    <td class="border p-2">Bulacan</td>
                    <td class="border p-2">TN987654321</td>
                </tr>
                <tr>
                    <td class="border p-2">#S124</td>
                    <td class="border p-2">2024-11-29</td>
                    <td class="border p-2">Delivered</td>
                    <td class="border p-2">Quezon City</td>
                    <td class="border p-2">TN987654322</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<script src="script.js"></script>
<script src="book.js"></script>
';

adminLayout($dashboardContent);
?>
