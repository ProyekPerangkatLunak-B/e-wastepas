<div class="px-12 mt-8">
    <div class="container mx-auto p-6 grid gap-6">
        <!-- Baris 1: 2 Kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Chart: Top Masyarakat -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-2">Top Masyarakat</h2>
                <div id="chart-top-masyarakat" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
            </div>
          
            <!-- Chart: Top Kurir -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-2">Top Kurir</h2>
                <div id="chart-top-kurir" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
            </div>
        </div>
      
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Chart: Total Sampah Terkumpul -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-2">Total Sampah Terkumpul</h2>
                <div id="chart-total-sampah" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
            </div>
          
        <!-- Chart: Total Sampah Tiap Daerah -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-bold mb-2">Total Sampah Terkumpul Tiap Daerah</h2>
            <div id="chart-daerah" class="w-full" style="height: 300px;"></div> <!-- Set height di sini -->
            <!-- Elemen untuk menampilkan persentase di bawah chart -->
            <div id="percentage-labels" class="mt-2 flex justify-between"></div>
        </div>

          
            <!-- Chart: Top Jenis Sampah -->
            <div class="bg-white p-6 rounded-lg shadow-md w-full" >
                <h2 class="text-lg font-bold mb-2">Top Jenis Sampah</h2>
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
            </div>
        </div>
    </div>
</div>
