@extends('layouts.main-manajemen')

@section('content')
<div class="bg-gray-100">
  <!-- Main Content -->
  <div class="ml-8 p-6">
    <header class="flex justify-between items-center mb-6">
      <div>
        <h1 id="page-title" class="text-2xl font-semibold leading-relaxed ml-24">Top Kurir</h1>
        <p id="page-subtitle" class="text-base font-normal ml-24 mb-10 text-[#595959]">Berdasarkan Total Transaksi</p>
      </div>
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
    {{-- Masyarakat --}}
        @if ($topMasyarakat->isEmpty())
        <img src="/img/manajemen/datamaster/ilustrasidatakosong.png" alt="Ilustrasi Data Kosong" class="w-1/5 h-1/5 mx-auto mt-36" />
        <h1 class="text-center mt-14 text-[#437252] font-bold text-4xl">Oops!</h1>
        <p class="text-center mt-5 h-full pb-52 text-[#595959] text-xl">Tidak ada data yang ditemukan</p>
        @else
      <div id="masyarakat" class="grid grid-cols-1 md:grid-cols-3 gap-y-2 mb-6 relative ml-40 mt-10 ">

            <!-- Card Juara 3 -->
            @foreach($topMasyarakat->skip(2)->take(1) as $key => $masyarakat)
            <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative">
              <img src="{{$masyarakat->foto_profil}}" alt="Not found" class="rounded-full mb-4 w-16 h-16" />
              <h2 class="text-center text-lg font-bold">{{ $masyarakat->nama }}</h2>
              <p class="text-center text-[#569F52]">Masyarakat</p>
              <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
              <div class="flex flex-col items-center mt-2 text-sm">
                <p class="flex items-center space-x-2 mr-6">
                    <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="" class="mr-2 w-[30px] h-[30px]">
                    {{ $masyarakat->poin }} Poin
                </p>
                <p class="flex items-center space-x-2">
                  <img src="{{ asset('img/manajemen/datamaster/icon/Asset-transaksi.svg') }}" alt="" class="w-[30px] h-[30px] mt-2">
                  <span>{{ $masyarakat->total_penjemputan }} Transaksi</span>
              </p>
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara3.png') }}" alt="" class="w-3/4 h-3/4">
            </div>
            
            </div>
            @endforeach

            <!-- Card Peringkat 1 -->
            @foreach($topMasyarakat->take(1) as $key => $masyarakat)
            <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative -top-8 ">
              <img src="{{$masyarakat->foto_profil}}" alt="Not Found" class="rounded-full mb-4 w-16 h-16" />
              <h2 class="text-center text-lg font-bold">{{ $masyarakat->nama }}</h2>
              <p class="text-center text-[#569F52]">Masyarakat</p>
              <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
              <div class="flex flex-col items-center mt-4 text-sm">
                <p class="flex items-center space-x-2 mr-6">
                  <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="" class="mr-2 w-[30px] h-[30px]">
                  {{ $masyarakat->poin }} Poin
              </p>
              <p class="flex items-center space-x-2">
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-transaksi.svg') }}" alt="" class="w-[30px] h-[30px] mt-2">
                <span>{{ $masyarakat->total_penjemputan }} Transaksi</span>
            </p>            
                  <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara1.png') }}" alt="" class="w-3/4 h-3/4 mt-2">
              </div>
            </div>
            @endforeach

            <!-- Card Peringkat 2 -->
            @foreach($topMasyarakat->skip(1)->take(1) as $key => $masyarakat)
            <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative">
              <img src="{{$masyarakat->foto_profil}}" alt="Not Found" class="rounded-full mb-4 w-16 h-16" />
              <h2 class="text-center text-lg font-bold">{{$masyarakat->nama}}</h2>
              <p class="text-center text-[#569F52]">Masyarakat</p>
              <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
              <div class="flex flex-col items-center mt-4 text-sm">
                <p class="flex items-center space-x-2 mr-6">
                  <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="" class="mr-2 w-[30px] h-[30px]">
                  {{ $masyarakat->poin }} Poin
              </p>
              <p class="flex items-center space-x-2">
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-transaksi.svg') }}" alt="" class="w-[30px] h-[30px] mt-2">
                <span>{{ $masyarakat->total_penjemputan }} Transaksi</span>
            </p>
              <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara2.png') }}" alt="Peringkat 2" class="w-3/4 h-3/4">
              </div>
            </div>
            @endforeach
        @endif
      </div>

      {{-- Kurir --}}
      <div id="kurir" class="grid grid-cols-1 md:grid-cols-3 gap-y-2 mb-6 relative ml-40 mt-10 hidden">
        <!-- Card Peringkat 3 -->
        @if ($topKurir->isEmpty())
        <h1 class="text-center text-lg font-bold">Tidak ada Data</h1>
    @else
        @foreach($topKurir->skip(2)->take(1) as $key => $kurir)
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative top-4">
            <img src="{{$kurir->foto_profil}}" alt="Not Found" class="rounded-full mb-4 w-16 h-16" />
            <h2 class="text-center text-lg font-bold">{{ $kurir->nama }}</h2>
            <p class="text-center text-[#569F52]">Kurir</p>
            <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
            <div class="flex flex-col items-center mt-2 text-sm">
                <p class="flex items-center space-x-2 mr-6">
                  <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="" class="mr-2 w-[30px] h-[30px]">
                   {{ $kurir->poin }} Poin</p>
                   <p class="flex items-center space-x-2">
                    <img src="{{ asset('img/manajemen/datamaster/icon/Asset-transaksi.svg') }}" alt="" class="w-[30px] h-[30px] mt-2">
                    <span>{{ $kurir->total_penjemputan }} Transaksi</span>
                </p>                
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara3.png') }}" alt="" class="w-3/4 h-3/4">
            </div>
        </div>
        @endforeach

        <!-- Card Peringkat 1 -->
        @foreach($topKurir->take(1) as $key => $kurir)
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative -top-4">
            <img src="{{$kurir->foto_profil}}" alt="Not Found" class="rounded-full mb-4 w-16 h-16" />
            <h2 class="text-center text-lg font-bold">{{ $kurir->nama }}</h2>
            <p class="text-center text-[#569F52]">Kurir</p>
            <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
            <div class="flex flex-col items-center mt-2 text-sm">
                <p class="flex items-center space-x-2 mr-6">
                  <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="" class="mr-2 w-[30px] h-[30px]">
                   {{ $kurir->poin }} Poin</p>
                   <p class="flex items-center space-x-2">
                    <p class="flex items-center space-x-2">
                      <img src="{{ asset('img/manajemen/datamaster/icon/Asset-transaksi.svg') }}" alt="" class="w-[30px] h-[30px] mt-2">
                      <span>{{ $kurir->total_penjemputan }} Transaksi</span>
                  </p>                  
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara1.png') }}" alt="" class="w-3/4 h-3/4">
            </div>
        </div>
        @endforeach

        <!-- Card Peringkat 2 -->
        @foreach($topKurir->skip(1)->take(1) as $key => $kurir)
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative top-6">
            <img src="{{$kurir->foto_profil}}" alt="Not Found" class="rounded-full mb-4 w-16 h-16" />
            <h2 class="text-center text-lg font-bold">{{ $kurir->nama }}</h2>
            <p class="text-center text-[#569F52]">Kurir</p>
            <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
            <div class="flex flex-col items-center mt-2 text-sm">
                <p class="flex items-center space-x-2 mr-6">
                  <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="" class="mr-2 w-[38px] h-[38px]">
                   {{ $kurir->poin }} Poin</p>
                   <p class="flex items-center space-x-2">
                    <p class="flex items-center space-x-2">
                      <img src="{{ asset('img/manajemen/datamaster/icon/Asset-transaksi.svg') }}" alt="" class="w-[30px] h-[30px] mt-2">
                      <span>{{ $kurir->total_penjemputan }} Transaksi</span>
                  </p>                  
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara2.png') }}" alt="" class="w-3/4 h-3/4">
            </div>
        </div>
        @endforeach
        @endif
      </div>


      {{-- Jenis Sampah --}}
      <div id="jenis" class="grid grid-cols-1 md:grid-cols-3 gap-y-2 mb-6 relative ml-40 mt-10 hidden">
        @if ($topKurir->isEmpty())
        <h1 class="text-center text-lg font-bold">Tidak ada Data</h1>
        @else
        <!-- Card Peringkat 3 -->
        @foreach($topJenisSampah->skip(2)->take(1) as $key => $jenis)
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative top-4">
           @php
              $imagePath = 'img/manajemen/datamaster/gambarJenisSampah/' . $jenis->nama_jenis . '.png';
          @endphp
            <img src="{{ asset($imagePath) }}" alt="img\manajemen\datamaster\gambarJenisSampah\no-image.png" class="rounded-full mb-2 w-16 h-16" />
            <h2 class="text-left text-lg font-bold">{{ $jenis->nama_jenis }}</h2>
            <p class="text-center text-[#569F52]">Jenis Sampah</p>
            <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
            <div class="flex flex-col items-center mt-2 text-sm">
              <p class="flex items-center space-x-2">
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-penjemputan.svg') }}" alt="" class="mr-2 w-[38px] h-[38px] mt-2">
                <span>{{ $jenis->total_penjemputanJ }} Penjemputan</span>
            </p>            
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara3.png') }}" alt="" class="w-full h-1/2 mt-4">
            </div>
        </div>
        @endforeach

        <!-- Card Peringkat 1 -->
        @foreach($topJenisSampah->take(1) as $key => $jenis)
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative -top-4">
          @php
          $imagePath = 'img/manajemen/datamaster/gambarJenisSampah/' . $jenis->nama_jenis . '.png';
      @endphp
        <img src="{{ asset($imagePath) }}" alt="img\manajemen\datamaster\gambarJenisSampah\no-image.png" class="rounded-full mb-2 w-16 h-16" />
            <h2 class="text-center text-lg font-bold">{{ $jenis->nama_jenis }}</h2>
            <p class="text-center text-[#569F52] mb-2">Jenis Sampah</p>
            <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
            <div class="flex flex-col items-center mt-2 text-sm">
                <p class="flex items-center space-x-2">
                  <p class="flex items-center space-x-2">
                    <img src="{{ asset('img/manajemen/datamaster/icon/Asset-penjemputan.svg') }}" alt="" class="mr-2 w-[38px] h-[38px] mt-2">
                    <span>{{ $jenis->total_penjemputanJ }} Penjemputan</span>
                </p>                
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara1.png') }}" alt="" class="w-full h-1/2 mt-4">
            </div>
        </div>
        @endforeach

        <!-- Card Peringkat 2 -->
        @foreach($topJenisSampah->skip(1)->take(1) as $key => $jenis)
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center w-64 h-82 relative top-6">
          @php
          // Menentukan path gambar berdasarkan nama_jenis
          $imagePath = 'img/manajemen/datamaster/gambarJenisSampah/' . $jenis->nama_jenis . '.png';
          // Cek apakah file gambar ada
          $imageExists = file_exists(public_path($imagePath));
          @endphp

          <!-- Gambar jenis sampah dengan fallback -->
          <img src="{{ $imageExists ? asset($imagePath) : asset('img/manajemen/datamaster/gambarJenisSampah/no-image.png') }}" alt="Jenis Sampah" class="rounded-full mb-2 w-16 h-16" />
            <h2 class="text-center text-lg font-bold">{{ $jenis->nama_jenis }}</h2>
            <p class="text-center text-[#569F52] mb-2">Jenis Sampah</p>
            <span class="w-3/4 h-0.5 bg-gray-300 mt-2"></span>
            <div class="flex flex-col items-center mt-2 text-sm">
                <p class="flex items-center space-x-2 ">
                  <p class="flex items-center space-x-2">
                    <img src="{{ asset('img/manajemen/datamaster/icon/Asset-penjemputan.svg') }}" alt="" class="mr-2 w-[38px] h-[38px] mt-2">
                    <span>{{ $jenis->total_penjemputanJ }} Penjemputan</span>
                </p>                
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-juara2.png') }}" alt="" class="w-full h-1/2 mt-4">
            </div>
        </div>
        @endforeach
        @endif
      </div>


<!-- Tabs Section -->
@if ($topMasyarakat->isEmpty())
<div class=" hidden"></div>
@else
<div class="tabs grid grid-cols-1 md:grid-cols-3 bg-gray-300 rounded-lg mt-14">
  <button id="btnTopMasyarakat" class="pb-2 border-b-2 font-semibold tab-button p-2">Top Masyarakat</button>
  <button id="btnTopKurir" class="pb-2 hover:border-b-2 font-semibold tab-button p-2">Top Kurir</button>
  <button id="btnTopJenisSampah" class="pb-2 hover:border-b-2 font-semibold tab-button p-2">Top Jenis Sampah</button>
</div>
@endif

@if ($topMasyarakat->isEmpty())
<div class=" hidden"></div>
@else
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
    @foreach($topMasyarakat->skip(3) as $key => $masyarakat)
    <tr class="border-t text-center">
        <td class="p-4">{{ $key + 1 }}</td>
        
        <td class="p-4 flex items-center justify-center space-x-4">
            <img src="{{ $masyarakat->foto_profil }}" alt="Foto Profil {{ $masyarakat->nama }}" class="rounded-full w-16 h-16" />
            <span>{{ $masyarakat->nama }}</span>
        </td>
        
        <td class="p-4">{{ $masyarakat->total_penjemputan }}</td>
        <td class="p-4">{{ $masyarakat->poin }}</td>
    </tr>
    @endforeach
    
     
  </tbody>
</table>
@endif

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
    @foreach($topKurir->skip(3) as $key => $kurir)
    <tr class="border-t text-center">
        <td class="p-4">{{ $key + 1 }}</td>
        <td class="p-4 flex items-center justify-center space-x-4">
          <img src="{{ $kurir->foto_profil }}" alt="Foto Profil {{ $kurir->nama }}" class="rounded-full w-16 h-16" />
          <span>{{ $kurir->nama }}</span>
      </td>
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
    @foreach($topJenisSampah->skip(3) as $key => $jenis)
    <tr class="border-t text-center">
        <td class="p-4">{{ $key + 1 }}</td>
        <td class="p-4 flex items-center justify-center space-x-4">
          @php
              // Membuat path gambar berdasarkan nama_jenis
              $imagePath = 'img/manajemen/datamaster/gambarJenisSampah/' . $jenis->nama_jenis . '.png';
          @endphp
      
          <img src="{{ asset($imagePath) }}" alt="{{ $jenis->nama_jenis }}" class="rounded-full w-16 h-16" />
          <span>{{ $jenis->nama_jenis }}</span>
      </td>
      
        <td class="p-4">{{ $jenis->total_penjemputanJ }}</td>
    </tr>
@endforeach
  </tbody>
</table>

      
  </div>
</div>
<script>

  // Ambil parameter 'tab' dari URL
  const params = new URLSearchParams(window.location.search);
  const tab = params.get('tab');

  // Ambil elemen <h1> berdasarkan id
  const pageTitle = document.getElementById('page-title');

  // Tentukan judul berdasarkan nilai 'tab'
  switch (tab) {
    case 'masyarakat':
      pageTitle.textContent = 'Top Masyarakat';
      break;
    case 'kurir':
      pageTitle.textContent = 'Top Kurir';
      break;
    case 'jenis-sampah':
      pageTitle.textContent = 'Top Jenis Sampah';
      break;
    default:
      pageTitle.textContent = 'Top Kurir'; // Judul default jika 'tab' tidak ditemukan
  }


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
  
  // Ambil elemen kategori (untuk card)
  const masyarakat = document.getElementById("masyarakat");
  const kurir = document.getElementById("kurir");
  const jenis = document.getElementById("jenis");

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

      // Sembunyikan semua card
      masyarakat.classList.add("hidden");
      kurir.classList.add("hidden");
      jenis.classList.add("hidden");

      // Hapus border aktif dari semua tombol
      topMasyarakatButton.classList.remove("border-green-500", "border-b-2");
      topKurirButton.classList.remove("border-green-500", "border-b-2");
      topJenisSampahButton.classList.remove("border-green-500", "border-b-2");
  }

  // Tampilkan tabel dan card sesuai parameter 'tab' di URL
  function showTableBasedOnURL() {
      resetTabs(); // Sembunyikan semua tabel dan card terlebih dahulu
      if (activeTab === "kurir") {
          topKurirTable.classList.remove("hidden");
          kurir.classList.remove("hidden");
          topKurirButton.classList.add("border-green-500", "border-b-2");
      } else if (activeTab === "jenis-sampah") {
          topJenisSampahTable.classList.remove("hidden");
          jenis.classList.remove("hidden");
          topJenisSampahButton.classList.add("border-green-500", "border-b-2");
      } else {
          // Default tampilkan tabel dan card Top Masyarakat
          topMasyarakatTable.classList.remove("hidden");
          masyarakat.classList.remove("hidden");
          topMasyarakatButton.classList.add("border-green-500", "border-b-2");
      }
  }

  // Event listener untuk masing-masing tombol
  topMasyarakatButton.addEventListener("click", function () {
      resetTabs();
      topMasyarakatTable.classList.remove("hidden");
      masyarakat.classList.remove("hidden");
      topMasyarakatButton.classList.add("border-green-500", "border-b-2");
  });

  topKurirButton.addEventListener("click", function () {
      resetTabs();
      topKurirTable.classList.remove("hidden");
      kurir.classList.remove("hidden");
      topKurirButton.classList.add("border-green-500", "border-b-2");
  });

  topJenisSampahButton.addEventListener("click", function () {
      resetTabs();
      topJenisSampahTable.classList.remove("hidden");
      jenis.classList.remove("hidden");
      topJenisSampahButton.classList.add("border-green-500", "border-b-2");
  });

  // Panggil fungsi untuk menampilkan tabel berdasarkan URL
  showTableBasedOnURL();

</script>
@endsection