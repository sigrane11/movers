// Filter Table by Search and Status
function filterTable() {
    const searchInput = document.getElementById("searchShipment").value.toLowerCase();
    const statusFilter = document.getElementById("statusFilter").value.toLowerCase();
    const table = document.getElementById("shippingDetailsTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        const shipmentID = cells[0].innerText.toLowerCase();
        const orderID = cells[1].innerText.toLowerCase();
        const status = cells[4].innerText.toLowerCase();

        // Show row if it matches search and status filter
        const matchesSearch = shipmentID.includes(searchInput) || orderID.includes(searchInput);
        const matchesStatus = !statusFilter || status === statusFilter;

        rows[i].style.display = matchesSearch && matchesStatus ? "" : "none";
    }
}

// Sort Table Columns
function sortTable(columnIndex) {
    const table = document.getElementById("shippingDetailsTable");
    const rows = Array.from(table.rows).slice(1); // Exclude header row
    const ascending = table.dataset.sortDirection !== "ascending";

    rows.sort((a, b) => {
        const cellA = a.cells[columnIndex].innerText.toLowerCase();
        const cellB = b.cells[columnIndex].innerText.toLowerCase();

        if (cellA < cellB) return ascending ? -1 : 1;
        if (cellA > cellB) return ascending ? 1 : -1;
        return 0;
    });

    rows.forEach(row => table.appendChild(row)); // Append rows in sorted order
    table.dataset.sortDirection = ascending ? "ascending" : "descending";
}

// Initialize Notification Dropdown Toggle
document.getElementById("notification-btn").addEventListener("click", () => {
    const dropdown = document.getElementById("notification-dropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
});

// Close Notification Dropdown on Outside Click
document.addEventListener("click", (event) => {
    const dropdown = document.getElementById("notification-dropdown");
    const button = document.getElementById("notification-btn");
    if (!dropdown.contains(event.target) && event.target !== button) {
        dropdown.style.display = "none";
    }
});
