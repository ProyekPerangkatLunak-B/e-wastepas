<div class="max-w-md border border-green-300 rounded-3xl p-4 shadow-md bg-white">
  <div class="flex items-center space-x-4">
    <!-- Image -->
    <div class="w-20 h-20 flex items-center justify-center">
      <img src="{{$image}}" alt="" class="rounded-full">
    </div>

    <!-- Text Section -->
    <div class="flex flex-col justify-center"> 
      <h3 class="text-lg font-semibold text-gray-800">{{$nama}}</h3>
      <p class="text-sm text-green-600 mb-2">{{$kategori}}</p>
    </div>
  </div>

  <!-- Details (di bawah foto) -->
  <div class="flex justify-center gap-4 mt-4 w-full"> <!-- Menambahkan mt-4 agar ada jarak dari teks -->
    <div class="flex items-center flex-1 justify-center">  <!-- Menambahkan justify-center untuk menempatkan teks di tengah -->
      <div class="bg-gray-200 px-2 py-3 rounded-2xl flex justify-center items-center w-full">  <!-- Menambahkan justify-center dan items-center untuk menempatkan konten di tengah -->
        <img src="{{ asset('img/manajemen/datamaster/icon/Asset-pcs.png') }}" alt="" class="w-[20px] h-[20px] mr-2">
        <span class="text-gray-600 font-medium">{{$quantity}}</span>
      </div>
    </div>
    <div class="flex items-center flex-1 justify-center">  <!-- Menambahkan justify-center untuk menempatkan teks di tengah -->
      <div class="bg-gray-200 px-2 py-3 rounded-2xl flex justify-center items-center w-full"> <!-- Menambahkan justify-center dan items-center untuk menempatkan konten di tengah -->
        <img src="{{ asset('img/manajemen/datamaster/icon/Asset-kg.png') }}" alt="" class="w-[22px] h-[22px] mr-2">
        <span class="text-gray-600 font-medium">{{$berat}}</span>
      </div>
    </div>
  </div>
</div>
