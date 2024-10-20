@extends('main')

@section('content')
<div class="flex h-screen">
  <div class="flex flex-col w-64 h-screen p-4 bg-white border-r border-gray-200">
    <!-- Top Section: Logo and Title -->
    <div class="flex items-center space-x-2">
      <img src="path-to-logo.svg" alt="Logo" class="w-8 h-8">
      <h1 class="text-lg font-bold text-green-600">E-WastePas</h1>
    </div>
  
    <!-- Sidebar Links -->
    <nav class="mt-4 space-y-2">
      <a href="#" class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100">
        <span class="text-sm text-gray-600">Lorem Ipsum Dolor Sit Amet</span>
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
      <a href="#" class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100">
        <span class="text-sm text-gray-600">Lorem Ipsum Dolor Sit Amet</span>
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
      <a href="#" class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100">
        <span class="text-sm text-gray-600">Lorem Ipsum Dolor Sit Amet</span>
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    </nav>
  
    <!-- Another Section (Optional) -->
    <div class="mt-6">
      <h2 class="text-xs font-semibold text-gray-500">Lorem Ipsum Dolor Sit Amet</h2>
      <nav class="mt-3 space-y-2">
        <a href="#" class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100">
          <span class="text-sm text-gray-600">Lorem Ipsum Dolor Sit Amet</span>
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
        <a href="#" class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100">
          <span class="text-sm text-gray-600">Lorem Ipsum Dolor Sit Amet</span>
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
      </nav>
    </div>
  </div>  

    <!-- Main content area -->
    <div class="flex-grow bg-gray-50">
    <!-- Top bar -->
    <div class="flex items-center justify-between p-4 bg-white shadow-md">
      <input type="text" placeholder="Search..." class="p-2 border border-gray-300 rounded-md">

      <!-- Profile dropdown -->
      <div x-data="{ open: false }" class="relative">
          <button @click="open = !open" class="flex items-center space-x-2">
              <span class="text-gray-700">Ammar Bahtiar</span>
              <img src="path-to-profile-image.jpg" alt="Profile" class="w-8 h-8 rounded-full">
              <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"></path></svg>
          </button>

          <!-- Dropdown menu -->
          <div x-show="open" @click.away="open = false" class="absolute right-0 w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-100">Logout</a>
          </div>
      </div>
    </div>
        <!-- Dashboard content -->
        <div class="p-6">
        <!-- Top statistics -->
        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3">
          <!-- Card for Masyarakat -->
          <div class="p-6 text-center bg-white rounded-lg shadow-md">
              <h2 class="mb-2 text-2xl font-semibold">1.000 Masyarakat</h2>
              <p class="mb-4 text-gray-500">Lorem ipsum dolor sit amet</p>
              <button class="w-full py-3 text-white rounded-lg bg-gradient-to-r from-green-400 via-green-200 to-gray-500 hover:from-green-300 hover:via-gray-100 hover:to-gray-400">
                  Button Label
              </button>
          </div>
          
          <!-- Card for Kurir -->
          <div class="p-6 text-center bg-white rounded-lg shadow-md">
              <h2 class="mb-2 text-2xl font-semibold">1.000 Kurir</h2>
              <p class="mb-4 text-gray-500">Lorem ipsum dolor sit amet</p>
              <button class="w-full py-3 text-white rounded-lg bg-gradient-to-r from-green-400 via-green-200 to-gray-500 hover:from-green-300 hover:via-gray-100 hover:to-gray-400">
                  Button Label
              </button>
          </div>
          
          <!-- Card for Sampah -->
          <div class="p-6 text-center bg-white rounded-lg shadow-md">
              <h2 class="mb-2 text-2xl font-semibold">1.000 Sampah</h2>
              <p class="mb-4 text-gray-500">Lorem ipsum dolor sit amet</p>
              <button class="w-full py-3 text-white rounded-lg bg-gradient-to-r from-green-400 via-green-200 to-gray-500 hover:from-green-300 hover:via-gray-100 hover:to-gray-400">
                  Button Label
              </button>
          </div>
        </div>


            <!-- Graph and Data Tables -->
            <div class="grid grid-cols-2 gap-6">
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <h3 class="mb-4 text-lg font-semibold">Graph</h3>
                    <!-- Insert graph here (e.g., Chart.js or other graph library) -->
                    <div class="flex items-center justify-center h-48 border-2 border-gray-300 border-dashed">
                        Graph Placeholder
                    </div>
                </div>
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <h3 class="mb-4 text-lg font-semibold">Data Table 1</h3>
                    <div class="flex items-center justify-center h-48 border-2 border-gray-300 border-dashed">
                        Data Table Placeholder
                    </div>
                </div>
                <div class="p-4 bg-white rounded-lg shadow-md">
                    <h3 class="mb-4 text-lg font-semibold">Data Table 2</h3>
                    <div class="flex items-center justify-center h-48 border-2 border-gray-300 border-dashed">
                        Data Table Placeholder
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
