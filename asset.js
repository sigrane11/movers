document.addEventListener('DOMContentLoaded', function () {
    // Elements
    const assetForm = document.getElementById('assetForm');
    const assetTableBody = document.getElementById('assetTableBody');
    const searchInput = document.getElementById('searchInput');
    const filterStatus = document.getElementById('filterStatus');
    const showAllBtn = document.getElementById('showAllBtn');
    const showLessBtn = document.getElementById('showLessBtn');
    const addAssetBtn = document.getElementById('addAssetBtn');
    const modalCloseBtn = document.querySelector('.modal .close');
    const form = document.getElementById('form');
    const message = document.getElementById('message');

    let assets = loadAssets(); // Load assets from local storage
    let filteredAssets = assets; // Filtered assets based on search and status
    let displayedAssets = 5; // Number of assets currently displayed
    const assetsToShow = 5; // Number of assets to show per toggle

    // Open Add Asset Modal
    addAssetBtn.addEventListener('click', function () {
        assetForm.style.display = 'block';
        document.getElementById('formTitle').textContent = 'Add Vehicle';
    });

    // Close modal
    modalCloseBtn.addEventListener('click', function () {
        assetForm.style.display = 'none';
    });

    // Filter and search assets
    searchInput.addEventListener('input', function () {
        filterAssets();
    });

    filterStatus.addEventListener('change', function () {
        filterAssets();
    });

    // Show all assets button
    showAllBtn.addEventListener('click', function () {
        displayedAssets = filteredAssets.length;
        renderAssets();
        showAllBtn.style.display = 'none';
        showLessBtn.style.display = 'inline-block';
    });

    // Show fewer assets
    showLessBtn.addEventListener('click', function () {
        displayedAssets = assetsToShow;
        renderAssets();
        showLessBtn.style.display = 'none';
        showAllBtn.style.display = 'inline-block';
    });

    // Add new asset (submit form)
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const newAsset = {
            id: assets.length + 1,
            plateNumber: document.getElementById('plateNumber').value,
            brand: document.getElementById('brand').value,
            model: document.getElementById('model').value,
            year: parseInt(document.getElementById('year').value),
            depreciationValue: document.getElementById('depreciationValue').value,
            vin: document.getElementById('vehicleIdentificationNumber').value,
            condition: document.getElementById('condition').value,
            status: document.getElementById('condition').value
        };

        // Add the new asset to the array
        assets.push(newAsset);

        // Save the updated assets list to local storage
        saveAssets(assets);

        // Clear form and close modal
        form.reset();
        assetForm.style.display = 'none';

        // Re-render assets
        filterAssets();
    });

    // Render assets in the table
    function renderAssets() {
        assetTableBody.innerHTML = ''; // Clear existing rows

        // Get assets to display (filtered and limited by displayedAssets)
        const assetsToDisplay = filteredAssets.slice(0, displayedAssets);

        assetsToDisplay.forEach(asset => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${asset.id}</td>
                <td>${asset.plateNumber}</td>
                <td>${asset.brand}</td>
                <td>${asset.model}</td>
                <td>${asset.year}</td>
                <td>${asset.depreciationValue}</td>
                <td>${asset.vin}</td>
                <td>${asset.condition}</td>
                <td>
                    <button class="editBtn">Edit</button>
                    <button class="deleteBtn">Delete</button>
                </td>
            `;
            assetTableBody.appendChild(row);

            // Delete asset
            row.querySelector('.deleteBtn').addEventListener('click', function () {
                assets = assets.filter(a => a.id !== asset.id);
                saveAssets(assets); // Save updated assets list to local storage
                filterAssets(); // Re-render filtered assets
            });

            // Edit asset
            row.querySelector('.editBtn').addEventListener('click', function () {
                document.getElementById('formTitle').textContent = 'Edit Vehicle';
                document.getElementById('vehicleId').value = asset.id;
                document.getElementById('plateNumber').value = asset.plateNumber;
                document.getElementById('brand').value = asset.brand;
                document.getElementById('model').value = asset.model;
                document.getElementById('year').value = asset.year;
                document.getElementById('depreciationValue').value = asset.depreciationValue;
                document.getElementById('vehicleIdentificationNumber').value = asset.vin;
                document.getElementById('condition').value = asset.condition;
                assetForm.style.display = 'block';
            });
        });
    }

    // Filter assets based on search and status
    function filterAssets() {
        const searchQuery = searchInput.value.toLowerCase();
        const statusFilter = filterStatus.value;

        // Filter the assets based on search and status
        filteredAssets = assets.filter(asset => {
            const matchesSearch = asset.plateNumber.toLowerCase().includes(searchQuery) ||
                asset.brand.toLowerCase().includes(searchQuery) ||
                asset.model.toLowerCase().includes(searchQuery) ||
                asset.vin.toLowerCase().includes(searchQuery);
            const matchesStatus = statusFilter ? asset.status === statusFilter : true;
            return matchesSearch && matchesStatus;
        });

        // Reset to the initial displayed assets count
        displayedAssets = assetsToShow;
        
        // Re-render the assets based on filtered results
        renderAssets();

        // Show or hide Show All/Show Less buttons
        if (filteredAssets.length > assetsToShow) {
            showAllBtn.style.display = 'inline-block';
            showLessBtn.style.display = 'none';
        } else {
            showAllBtn.style.display = 'none';
            showLessBtn.style.display = 'none';
        }
    }

    // Save assets to local storage
    function saveAssets(assets) {
        localStorage.setItem('assets', JSON.stringify(assets));
    }

    // Load assets from local storage
    function loadAssets() {
        const storedAssets = localStorage.getItem('assets');
        if (storedAssets) {
            return JSON.parse(storedAssets);
        }
        return []; // Return empty array if no assets in local storage
    }

    // Initial load of assets from local storage
    renderAssets();
});

