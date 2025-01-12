<div class="max-w-md border border-green-300 rounded-3xl p-4 shadow-md bg-white flex items-center space-x-4">
  <!-- Image -->
  <div class="w-20 h-20 bg-gray-300 flex items-center justify-center">
    <img src="{{$image}}" alt="" class="rounded-full">
  </div>

  <!-- Text Section -->
  <div class="flex flex-col justify-center">
    <h3 class="text-lg font-semibold text-gray-800">{{$nama}}</h3>
    <p class="text-sm text-green-600 mb-2">{{$kategori}}</p>
    <!-- Details -->
    <div class="flex space-x-4">
      <div class="flex items-center space-x-1">
        <span class="text-purple-600">✔</span>
        <span class="text-gray-600 font-medium">{{$quantity}}</span>
      </div>
      <div class="flex items-center space-x-1">
        <span class="text-orange-600">🏋️</span>
        <span class="text-gray-600 font-medium">{{$berat}}</span>
      </div>
    </div>
  </div>
</div>
