@extends('manajemen.registrasi.app')

@section('title', 'Data Total Sampah')

@section('content')
<div class="flex min-h-screen bg-white">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-white p-6 shadow-md">
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo E-WastePas" class="w-12 h-12 mb-2">
            <h1 class="text-xl font-bold text-green-700">E-WastePas</h1>
        </div>
        <nav>
            <ul>
                <li class="mb-4">
                    <div class="flex items-center justify-between p-2 border rounded-lg text-black hover:bg-gray-200">
                        <span class="font-semibold">Kategori Sampah Elektronik</span>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="flex items-center justify-between p-2 border rounded-lg text-black hover:bg-gray-200">
                        <span class="font-semibold">Mengajukan Permintaan Penjemputan</span>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="flex items-center justify-between p-2 border rounded-lg text-black hover:bg-gray-200">
                        <span class="font-semibold">Melacak Penjemputan</span>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="flex items-center justify-between p-2 border rounded-lg bg-green-100 text-black">
                        <span class="font-semibold">Total Sampah</span>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="flex items-center justify-between p-2 border rounded-lg text-black hover:bg-gray-200">
                        <span class="font-semibold">Riwayat Penjemputan</span>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 bg-white">
        <!-- Header -->
        <div class="flex justify-between items-center bg-white px-6 py-4 border-b border-gray-300">
            <h2 class="text-lg font-bold"></h2>
            <div class="flex items-center">
                <span class="mr-3 font-medium text-gray-700">Beyonce Kumalasari</span>
                <img src="{{ asset('images/profile-placeholder.jpg') }}" alt="User Photo" class="w-8 h-8 rounded-full">
            </div>
        </div>

        <div class="p-10">
            <!-- Content Header -->
            <div class="mb-6">
                <h3 class="text-xl font-bold">Data Total Sampah tiap Daerah</h3>
                <p class="text-gray-600">Daftar jenis sampah elektronik dari kategori yang dapat dijemput.</p>
            </div>

            <!-- Main Content Sections -->
            <div class="grid grid-cols-3 gap-6">
                <!-- Radar Chart -->
                <div class="bg-white shadow p-4 rounded-lg col-span-2 border border-gray-300">
                    <h3 class="text-lg font-bold mb-2">Total Sampah Per Tahun 2024</h3>
                    <canvas id="radarChart"></canvas>
                </div>

                <!-- Data Berdasarkan Daerah -->
                <div class="bg-white shadow p-4 rounded-lg border border-gray-300">
                    <h3 class="text-lg font-bold mb-2">Data Total Sampah Berdasarkan Daerah</h3>
                    <ul class="space-y-2">
                        <li>Cikutra - 40%</li>
                        <li>Cileunyi - 38%</li>
                        <li>Cibiru - 38%</li>
                        <li>Sarijadi - 23.3%</li>
                        <li>Sukajadi - 23.3%</li>
                        <li>Sukagalih - 15.4%</li>
                    </ul>
                </div>
            </div>

            <!-- Table Section -->
            <div class="mt-8 bg-white shadow p-4 rounded-lg border border-gray-300">
                <h3 class="text-lg font-bold mb-2">Jenis dan Kategori Sampah Yang Dapat Dijemput</h3>
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border p-2 text-left bg-gray-200">Jenis Sampah</th>
                            <th class="border p-2 text-left bg-gray-200">Kategori Sampah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-2">Perangkat Komputer</td>
                            <td class="border p-2">Komputer Desktop</td>
                        </tr>
                        <tr>
                            <td class="border p-2">Perangkat Komunikasi</td>
                            <td class="border p-2">Telepon Seluler</td>
                        </tr>
                        <tr>
                            <td class="border p-2">Perangkat Audio-Visual</td>
                            <td class="border p-2">Radio</td>
                        </tr>
                        <tr>
                            <td class="border p-2">Peralatan Elektronik Kecil</td>
                            <td class="border p-2">Kalkulator</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('radarChart').getContext('2d');
    const radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Cikutra', 'Cileunyi', 'Cibiru', 'Sarijadi', 'Sukajadi', 'Sukagalih'],
            datasets: [{
                label: 'Persentase Sampah',
                data: [40, 38, 38, 23.3, 23.3, 15.4],
                backgroundColor: 'rgba(72, 187, 120, 0.2)',
                borderColor: 'rgba(72, 187, 120, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                r: {
                    beginAtZero: true,
                    max: 50
                }
            }
        }
    });
</script>
@endsection
