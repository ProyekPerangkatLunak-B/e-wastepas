@extends('layouts.main-manajemen')

@section('content')
    {{-- Container Utama --}}
<div class="container max-w-full px-4 mx-auto bg-gray-100">
    <div class="py-8">
        {{-- Section Judul --}}
        <h2 class="text-xl font-semibold leading-relaxed ml-14">Dashboard Manajemen</h2>
        <h4 class="text-base font-normal ml-14">Selamat datang di dashboard Manajemen.</h4>

        {{-- Card Section --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8 px-12">
            {{-- Card Total Sampah Terkumpul --}}
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2">
                <i class="fa-solid fa-recycle text-3xl text-[#437252]"></i>
                <div class="text-start">
                    <h5 class="text-gray-600 font-semibold">Total Sampah Terkumpul</h5>
                    <p class="text-2xl font-bold">174.265 Kg</p>
                </div>
            </div>

            {{-- Card Total Poin Terkumpul --}}
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2">
                <i class="fa-solid fa-coins text-green text-3xl"></i>
                <div class="text-start">
                    <h5 class="text-gray-600 font-semibold">Total Poin Terkumpul</h5>
                    <p class="text-2xl font-bold">3045 Poin</p>
                </div>
            </div>

            {{-- Card Masyarakat Yang Terdaftar --}}
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2">
                <i class="fa-solid fa-users text-[#437252] text-3xl"></i>
                <div class="text-start">
                    <h5 class="text-gray-600 font-semibold">Masyarakat Yang Terdaftar</h5>
                    <p class="text-2xl font-bold">1019</p>
                </div>
            </div>

            {{-- Card Transaksi Terselesaikan --}}
            <button class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2 cursor-pointer hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                <i class="fa-solid fa-clipboard-list text-3xl text-[#437252]"></i>
                <div class="text-start">
                    <h5 class="text-gray-600 font-semibold">Transaksi Terselesaikan</h5>
                    <p class="text-2xl font-bold">5362</p>
                </div>
            </button>
        </div>
    </div>
</div>


            {{-- Chart --}}
            <div class="px-12 mt-8">
                <div class="container mx-auto p-6 grid gap-6">
                    <!-- Baris 1: 2 Kolom -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Chart: Top Masyarakat -->
                        <button class="bg-white p-4 rounded-lg shadow-md text-left  hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                            <a href="total-sampah">
                            <h2 class="text-lg font-bold mb-2">Top Masyarakat</h2>
                            <div id="chart-top-masyarakat" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
                        </a>
                        </button>

                        <!-- Chart: Top Kurir -->
                        <button class="bg-white p-4 rounded-lg shadow-md text-left hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                            <a href="total-sampah">
                            <h2 class="text-lg font-bold mb-2">Top Kurir</h2>
                            <div id="chart-top-kurir" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
                        </a>
                        </button>
                    </div>
                  
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Chart: Top Jenis Sampah -->

                        <button class="bg-white p-4 rounded-lg shadow-md text-left hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                            <a href="total-sampah">
                            <h2 class="text-lg font-bold mb-2">Top Jenis Sampah</h2>
                            <div id="chart-total-sampah" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
                            </a>
                        </button>

                    <!-- Chart: Total Sampah Tiap Daerah -->
                    <button class="bg-white p-4 rounded-lg shadow-md text-left hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                        <h2 class="text-lg font-bold mb-2">Total Sampah Terkumpul Tiap Daerah</h2>
                        <div id="chart-daerah" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
                    </button>

                      
                        <!-- Chart: Top Jenis Sampah -->
                        <button class="bg-white p-4 rounded-lg shadow-md text-left w-full hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                            <h2 class="text-lg font-bold mb-2">Top Sampah per Kategori</h2>
                            <p class="text-sm text-gray-500 mb-4">Berdasarkan Kategori</p>
                            
                            <div class="space-y-6">
                                <!-- Handphone -->
                                <div class="flex items-center space-x-4">
                                    <i class="fa-solid fa-mobile-screen-button text-3xl text-gray-700 flex-shrink-0"></i>
                                    <div class="w-full">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-medium ml-2">Handphone</span>
                                            <span class="text-sm font-medium">80%</span>
                                        </div>
                                        <div class="w-full bg-gray-300 h-2 rounded-full mt-1 ml-2">
                                            <div class="bg-[#437252] h-2 rounded-full" style="width: 80%;"></div>
                                        </div>
                                    </div>
                                </div>
                          
                                <!-- Laptop -->
                                <div class="flex items-center space-x-4">
                                    <i class="fa-solid fa-laptop text-2xl text-gray-700 flex-shrink-0"></i>
                                    <div class="w-full">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-medium">Laptop</span>
                                            <span class="text-sm font-medium">60%</span>
                                        </div>
                                        <div class="w-full bg-gray-300 h-2 rounded-full mt-1">
                                            <div class="bg-[#437252] h-2 rounded-full" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                          
                                <!-- Televisi -->
                                <div class="flex items-center space-x-4">
                                    <i class="fa-solid fa-tv text-2xl text-gray-700 flex-shrink-0"></i>
                                    <div class="w-full">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-medium">Televisi</span>
                                            <span class="text-sm font-medium">30%</span>
                                        </div>
                                        <div class="w-full bg-gray-300 h-2 rounded-full mt-1">
                                            <div class="bg-[#437252] h-2 rounded-full" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.0.0/dist/echarts.min.js"></script>


    <script>
        // Konfigurasi untuk masing-masing chart (contoh sederhana)
        const renderChart = (selector, options) => {
          const chart = new ApexCharts(document.querySelector(selector), options);
          chart.render();
        };
      
        // Chart: Top Masyarakat
        renderChart("#chart-top-masyarakat", {
          series: [{ data: [10, 15, 20, 25, 13, 17, 23] }],
          chart: { type: 'bar' },
          xaxis: { categories: ['Aaliyah', 'Kim', 'Isa', 'Beyonce', 'Asep', 'Jajang', 'Maemunah'] },
          colors: ['#437252'],
          plotOptions: {
            bar: {
            borderRadius: 10, // Ubah nilai sesuai kebutuhan
            horizontal: false // Mengatur jika Anda ingin chart bar ditampilkan secara vertikal
            }
        }
        });
      
        // Chart: Top Kurir
        renderChart("#chart-top-kurir", {
          series: [{ data: [20, 10, 15, 30] }],
          chart: { type: 'bar' },
          xaxis: { categories: ['Asep', 'Iwan', 'Agus', 'Budi'] },
          colors: ['#437252'],
          plotOptions: {
            bar: {
            borderRadius: 10, // Ubah nilai sesuai kebutuhan
            horizontal: false // Mengatur jika Anda ingin chart bar ditampilkan secara vertikal
            }
        }
        });
      
        // Chart: Total Sampah Terkumpul
        renderChart("#chart-total-sampah", {
          series: [70, 50, 30],
          chart: { type: 'radialBar' },
          labels: ['Laptop', 'Televisi', 'Smartwatch']
        });
      
        // Chart: Total Sampah Tiap Daerah
        renderChart("#chart-daerah", {
        series: [{ data: [38, 40, 23.3, 15.4, 28, 10] }], // Data dalam persen
        chart: {
            type: 'radar',
            width: '100%', // Mengatur lebar chart
            height: '400px' // Mengatur tinggi chart
        },
        labels: ['Cibiru', 'Cileunyi', 'Sarijadi', 'Sukagalih', 'Setiabudi', 'Arab'],
        stroke: {
            width: 2,
            colors: ['#437252']
        },
        fill: {
            opacity: 0.4
        },
        markers: {
            size: 4,
        },
        yaxis: {
            max: 50, // Mengatur nilai maksimum pada sumbu Y ke 100
            labels: {
                formatter: function(value) {
                    return value + "%"; // Menambahkan tanda persen di label
                }
            }
        }
    });

      </script>
@endsection
