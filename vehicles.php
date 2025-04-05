<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="asset.css">
    <title>Assets</title>
</head>
<body>
    <section id="sidebar">
        <div class="brand">
            <a href="admindashboard.php"><img src="mover.jpg" alt="Logo"></a>
         </div> 
        <ul class="side-menu">
            <li><a href="admindashboard.php" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li>
                <a href="#"><i class='bx bxs-package icon' ></i> Shipping <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="bookdetails.html">Order Details</a></li>
					<li><a href="routes.html">Routes Selection</a></li>
                </ul>
            </li>          
            <li>
                <a href="#"><i class='bx bx-current-location icon' ></i> Tracking <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="tracking.html">GPS Tracking</a></li>                  
                </ul>
            </li>
            <li>
				<a href="#"><i class='bx bx-cog icon' ></i> Asset Management <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="vehicles.php">Vehicles</a></li>
                    <li><a href="consumable.php">Consumable Asset</a></li>
                    <li><a href="lands.php">Land properties</a></li>
				</ul>
			</li>
        </ul>
    </section>

    <!-- CONTENT -->
    <section id="content">
        <nav>
            <i class='bx bx-home toggle-sidebar'></i>
             <form action="#">
                <!-- <div class="form-group">
                    <input type="text" placeholder="Search for something">
                    <i class='bx bx-search icon'></i>
                </div> -->
            </form> 
             <!-- Notification Icon -->
        <a href="#" class="nav-link" id="notification-btn">
            <i class='bx bx-bell icon'></i>
            <span class="badge" id="notification-count">1</span>
        </a>
        
        <span class="divider"></span>
        
        <!-- Notification Dropdown -->
        <div class="notification-dropdown" id="notification-dropdown">
            <ul>
                <li><a href="bookdetails.html">New Order</a></li>
                <li><a href="shipments.html">Tracking update: Ride in progress</a></li>
                <li><a href="#">System update available</a></li>
            </ul>
        </div>
            <span class="divider"></span>
            <div class="profile">
                <img src="marky.jpg" alt="Profile">
                <ul class="profile-link">
                    <li><a href="settings.html"><i class='bx bxs-user'></i> Profile</a></li>
                    <li><a href="index.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>

        <main>     
            <h1 class="title">Asset Management</h1>
            <ul class="breadcrumbs">
                <li><a href="admindashboard.php">Home</a></li>
                <li class="divider">/</li>
                <li><a href="asset.php" class="active">Asset Dashboard</a></li>
            </ul>
			<br>
         <br>     
         <br>
           <div class="container">
            <h1>Asset Administration</h1>
            <div class="actions">
                    <button id="addAssetBtn">Add Asset</button>
                    <input type="text" id="searchInput" placeholder="Search Assets..." />
                    <select id="filterStatus">
                        <option value="">All Status</option>
                        <option value="Pending">Pending </option>
                        <option value="Approved">Approved </option>
                        <option value="Rejected">Rejected </option>
                    </select>
                </div>
                <table id="assetTable" style="width: 5px;">
    <thead>
        <tr>
            <th>Vehicle ID</th>
            <th>Plate Number</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Depreciation Value</th>
            <th>VIN</th>
            <th>Condition</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="assetTableBody"></tbody>
</table>
            <div id="assetForm" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2 id="formTitle">Add Vehicle</h2>
                    <form id="form">
                        <input type="text" id="plateNumber" placeholder="Plate Number" required />
                        <input type="text" id="brand" placeholder="Brand" required />
                        <input type="text" id="model" placeholder="Model" required />
                        <input type="number" id="year" placeholder="Year" required min="1900" />
                        <input type="text" id="depreciationValue" placeholder="Depreciation Value" required />
                        <input type="text" id="vehicleIdentificationNumber" placeholder="VIN" required />
                        <input type="text" id="condition" placeholder="Condition" required />
                        <select id="condition" required>
                            <option value="" disabled selected>Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved </option>
                            <option value="rejected">Rejected </option>
                        </select>
                        <button type="submit">Submit</button>
                        <div id="message" style="display: none;"></div>
                    </form>
                </div>
            </div>
            
        </main>
    </section>

    <script src="script.js"></script>
    <script src="asset.js"></script>


    <script>
    document.getElementById('form').addEventListener('submit', async function(event) {
        event.preventDefault();

        const vehicleData = {
            plate_number: document.getElementById('plateNumber').value,
            brand: document.getElementById('brand').value,
            model: document.getElementById('model').value,
            year: parseInt(document.getElementById('year').value),
            depreciation_value: document.getElementById('depreciationValue').value,
            vehicle_identification_number: document.getElementById('vehicleIdentificationNumber').value,
            vehicle_condition: document.getElementById('condition').value,
            status: document.getElementById('condition').value
        };

        try {
            const response = await fetch('http://localhost/movers/api/vehicleApi.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(vehicleData)
            });

            const result = await response.json();
            const messageDiv = document.getElementById('message');
            messageDiv.style.display = 'block';
            messageDiv.textContent = result.message || result.error;
        } catch (error) {
            console.error('Error:', error);
        }
    });


   // Ensure DOM is loaded before interacting with it
document.addEventListener('DOMContentLoaded', () => {
    const assetTableBody = document.getElementById('assetTableBody');

    // Fetch all vehicles and display them
    function fetchVehicles() {
        fetch('http://localhost/movers/api/vehicleApi.php')
            .then(response => response.json())
            .then(data => {
                assetTableBody.innerHTML = '';
                data.forEach(vehicle => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${vehicle.id}</td>
                        <td>${vehicle.plate_number}</td>
                        <td>${vehicle.brand}</td>
                        <td>${vehicle.model}</td>
                        <td>${vehicle.year}</td>
                        <td>${vehicle.depreciation_value}</td>
                        <td>${vehicle.vehicle_identification_number}</td>
                        <td>${vehicle.vehicle_condition}</td>
                        <td>
                            <button onclick="updateVehicle(${vehicle.id})">✏️</button>
                            <button onclick="deleteVehicle(${vehicle.id})">🗑️</button>
                        </td>
                    `;
                    assetTableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching vehicles:', error));
    }

    fetchVehicles(); // Initial fetch when page loads
});

// Create and inject the modal into the DOM
document.addEventListener('DOMContentLoaded', () => {
    const assetTableBody = document.getElementById('assetTableBody');

    // Inject modal HTML
    document.body.insertAdjacentHTML('beforeend', `
        <div id="editModal" class="modal" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); z-index: 999;">
            <div class="modal-content" style="background: white; padding: 20px; margin: 10% auto; width: 90%; max-width: 600px; border-radius: 10px;">
                <h2>Edit Vehicle</h2>
                <form id="editForm">
                    <label>Plate Number: <input type="text" id="plate_number" required></label><br><br>
                    <label>Brand: <input type="text" id="brand" required></label><br><br>
                    <label>Model: <input type="text" id="model" required></label><br><br>
                    <label>Year: <input type="number" id="year" required></label><br><br>
                    <label>Depreciation Value: <input type="text" id="depreciation_value" required></label><br><br>
                    <label>VIN: <input type="text" id="vehicle_identification_number" required></label><br><br>
                    <label>Condition: <input type="text" id="vehicle_condition" required></label><br><br>
                    <label>Status: 
                        <select id="status" required>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </label><br><br>
                    <button type="submit">Save Changes</button>
                    <button type="button" onclick="closeModal()">Cancel</button>
                </form>
            </div>
        </div>
    `);

    // Fetch all vehicles and display them
    function fetchVehicles() {
        fetch('http://localhost/movers/api/vehicleApi.php')
            .then(response => response.json())
            .then(data => {
                assetTableBody.innerHTML = '';
                data.forEach(vehicle => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${vehicle.id}</td>
                        <td>${vehicle.plate_number}</td>
                        <td>${vehicle.brand}</td>
                        <td>${vehicle.model}</td>
                        <td>${vehicle.year}</td>
                        <td>${vehicle.depreciation_value}</td>
                        <td>${vehicle.vehicle_identification_number}</td>
                        <td>${vehicle.vehicle_condition}</td>
                        <td>
                            <button onclick="openModal(${vehicle.id})">✏️</button>
                            <button onclick="deleteVehicle(${vehicle.id})">🗑️</button>
                        </td>
                    `;
                    assetTableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching vehicles:', error));
    }

    // Open the modal with vehicle data
    function openModal(id) {
        fetch(`http://localhost/movers/api/vehicleApi.php?id=${id}`)
            .then(response => response.json())
            .then(vehicle => {
                // Populate form with vehicle data
                document.getElementById('plate_number').value = vehicle.plate_number;
                document.getElementById('brand').value = vehicle.brand;
                document.getElementById('model').value = vehicle.model;
                document.getElementById('year').value = vehicle.year;
                document.getElementById('depreciation_value').value = vehicle.depreciation_value;
                document.getElementById('vehicle_identification_number').value = vehicle.vehicle_identification_number;
                document.getElementById('vehicle_condition').value = vehicle.vehicle_condition;
                document.getElementById('status').value = vehicle.status;

                // Show the modal
                const modal = document.getElementById('editModal');
                modal.style.display = 'block';

                // Handle form submission
                document.getElementById('editForm').onsubmit = (e) => {
                    e.preventDefault();
                    updateVehicle(id);
                };
            })
            .catch(error => console.error('Error fetching vehicle:', error));
    }

    // Close the modal
    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    // Update vehicle function
    function updateVehicle(id) {
        const updatedData = {
            plate_number: document.getElementById('plate_number').value,
            brand: document.getElementById('brand').value,
            model: document.getElementById('model').value,
            year: document.getElementById('year').value,
            depreciation_value: document.getElementById('depreciation_value').value,
            vehicle_identification_number: document.getElementById('vehicle_identification_number').value,
            vehicle_condition: document.getElementById('vehicle_condition').value,
            status: document.getElementById('status').value
        };

        fetch(`http://localhost/movers/api/vehicleApi.php?id=${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(updatedData)
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message || data.error);
            closeModal();
            fetchVehicles(); // Refresh the table
        })
        .catch(error => console.error('Error updating vehicle:', error));
    }

    // Delete a vehicle
    function deleteVehicle(id) {
        if (confirm('Are you sure you want to delete this vehicle?')) {
            fetch(`http://localhost/movers/api/vehicleApi.php?id=${id}`, {
                method: 'DELETE'
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message || data.error);
                fetchVehicles();
            })
            .catch(error => console.error('Error deleting vehicle:', error));
        }
    }

    // Initialize
    fetchVehicles();
});

</script>
</body>
</html>
