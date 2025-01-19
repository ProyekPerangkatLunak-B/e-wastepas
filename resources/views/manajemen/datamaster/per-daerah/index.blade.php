@extends('layouts.main-manajemen')

@section('content')

<div class="min-h-screen mx-auto bg-gray-100 w-full">   
    <div class="py-8">
        <div class="flex justify-between items-center ml-24 mb-6">
            <div>
                {{-- Section Judul --}}
                <h2 class="text-2xl font-semibold leading-relaxed">Total Sampah Terkumpul per Daerah</h2>
                <h4 class="text-base font-normal mb-10">Daftar total sampah terkumpul per daerah</h4>
            </div>
            <div class="mr-10">
                <form method="GET" id="search-form" autocomplete="off" class="flex items-center space-x-4">
                    <!-- Kolom Pencarian -->
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request()->input('search') }}" 
                        placeholder="Cari Daerah..." 
                        class="px-4 py-2 border rounded-md text-sm" 
                        id="search-input" 
                        autocomplete="off" 
                    >
                
                    <!-- Filter Dropdown -->
                    <select name="filter" class="px-4 py-2 border rounded-md text-sm" id="filter-select">
                        <option value="">Filter Berdasarkan</option>
                        <option value="poin_tertinggi" {{ request()->input('filter') == 'poin_tertinggi' ? 'selected' : '' }}>Poin Tertinggi</option>
                        <option value="poin_terendah" {{ request()->input('filter') == 'poin_terendah' ? 'selected' : '' }}>Poin Terendah</option>
                        <option value="penjemputan_tertinggi" {{ request()->input('filter') == 'penjemputan_tertinggi' ? 'selected' : '' }}>Total Penjemputan Tertinggi</option>
                        <option value="penjemputan_terendah" {{ request()->input('filter') == 'penjemputan_terendah' ? 'selected' : '' }}>Total Penjemputan Terendah</option>
                    </select>                    
                </form>
            </div>
        </div>
        
        <div class="px-12 pb-6 mt-4">
            <!-- Baris Pertama: 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                @foreach($dataDaerah as $daerah)
                    <x-card-perdaerah
                        image="https://picsum.photos/720/720"
                        title="{{ $daerah->nama_daerah }}"            
                        link="#"
                        berat="{{ number_format($daerah->total_berat_sampah, 0) }}"
                        poin="{{ number_format($daerah->total_poin, 0) }}" />
                @endforeach
            </div>

      {{-- Pagination --}}
      <div class="flex justify-center mt-6">
        <div class="inline-flex gap-1">
          {{-- Tombol untuk move ke paling kiri --}}
          @if($currentPage > 1)
              <a href="{{ url()->current() }}?page=1" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md"><<</a>
          @else
              <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md"><<</span>
          @endif

          {{-- Tombol untuk move 1 page ke kiri --}}
          @if($currentPage > 1)
              <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md"><</a>
          @else
              <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md"><</span>
          @endif

          {{-- Nomor Halaman Saat Ini --}}
          <span class="px-4 py-2 bg-[#E2EDE0] text-white rounded-md">{{ $currentPage }}</span>

          {{-- Tombol untuk move 1 page ke kanan --}}
          @if($currentPage < $totalPages)
              <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">></a>
          @else
              <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">></span>
          @endif

          {{-- Tombol untuk move ke paling kanan --}}
          @if($currentPage < $totalPages)
              <a href="{{ url()->current() }}?page={{ $totalPages }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">>></a>
          @else
              <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">>></span>
          @endif
        </div>
      </div>
    </div>
</div>

<script>
    document.getElementById('search-form').addEventListener('change', function(event) {
        event.preventDefault();
        updateData();
    });

    // Update data for search and filter
    function updateData(page = 1) {
        const searchQuery = document.getElementById('search-input').value;
        const filterValue = document.getElementById('filter-select').value;

        fetch(`{{ route('manajemen.datamaster.per-daerah.index') }}?search=${searchQuery}&filter=${filterValue}&page=${page}`)
            .then(response => response.json())
            .then(data => {
                updateDataTable(data.data);
                updatePagination(data.currentPage, data.totalPages);
            })
            .catch(error => console.error('Error:', error));
    }

    // Update table content
    function updateDataTable(data) {
        const dataTable = document.getElementById('data-table'); // You might need to create this table or ensure it exists
        dataTable.innerHTML = ''; // Clear old data

        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `<td>${item.nama_daerah}</td><td>${item.total_poin}</td><td>${item.total_berat_sampah}</td>`;
            dataTable.appendChild(row);
        });
    }

    // Update pagination links
    function updatePagination(currentPage, totalPages) {
        const paginationContainer = document.getElementById('pagination-container'); // Make sure you have an element with this ID

        let paginationHtml = '';

        // Previous page link
        if (currentPage > 1) {
            paginationHtml += `<a href="javascript:void(0)" onclick="updateData(1)"><<</a>`;
            paginationHtml += `<a href="javascript:void(0)" onclick="updateData(${currentPage - 1})"><</a>`;
        } else {
            paginationHtml += `<span><<</span>`;
            paginationHtml += `<span><</span>`;
        }

        // Current page
        paginationHtml += `<span>${currentPage}</span>`;

        // Next page link
        if (currentPage < totalPages) {
            paginationHtml += `<a href="javascript:void(0)" onclick="updateData(${currentPage + 1})">></a>`;
            paginationHtml += `<a href="javascript:void(0)" onclick="updateData(${totalPages})">>></a>`;
        } else {
            paginationHtml += `<span>></span>`;
            paginationHtml += `<span>>></span>`;
        }

        paginationContainer.innerHTML = paginationHtml;
    }

    // Initialize the data loading
    updateData();
</script>


@endsection
