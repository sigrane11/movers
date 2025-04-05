<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tailwind CSS Sample</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-indigo-600">MyWebsite</h1>
      <div class="space-x-4">
        <a href="#" class="text-gray-700 hover:text-indigo-600">Home</a>
        <a href="#" class="text-gray-700 hover:text-indigo-600">About</a>
        <a href="#" class="text-gray-700 hover:text-indigo-600">Contact</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="text-center py-20 bg-indigo-600 text-white">
    <h2 class="text-4xl font-bold mb-4">Welcome to My Website</h2>
    <p class="text-lg mb-6">This is a simple demo using Tailwind CSS.</p>
    <a href="#" class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">Get Started</a>
  </section>

  <!-- Card Section -->
  <section class="max-w-7xl mx-auto px-4 py-16 grid md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
      <h3 class="text-xl font-semibold mb-2">Card Title 1</h3>
      <p class="text-gray-600 mb-4">Some interesting content goes here.</p>
      <a href="#" class="text-indigo-600 font-semibold hover:underline">Learn more</a>
    </div>
    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
      <h3 class="text-xl font-semibold mb-2">Card Title 2</h3>
      <p class="text-gray-600 mb-4">More information about something.</p>
      <a href="#" class="text-indigo-600 font-semibold hover:underline">Learn more</a>
    </div>
    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
      <h3 class="text-xl font-semibold mb-2">Card Title 3</h3>
      <p class="text-gray-600 mb-4">Details and description here.</p>
      <a href="#" class="text-indigo-600 font-semibold hover:underline">Learn more</a>
    </div>
  </section>

</body>
</html>
