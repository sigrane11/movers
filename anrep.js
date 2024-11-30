// Collapsible Card Toggle
document.querySelectorAll('.toggle-btn').forEach(button => {
    button.addEventListener('click', function() {
      const cardBody = this.closest('.card').querySelector('.card-body');
      cardBody.classList.toggle('hidden');
      this.textContent = cardBody.classList.contains('hidden') ? '+' : '-';
    });
  });
  
  // ApexCharts Data for Shipment Data
  var shipmentOptions = {
    chart: {
      type: 'pie',
      width: '100%',
      height: '300px',
    },
    labels: ['On-Time Deliveries', 'Delayed Deliveries'],
    series: [1175, 75],
    colors: ['#27ae60', '#e74c3c'],
    responsive: [{
      breakpoint: 768,
      options: {
        chart: {
          width: '100%',
          height: '250px'
        }
      }
    }]
  };
  
  // Initialize Shipment Chart
  var shipmentChart = new ApexCharts(document.querySelector("#shipmentChart"), shipmentOptions);
  shipmentChart.render();
  
  // ApexCharts Data for Fuel Efficiency and Cost
  var fuelOptions = {
    chart: {
      type: 'bar',
      height: '300px',
      width: '100%',
    },
    series: [{
      name: 'Fuel Efficiency',
      data: [8.5]
    }, {
      name: 'Fuel Cost',
      data: [320000]
    }],
    xaxis: {
      categories: ['Fleet Performance'],
    },
    colors: ['#f39c12', '#2980b9']
  };
  
  // Initialize Fuel Chart
  var fuelChart = new ApexCharts(document.querySelector("#fuelChart"), fuelOptions);
  fuelChart.render();
  
  // Theme Toggle Functionality
  const themeToggle = document.getElementById('theme-toggle');
  themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => card.classList.toggle('dark-mode'));
    themeToggle.classList.toggle('dark-mode');
    themeToggle.textContent = document.body.classList.contains('dark-mode') ? '🌞' : '🌙';
  });
  
  document.addEventListener("DOMContentLoaded", () => {
    console.log("Dashboard loaded.");
    // Add functionality here (e.g., dynamic updates or interactivity)
  });
  