// Sample orders to be added initially
const orders = [
  {
      orderId: "ORD12345",
      orderType: "Asset delivery",
      pickupLocation: "Bulacan Branch",
      dropoffLocation: "Quezon city branch",
      shippingDateTime: "2024-12-01 10:00",
      status: "Pending"
  },
  {
    orderId: "ORD12346",
    orderType: "Business shipment",
    pickupLocation: "Cavite branch",
    dropoffLocation: "Bulacan Branch",
    shippingDateTime: "2024-15-02 15:30",
    status: "Pending"
},
{
  orderId: "ORD12346",
  orderType: "Goods Transport",
  pickupLocation: "Quezon City branch",
  dropoffLocation: "Cavite Branch",
  shippingDateTime: "2024-11-02 15:30",
  status: "Pending"
},
{
  orderId: "ORD12346",
  orderType: "Asset delivery",
  pickupLocation: "Cavite branch",
  dropoffLocation: "Bulacan Branch",
  shippingDateTime: "2024-19-02 15:30",
  status: "Pending"
},
  {
      orderId: "ORD12346",
      orderType: "Goods Transport",
      pickupLocation: "Cavite branch",
      dropoffLocation: "Bulacan Branch",
      shippingDateTime: "2024-13-02 15:30",
      status: "Pending"
  }
  
];

// Function to display orders in the table
function displayOrders() {
  const tableBody = document.querySelector("#orderTable tbody");
  tableBody.innerHTML = ""; // Clear existing table rows

  orders.forEach(order => {
      const row = document.createElement("tr");
      
      const cell1 = document.createElement("td");
      cell1.textContent = order.orderId;
      row.appendChild(cell1);

      const cell2 = document.createElement("td");
      cell2.textContent = order.orderType;
      row.appendChild(cell2);

      const cell3 = document.createElement("td");
      cell3.textContent = order.pickupLocation;
      row.appendChild(cell3);

      const cell4 = document.createElement("td");
      cell4.textContent = order.dropoffLocation;
      row.appendChild(cell4);

      const cell5 = document.createElement("td");
      cell5.textContent = order.shippingDateTime;
      row.appendChild(cell5);

      const cell6 = document.createElement("td");
      cell6.textContent = order.status;
      row.appendChild(cell6);

      const cell7 = document.createElement("td");
      const confirmBtn = document.createElement("button");
      confirmBtn.textContent = "Confirm";
      confirmBtn.classList.add("confirm-btn");
      confirmBtn.onclick = () => confirmOrder(order.orderId);
      cell7.appendChild(confirmBtn);
      row.appendChild(cell7);

      tableBody.appendChild(row);
  });
}

// // Function to add a new order
// function addOrder() {
//   const newOrder = {
//       orderId: `ORD${Math.floor(Math.random() * 100000)}`, // Generate a random order ID
//       orderType: prompt("Enter Order Type (Standard/Express):"),
//       pickupLocation: prompt("Enter Pickup Location:"),
//       dropoffLocation: prompt("Enter Dropoff Location:"),
//       shippingDateTime: prompt("Enter Shipping Date and Time (YYYY-MM-DD HH:MM):"),
//       status: "Pending"
//   };

//   // Add the new order to the orders array
//   orders.push(newOrder);

//   // Display updated orders in the table
//   displayOrders();
// }

// Function to confirm an order
function confirmOrder(orderId) {
  const order = orders.find(order => order.orderId === orderId);
  if (order) {
      order.status = "Confirmed"; // Change order status to "Confirmed"
      displayOrders(); // Re-render the table to show the updated status
  }
}

// Initially display orders
displayOrders();

function searchShipments() {
    var input = document.getElementById('shipmentSearch');
    var filter = input.value.toLowerCase();
    var table = document.getElementById('recent-shipments-list');
    var rows = table.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName('td');
      var match = false;
      
      // Loop through each cell in the row to check if the value matches search term
      for (var j = 0; j < cells.length; j++) {
        var cell = cells[j];
        if (cell) {
          if (cell.innerText.toLowerCase().indexOf(filter) > -1) {
            match = true;
          }
        }
      }
      
      // Show or hide rows based on search match
      if (match) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }
