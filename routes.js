const routesData = [
    { id: 1, name: "Route A", type: "shortest", carrier: "taxi", cost: "$15" },
    { id: 2, name: "Route B", type: "cheapest", carrier: "bus", cost: "$5" },
    { id: 3, name: "Route C", type: "fastest", carrier: "van", cost: "$10" },
    { id: 4, name: "Route D", type: "shortest", carrier: "bus", cost: "$7" },
    { id: 5, name: "Route E", type: "cheapest", carrier: "taxi", cost: "$12" },
  ];
  
  const routeTypeSelect = document.getElementById("route-type");
  const carrierTypeSelect = document.getElementById("carrier-type");
  const routesList = document.getElementById("routes-list");
  
  // Load selected routes from local storage
  let selectedRoutes = JSON.parse(localStorage.getItem("selectedRoutes")) || [];
  
  // Function to display routes
  function displayRoutes(filteredRoutes) {
    routesList.innerHTML = ""; // Clear existing routes
    filteredRoutes.forEach((route) => {
      const routeCard = document.createElement("div");
      routeCard.classList.add("route-card");
      routeCard.innerHTML = `
        <h3>${route.name}</h3>
        <p>Type: ${route.type}</p>
        <p>Carrier: ${route.carrier}</p>
        <p>Cost: ${route.cost}</p>
        <button onclick="selectRoute(${route.id})">Select</button>
      `;
      routesList.appendChild(routeCard);
    });
  }
  
  // Filter routes based on selection
  function filterRoutes() {
    const routeType = routeTypeSelect.value;
    const carrierType = carrierTypeSelect.value;
  
    const filteredRoutes = routesData.filter((route) => {
      return (
        (routeType === "all" || route.type === routeType) &&
        (carrierType === "all" || route.carrier === carrierType)
      );
    });
  
    displayRoutes(filteredRoutes);
  }
  
  // Select route function
  function selectRoute(routeId) {
    const route = routesData.find((r) => r.id === routeId);
  
    if (!selectedRoutes.some((r) => r.id === routeId)) {
      selectedRoutes.push(route);
      alert(`Route "${route.name}" added to selected routes.`);
    } else {
      alert(`Route "${route.name}" is already selected.`);
    }
  
    updateSelectedRoutesTable();
    saveSelectedRoutesToLocalStorage();
  }
  
  // Remove route from the selected routes table
  function removeRoute(routeId) {
    selectedRoutes = selectedRoutes.filter((route) => route.id !== routeId);
    alert(`Route removed.`);
    updateSelectedRoutesTable();
    saveSelectedRoutesToLocalStorage();
  }
  
  // Display selected routes in the table
  function updateSelectedRoutesTable() {
    const selectedRoutesList = document.getElementById("selected-routes-list");
    selectedRoutesList.innerHTML = ""; // Clear existing rows
  
    selectedRoutes.forEach((route) => {
      const row = document.createElement("tr");
  
      row.innerHTML = `
        <td>${route.name}</td>
        <td>${route.type}</td>
        <td>${route.carrier}</td>
        <td>${route.cost}</td>
        <td><button onclick="removeRoute(${route.id})">Remove</button></td>
      `;
      selectedRoutesList.appendChild(row);
    });
  }
  
  // Save selected routes to local storage
  function saveSelectedRoutesToLocalStorage() {
    localStorage.setItem("selectedRoutes", JSON.stringify(selectedRoutes));
  }
  
  // Event listeners for filter options
  routeTypeSelect.addEventListener("change", filterRoutes);
  carrierTypeSelect.addEventListener("change", filterRoutes);
  
  // Initial display
  displayRoutes(routesData);
  updateSelectedRoutesTable();
  