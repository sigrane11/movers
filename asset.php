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
                    <li><a href="bookdetails.html">Order Processing</a></li>
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
					<li><a href="asset.html">Asset Dashboard</a></li>
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
                    <li><a href="login.html"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>

        <main>     
            <h1 class="title">Asset Management</h1>
            <ul class="breadcrumbs">
                <li><a href="admindashboard.php">Home</a></li>
                <li class="divider">/</li>
                <li><a href="asset.html" class="active">Asset Dashboard</a></li>
            </ul>
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
                <table id="assetTable">
                    <thead>
                        <tr>
                            <th id="vehicleId" class="sortable">Vehicle Id</th>
                            <th id="plateNumberHeader" class="sortable">Plate Number</th>
                            <th id="brandHeader" class="sortable">Brand</th>
                            <th id="modelHeader" class="sortable">Model</th>
                            <th id="yearHeader" class="sortable">Year</th>
                            <th id="depriciationValueHeader" class="sortable">Depreciation Value</th>
                            <th id="vehicleIdentificationNumberHeader" class="sortable">VIN</th>
                            <th id="conditionHeader" class="sortable">Condition</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="assetTableBody"></tbody>
                </table>
            </div>
            <div class="toggle-buttons">
                <button id="showAllBtn">Show All</button>
                <button id="showLessBtn" style="display:none;">Show Less</button>
            </div>
            <div id="assetForm" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2 id="formTitle">Add Vehicle</h2>
                    <form id="form">
                        <input type="text" id="vehicleId" placeholder="Vehicle Id" required />
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
</body>
</html>
