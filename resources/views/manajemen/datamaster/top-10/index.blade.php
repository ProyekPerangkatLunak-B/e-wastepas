@extends('layouts.main-manajemen')

@section('content')
<div class="bg-gray-100">
  <!-- Main Content -->
  <div class="ml-8 p-6">
    <header class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Top Kurir</h1>
      <div class="flex items-center">
        <input
          type="text"
          placeholder="Cari..."
          class="border rounded-md px-4 py-2 text-sm mr-3"
        />
        <button class="flex items-center border px-4 py-2 rounded-md text-sm">
          <span class="material-icons-outlined mr-2">filter</span> Filter
        </button>
      </div>
    </header>

    <!-- Card 1 -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-2 mb-6 relative ml-40 mt-10">
        <!-- Card Juara 2 -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-72 relative top-4">
          <img src="https://via.placeholder.com/50" alt="Agus" class="rounded-full mb-4 w-16 h-16" />
          <h2 class="text-center text-lg font-bold">Agus</h2>
          <p class="text-center text-gray-500">Kurir</p>
          <div class="flex flex-col items-center mt-4 text-sm">
            <p class="mb-2">🏆 23,948 Poin</p>
            <p>📅 2,921 Transaksi</p>
          </div>
        </div>
      
        <!-- Card Juara 1 -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-80 relative -top-4">
          <img src="https://via.placeholder.com/50" alt="Asep" class="rounded-full mb-4 w-16 h-16" />
          <h2 class="text-center text-lg font-bold">Asep</h2>
          <p class="text-center text-gray-500">Kurir</p>
          <div class="flex flex-col items-center mt-4 text-sm">
            <p class="mb-2">🏆 39,894 Poin</p>
            <p>📅 3,000 Transaksi</p>
          </div>
        </div>
      
        <!-- Card Juara 3 -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-68 relative top-6">
          <img src="https://via.placeholder.com/50" alt="Iwan" class="rounded-full mb-4 w-16 h-16" />
          <h2 class="text-center text-lg font-bold">Iwan</h2>
          <p class="text-center text-gray-500">Kurir</p>
          <div class="flex flex-col items-center mt-4 text-sm">
            <p class="mb-2">🏆 28,647 Poin</p>
            <p>📅 2,938 Transaksi</p>
          </div>
        </div>
      </div>  

<!-- Tabs Section -->
<div class="tabs grid grid-cols-1 md:grid-cols-3 bg-gray-300 rounded-lg mt-14">
  <button id="btnTopMasyarakat" class="pb-2 border-b-2 font-semibold tab-button p-2">Top Masyarakat</button>
  <button id="btnTopKurir" class="pb-2 hover:border-b-2 font-semibold tab-button p-2">Top Kurir</button>
  <button id="btnTopJenisSampah" class="pb-2 hover:border-b-2 font-semibold tab-button p-2">Top Jenis Sampah</button>
</div>

<table id="topMasyarakatTable" class="w-full bg-white rounded-2xl shadow-md mt-6 hidden">
  <thead>
    <tr class="text-center text-sm font-bold">
      <th class="p-4">Peringkat</th>
      <th class="p-4">Nama</th>
      <th class="p-4">Total Penjemputan</th>
      <th class="p-4">Poin</th>
    </tr>
  </thead>
  <tbody>
    @foreach($topMasyarakat as $key => $masyarakat)
    <tr class="border-t text-center">
        <td class="p-4">{{ $key + 1 }}</td>
        <td class="p-4">{{ $masyarakat->nama }}</td>
        <td class="p-4">{{ $masyarakat->total_penjemputan }}</td>
        <td class="p-4">{{ $masyarakat->poin }}</td>
    </tr>
  @endforeach 
  </tbody>
</table>

<table id="topKurirTable" class="w-full bg-white rounded-2xl shadow-md mt-6 hidden">
  <thead>
    <tr class="text-center text-sm font-bold">
      <th class="p-4">Peringkat</th>
      <th class="p-4">Nama</th>
      <th class="p-4">Total Penjemputan</th>
      <th class="p-4">Poin</th>
    </tr>
  </thead>
  <tbody>
    @foreach($topKurir as $key => $kurir)
    <tr class="border-t text-center">
        <td class="p-4">{{ $key + 1 }}</td>
        <td class="p-4">{{ $kurir->nama }}</td>
        <td class="p-4">{{ $kurir->total_penjemputan }}</td>
        <td class="p-4">{{ $kurir->poin }}</td>
    </tr>
@endforeach
  </tbody>
</table>

<table id="topJenisSampahTable" class="w-full bg-white rounded-2xl shadow-md mt-6 hidden">
  <thead>
    <tr class="text-center text-sm font-bold">
      <th class="p-4">Peringkat</th>
      <th class="p-4">Jenis Sampah</th>
      <th class="p-4">Total Penjemputan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($topJenisSampah as $key => $jenis)
    <tr class="border-t text-center">
        <td class="p-4">{{ $key + 1 }}</td>
        <td class="p-4">{{ $jenis->nama_jenis }}</td>
        <td class="p-4">{{ $jenis->total_penjemputanJ }}</td>
    </tr>
@endforeach
  </tbody>
</table>

      
  </div>
</div>
<script>
  // Fungsi untuk mengambil parameter dari URL
  function getURLParameter(name) {
      return new URLSearchParams(window.location.search).get(name);
  }

  // Tangkap nilai parameter 'tab'
  const activeTab = getURLParameter('tab');

  // Ambil elemen tabel
  const topMasyarakatTable = document.getElementById("topMasyarakatTable");
  const topKurirTable = document.getElementById("topKurirTable");
  const topJenisSampahTable = document.getElementById("topJenisSampahTable");

  // Ambil elemen tombol
  const topMasyarakatButton = document.getElementById("btnTopMasyarakat");
  const topKurirButton = document.getElementById("btnTopKurir");
  const topJenisSampahButton = document.getElementById("btnTopJenisSampah");

  // Fungsi untuk menyembunyikan semua tabel dan menonaktifkan tombol
  function resetTabs() {
      // Sembunyikan semua tabel
      topMasyarakatTable.classList.add("hidden");
      topKurirTable.classList.add("hidden");
      topJenisSampahTable.classList.add("hidden");

      // Hapus border aktif dari semua tombol
      topMasyarakatButton.classList.remove("border-green-500", "border-b-2");
      topKurirButton.classList.remove("border-green-500", "border-b-2");
      topJenisSampahButton.classList.remove("border-green-500", "border-b-2");
  }

  // Tampilkan tabel sesuai parameter 'tab' di URL
  function showTableBasedOnURL() {
      resetTabs(); // Sembunyikan semua tabel terlebih dahulu
      if (activeTab === "kurir") {
          topKurirTable.classList.remove("hidden");
          topKurirButton.classList.add("border-green-500", "border-b-2");
      } else if (activeTab === "jenis-sampah") {
          topJenisSampahTable.classList.remove("hidden");
          topJenisSampahButton.classList.add("border-green-500", "border-b-2");
      } else {
          // Default tampilkan tabel Top Masyarakat
          topMasyarakatTable.classList.remove("hidden");
          topMasyarakatButton.classList.add("border-green-500", "border-b-2");
      }
  }

  // Event listener untuk masing-masing tombol
  topMasyarakatButton.addEventListener("click", function () {
      resetTabs();
      topMasyarakatTable.classList.remove("hidden");
      topMasyarakatButton.classList.add("border-green-500", "border-b-2");
  });

  topKurirButton.addEventListener("click", function () {
      resetTabs();
      topKurirTable.classList.remove("hidden");
      topKurirButton.classList.add("border-green-500", "border-b-2");
  });

  topJenisSampahButton.addEventListener("click", function () {
      resetTabs();
      topJenisSampahTable.classList.remove("hidden");
      topJenisSampahButton.classList.add("border-green-500", "border-b-2");
  });

  // Panggil fungsi untuk menampilkan tabel berdasarkan URL
  showTableBasedOnURL();
</script>

  

@endsection