<?php
session_start();
include("db_connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="anrep.css">
	<title>Dashboard Analysis</title>
	<!-- <link rel="icon" href="move.jpg"> -->
</head>
<body>
	
<!-- SIDEBAR -->
	<section id="sidebar">
		<div class="brand">
			<a href="admindashboard.php"><img src="mover.jpg"></a>
		 </div> 
		<ul class="side-menu">
			<li><a href="admindashboard.php" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a href="#"><i class='bx bxs-package icon' ></i> Shipping <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="bookdetails.html">Order Details</a></li>
					<li><a href="routes.html">Carriers Selection</a></li>
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
			<!-- <li>
				<a href="#"><i class='bx bx-folder icon' ></i> Analytics & Reporting <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="anrep.html">Data Analysis</a></li>
				</ul>
			</li> -->
        </ul>
    </section>
<!-- SIDEBAR -->

<!-- NAVBAR -->
<section id="content">
    <nav>
        <i class='bx bx-menu toggle-sidebar'></i>
        <form action="#"></form>
        
        <!-- Notification Icon -->
        <a href="#" class="nav-link" id="notification-btn">
            <i class='bx bx-bell icon'></i>
            <span class="badge" id="notification-count">1</span>
        </a>
        
        <span class="divider"></span>
        
        <!-- Notification Dropdown -->
        <div class="notification-dropdown" id="notification-dropdown">
            <ul>
                <li><a href="bookdetails.html">New trip request from Moris</a></li>
                <li><a href="shipments.html">Tracking update: Ride in progress</a></li>
                <li><a href="#">System update available</a></li>
            </ul>
        </div>

        <div class="profile">
            <img src="marky.jpg" alt="">
            <ul class="profile-link">
                <li><a href="settings.html"><i class='bx bxs-user'></i> Profile</a></li>
                <li><a href="index.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
            </ul>
        </div>
    </nav>
<!-- NAVBAR -->

<!-- MAIN -->
		<main>
			<h1 class="title">Welcome Admin!</h1>
			<ul class="breadcrumbs">
				<li><a href="admindashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard / Analytics & Reporting</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2>Total Shipments</h2>
							<p>1540</p>
						</div>
						<i class='bx bx-caret-up-circle icon' ></i>
					</div>
					<span class="progress" data-value="60%"></span>
					<span class="label">60%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>Total Vehicles</h2>
							<p>758</p>
						</div>
						<i class='bx bx-caret-up-circle icon' ></i>
					</div>
					<span class="progress" data-value="70%"></span>
					<span class="label">70%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>Total Maintenance</h2>
							<p>209</p>
						</div>
						<i class='bx bx-caret-up-circle icon' ></i>
					</div>
					<span class="progress" data-value="40%"></span>
					<span class="label">40%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>Total Deliveries</h2>
							<p>5,380</p>
						</div>
						<i class='bx bx-caret-up-circle icon' ></i>
					</div>
					<span class="progress" data-value="80%"></span>
					<span class="label">80%</span>
				</div>
			</div>
			<div class="data">
				<div class="content-data">
					<div class="head">
						<h3>Shipments Data</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<div class="chart">
						<div id="chart"></div>
					</div>
				</div>
				<div class="content-data">
					<div class="head">
						<h3>Fleet Maintenance Data</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<div class="chart1">
						<div id="chart1"></div>
					</div>
				</div>
				<div class="content-data">
					<div class="head">
						<h3>Delivery Fleet Performance</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<div class="chart2">
						<div id="chart2"></div>
					</div>
				</div>
				<div class="content-data">
					<div class="head">
						<h3>Data Analysis</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<div class="chart3">
						<div id="chart3"></div>
					</div>
				</div>
			</div>
			  <div class="container">
				<!-- Shipment Data -->
				<section id="shipment-data">
				  <h2>Shipment Data</h2>
				  <table>
					<tr><th>Metric</th><th>Value</th></tr>
					<tr><td>Total Shipments Completed</td><td>1,250 (Monthly)</td></tr>
					<tr><td>On-Time Deliveries</td><td>1,175 (94%)</td></tr>
					<tr><td>Delayed Deliveries</td><td>75 (6%)</td></tr>
					<tr><td>Average Delivery Time</td><td>2.5 days per shipment</td></tr>
					<tr><td>Top Shipment Routes</td><td>Manila to Cebu: 320<br>Davao to Manila: 250<br>Pampanga to Quezon City: 180</td></tr>
				  </table>
				</section>
			  </div>
			   <div class="container">
				<!-- Fleet Maintenance Data -->
				<section id="fleet-maintenance">
				  <h2>Fleet Maintenance Data</h2>
				  <table>
					<tr><th>Metric</th><th>Value</th></tr>
					<tr><td>Vehicles Under Maintenance</td><td>12 out of 50 (24%)</td></tr>
					<tr><td>Average Maintenance Cost (Monthly)</td><td>PHP 85,000</td></tr>
					<tr><td>Scheduled Maintenance Compliance</td><td>90% (45 of 50 vehicles)</td></tr>
					<tr><td>Average Vehicle Downtime</td><td>3.2 days per vehicle</td></tr>
					<tr><td>Most Repaired Vehicles</td><td>LOG-V004: 4 repairs in 6 months<br>LOG-V002: 3 repairs in 6 months</td></tr>
				  </table>
				</section>
			</div>
			<div class="container">
				<!-- Warehouse Utilization Data -->
				<section id="warehouse-utilization">
					<h2>Warehouse Utilization Data</h2>
					<table>
					  <tr><th>Metric</th><th>Value</th></tr>
					  <tr><td>Average Occupancy Rate (Monthly)</td><td>85%</td></tr>
					  <tr><td>Storage Capacity Used</td>
						<td>
						  Davao Warehouse: 92%<br>
						  Metro Manila Depot: 78%<br>
						  Cebu Branch Office: 85%
						</td>
					  </tr>
					  <tr><td>Inbound Shipments Processed</td><td>450 (Monthly)</td></tr>
					  <tr><td>Outbound Shipments Processed</td><td>500 (Monthly)</td></tr>
					  <tr><td>Top Items Stored</td>
						<td>
						  Consumer Electronics: 35%<br>
						  Food Products: 25%<br>
						  Textiles: 20%
						</td>
					  </tr>
					</table>
				  </section>
		    	</div>  
			    <div class="container">
				  <!-- Delivery Fleet Performance -->
				  <section id="delivery-fleet-performance">
					<h2>Delivery Fleet Performance</h2>
					<table>
					  <tr><th>Metric</th><th>Value</th></tr>
					  <tr><td>Fuel Efficiency (Fleet Average)</td><td>8.5 km/L</td></tr>
					  <tr><td>Longest Trip Completed</td><td>1,250 km (Manila to Cagayan de Oro)</td></tr>
					  <tr><td>Driver Performance</td>
						<td>
						  Top Driver: John Doe (98% on-time deliveries)<br>
						  Driver with Most Deliveries: Jane Smith (150 deliveries this month)
						</td>
					  </tr>
					  <tr><td>Average Trip Distance</td><td>150 km per trip</td></tr>
					  <tr><td>Fuel Cost (Monthly)</td><td>PHP 320,000</td></tr>
					</table>
				  </section>
				</div> 
			    <div class="container">
				  <!-- Customer Satisfaction -->
				  <section id="customer-satisfaction">
					<h2>Customer Satisfaction</h2>
					<table>
					  <tr><th>Metric</th><th>Value</th></tr>
					  <tr><td>Customer Satisfaction Score (CSS)</td><td>4.8/5</td></tr>
					  <tr><td>Complaints Resolved</td><td>96% (48 of 50)</td></tr>
					  <tr><td>Top Complaints</td>
						<td>
						  Late Deliveries: 30%<br>
						  Damaged Items: 15%
						</td>
					  </tr>
					  <tr><td>Repeat Customers</td><td>85%</td></tr>
					  <tr><td>Positive Feedback on Service</td><td>92%</td></tr>
					</table>
				  </section>
			     </div>  
                <div class="container">
				  <!-- Asset Analytics -->
				  <section id="asset-analytics">
					<h2>Asset Analytics</h2>
					<table>
					  <tr><th>Metric</th><th>Value</th></tr>
					  <tr><td>Active Assets (Operational)</td><td>95 out of 100</td></tr>
					  <tr><td>Retired Assets</td><td>5 (Last 12 months)</td></tr>
					  <tr><td>Average Asset Age</td><td>3.5 years</td></tr>
					  <tr><td>Depreciation Cost (Monthly)</td><td>PHP 450,000</td></tr>
					  <tr><td>Top Used Equipment</td>
						<td>
						  Forklifts: 95% utilization<br>
						  Pallet Jacks: 88% utilization
						</td>
					  </tr>
					</table>
				  </section>
				</div> 
			
				<!-- Additional sections for other data types -->
				<!-- Add similar sections here for Warehouse Utilization, Delivery Fleet Performance, etc. -->
			  </div>
				<div class="footer">
					&copy; 2024 Analytics Dashboard. All Rights Reserved.
				</div>
		</main>
<!-- MAIN -->
	</section>
<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>