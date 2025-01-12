@extends('layouts.main-manajemen')

@section('content')
    {{-- Container Utama --}}
<div class="container max-w-full px-4 mx-auto bg-gray-100">
    <div class="py-8 ">
        {{-- Section Judul --}}
        <h2 class="text-xl font-semibold leading-relaxed ml-14">Dashboard Manajemen</h2>
        <h4 class="text-base font-normal ml-14">Selamat datang di dashboard Manajemen.</h4>

        {{-- Card Section --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 px-12 bg-white">
            {{-- Card Total Sampah Terkumpul --}}
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2">
                <i class="fa-solid fa-recycle text-3xl text-[#437252]"></i>
                <div class="text-start">
                    <h5 class="text-gray-600 font-semibold">Total Sampah Terkumpul</h5>
                    <p class="text-2xl font-bold">{{ number_format($totalSampah, 0) }} Kg</p>
                </div>                              
            </div>

            {{-- Card Total Poin Terkumpul --}}
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2">
                <i class="fa-solid fa-coins text-green text-3xl"></i>
                <div class="text-start">
                    <h5 class="text-gray-600 font-semibold">Total Poin Terkumpul</h5>
                    <p class="text-2xl font-bold">{{ number_format($totalPoin, 0) }} Poin</p>
                </div>
            </div>

            {{-- Card Masyarakat Yang Terdaftar
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2">
                <i class="fa-solid fa-users text-[#437252] text-3xl"></i>
                <div class="text-start">
                    <h5 class="text-gray-600 font-semibold">Masyarakat Yang Terdaftar</h5>
                    {{-- <p class="text-2xl font-bold">1019</p> --}}
                    {{-- <p class="text-2xl font-bold">{{ number_format($terdaftar, 0) }} orang</p> --}}
                {{-- </div> --}}
            {{-- </div> --}}

            {{-- Card Transaksi Terselesaikan --}}
            <button class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-start space-y-2 cursor-pointer hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                <i class="fa-solid fa-clipboard-list text-3xl text-[#437252]"></i>
                <div class="text-start">
                    <a href="riwayat">
                    <h5 class="text-gray-600 font-semibold">Transaksi Terselesaikan</h5>
                    
                    {{-- <p class="text-2xl font-bold">5362</p> --}}
                    <p class="text-2xl font-bold">{{ number_format($riwayat, 0) }} transaksi</p>
                </a>
                </div>
            </button>
        </div>
    </div>

            {{-- Chart --}}
            <div class="px-12 mt-8 ">
                <div class=" mx-auto  grid gap-6">
                    <!-- Baris 1: 2 Kolom -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Chart: Top Masyarakat -->
                        <button class="bg-white p-4 rounded-lg shadow-md text-left  hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]" >
                            <a href="top-10?tab=masyarakat">
                            <h2 class="absolute text-lg font-bold ">Top Masyarakat</h2>
                            <div id="chart-top-masyarakat" class="relative w-[400px] h-[400px] mt-10"></div> <!-- Set height di sini -->
                        </a>
                        </button>

                        <!-- Chart: Top Kurir -->
                        <button class="bg-white p-4 rounded-lg shadow-md text-left hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                            <a href="top-10?tab=kurir">
                            <h2 class="absolute text-lg font-bold ">Top Kurir</h2>
                            <div id="chart-top-kurir" class="relative w-[400px] h-[400px] mt-10"></div> <!-- Set height di sini -->
                        </a>
                        </button>
                        {{-- Chart:Top Jenis Sampah --}}
                        <button class="bg-white p-4 rounded-lg shadow-md text-left hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                            <a href="top-10?tab=jenis-sampah">
                            <h2 class="absolute text-lg font-bold ">Top Jenis Sampah</h2>
                            <div id="chart-total-sampah" class="relative w-[400px] h-[400px] mt-10"></div> <!-- Set height di sini -->
                            </a>
                        </button>


                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-6">
                    <!-- Chart: Total Sampah Tiap Daerah -->
                    <button class="bg-white p-2 rounded-lg shadow-md text-left hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                        <a href="per-daerah">
                            <h2 class="text-lg font-bold mb-2">Total Sampah Terkumpul Tiap Daerah</h2>
                            <div id="chart-daerah" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
                        </a>
                    </button>

                        <!-- Chart: Top Jenis Sampah -->
                        <button class="bg-white p-4 rounded-lg shadow-md text-left w-full hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                            {{-- <a href="kategori">
                                <h2 class="relative text-lg font-bold mb-2 top-0">Top Sampah per Kategori</h2> <!-- Menambahkan top-0 untuk menempatkan di atas -->
                                <p class="text-sm text-gray-500 mb-4">Berdasarkan Kategori</p>
                        
                                <div class="space-y-6">
                                    <!-- Handphone -->
                                    <div class="flex items-center space-x-4 ml-10">
                                        <i class="fa-solid fa-mobile-screen-button text-3xl text-gray-700 flex-shrink-0"></i>
                                        <div class="w-3/4">
                                            <div class="flex justify-between items-center">
                                                <span class="text-lg font-medium ml-2">Lampu</span>
                                                <span class="text-lg font-medium">80%</span>
                                            </div>
                                            <div class="w-full bg-gray-300 h-2 rounded-full mt-1 ml-2">
                                                <div class="bg-[#437252] h-2 rounded-full" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- Laptop -->
                                    <div class="flex items-center space-x-4 ml-10">
                                        <i class="fa-solid fa-laptop text-2xl text-gray-700 flex-shrink-0"></i>
                                        <div class="w-3/4">
                                            <div class="flex justify-between items-center">
                                                <span class="text-lg font-medium">Layar dan Monitor</span>
                                                <span class="text-lg font-medium">60%</span>
                                            </div>
                                            <div class="w-full bg-gray-300 h-2 rounded-full mt-1">
                                                <div class="bg-[#437252] h-2 rounded-full" style="width: 60%;"></div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- Televisi -->
                                    <div class="flex items-center space-x-4 ml-10">
                                        <i class="fa-solid fa-tv text-2xl text-gray-700 flex-shrink-0"></i>
                                        <div class="w-3/4">
                                            <div class="flex justify-between items-center">
                                                <span class="text-lg font-medium">Peralat Besar</span>
                                                <span class="text-lg font-medium">30%</span>
                                            </div>
                                            <div class="w-full bg-gray-300 h-2 rounded-full mt-1">
                                                <div class="bg-[#437252] h-2 rounded-full" style="width: 30%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a> --}}

                            <a href="kategori">
                                <h2 class="relative text-lg font-bold mb-2 top-0">Top Sampah per Kategori</h2>
                                <p class="text-sm text-gray-500 mb-4">Berdasarkan Kategori</p>

                                <div class="space-y-6">
                                    @foreach ($categories as $category)
                                        <div class="flex items-center space-x-4 ml-10">
                                            <i class="fa-solid fa-box text-3xl text-gray-700 flex-shrink-0"></i> <!-- Ikon kategori -->
                                            <div class="w-3/4">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-lg font-medium ml-2">{{ $category['nama_kategori'] }}</span>
                                                    <span class="text-lg font-medium">{{ $category['persentase'] }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-300 h-2 rounded-full mt-1 ml-2">
                                                    <div class="bg-[#437252] h-2 rounded-full" style="width: {{ $category['persentase'] }}%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </a>
                        </button>

                    {{-- Chart: Dropbox sampah --}}
                    <button class="bg-white p-4 rounded-lg shadow-md text-left hover:bg-[#e2ede0] focus:outline-none focus:ring-2 focus:ring-[#437252]">
                        <a href="dropbox">
                            <h2 class="text-lg font-bold mb-2">Dropbox</h2>
                            <div class="max-w-lg mx-auto p-6">
                                <canvas id="doughnutChart" width="400" height="400"></canvas>
                            </div> <!-- Set height di sini -->
                        </a>
                    </button>
                        
                    </div>
                </div>
            </div>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.0.0/dist/echarts.min.js"></script>


    <script>
        const renderChart = (selector, options) => {
          const chart = new ApexCharts(document.querySelector(selector), options);
          chart.render();
        };

        // Chart: Top Masyarakat
        renderChart("#chart-top-masyarakat", {
          series: [{ data: [10, 15, 20] }],
          chart: { type: 'bar' },
          xaxis: { categories: ['Aaliyah', 'Kim', 'Isa',] },
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
          series: [{ data: [20, 10, 15] }],
          chart: { type: 'bar' },
          xaxis: { categories: ['Asep', 'Iwan', 'Agus',] },
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
        document.addEventListener('DOMContentLoaded', function () {
            renderChart("#chart-daerah", {
                series: [{
                    data: @json($topDaerah->pluck('total_berat_sampah')->map(fn($val) => round($val, 2))),
                }],
                chart: {
                    type: 'radar',
                    width: '100%',
                    height: '400px',
                },
                labels: @json($topDaerah->pluck('nama_daerah')),
                stroke: {
                    width: 2,
                    colors: ['#437252'],
                },
                fill: {
                    opacity: 0.4,
                },
                markers: {
                    size: 4,
                },
                yaxis: {
                max: 100, // Pastikan ini mencakup data maksimum kamu
                labels: {
                    formatter: function(value) {
                        return value + "%"; // Menambahkan tanda persen di label
                        },
                    },
                },
            });
        });

    // Chart Dropbox
    const ctx = document.getElementById('doughnutChart').getContext('2d');

    // Data dari controller
    const labels = @json($topDropbox->pluck('nama_dropbox'));
    const data = @json($topDropbox->pluck('total_berat_sampah'));

    const doughnutData = {
        labels: labels,
        datasets: [{
            label: 'Total Berat Sampah',
            data: data,
            backgroundColor: [
                '#4CAF50', // Hijau
                '#FFC107', // Kuning
                '#2196F3', // Biru
                '#FF5722'  // Oranye
            ],
            hoverOffset: 4
        }]
    };

    const doughnutConfig = {
        type: 'doughnut',
        data: doughnutData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    };

    const doughnutChart = new Chart(ctx, doughnutConfig);

      </script>
@endsection
