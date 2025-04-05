<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delivery Vehicle Assignment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Pending Shipments</h2>
    <table class="w-full table-auto border border-gray-200">
      <thead class="bg-gray-100 text-left">
        <tr>
          <th class="p-3 border-b">Delivery ID</th>
          <th class="p-3 border-b">Destination</th>
          <th class="p-3 border-b">Package</th>
          <th class="p-3 border-b">Select Vehicle</th>
          <th class="p-3 border-b text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-gray-50">
          <td class="p-3 border-b">DLV001</td>
          <td class="p-3 border-b">Quezon City</td>
          <td class="p-3 border-b">3 Boxes</td>
          <td class="p-3 border-b">
            <select class="w-full p-2 border rounded-xl">
              <option value="">-- Select Vehicle --</option>
              <option value="van">Van</option>
              <option value="truck">Truck</option>
              <option value="motorcycle">Motorcycle</option>
            </select>
          </td>
          <td class="p-3 border-b text-center">
            <button class="bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600 transition">
              Confirm
            </button>
          </td>
        </tr>

        <tr class="hover:bg-gray-50">
          <td class="p-3 border-b">DLV002</td>
          <td class="p-3 border-b">Makati</td>
          <td class="p-3 border-b">1 Envelope</td>
          <td class="p-3 border-b">
            <select class="w-full p-2 border rounded-xl">
              <option value="">-- Select Vehicle --</option>
              <option value="van">Van</option>
              <option value="truck">Truck</option>
              <option value="motorcycle">Motorcycle</option>
            </select>
          </td>
          <td class="p-3 border-b text-center">
            <button class="bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600 transition">
              Confirm
            </button>
          </td>
        </tr>

        <tr class="hover:bg-gray-50">
          <td class="p-3 border-b">DLV003</td>
          <td class="p-3 border-b">Taguig</td>
          <td class="p-3 border-b">5 Crates</td>
          <td class="p-3 border-b">
            <select class="w-full p-2 border rounded-xl">
              <option value="">-- Select Vehicle --</option>
              <option value="van">Van</option>
              <option value="truck">Truck</option>
              <option value="motorcycle">Motorcycle</option>
            </select>
          </td>
          <td class="p-3 border-b text-center">
            <button class="bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600 transition">
              Confirm
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
