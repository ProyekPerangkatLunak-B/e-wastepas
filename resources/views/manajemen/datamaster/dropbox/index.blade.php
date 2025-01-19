@extends('layouts.main-manajemen')

@section('content')

<div class="min-h-screen mx-auto bg-gray-100 w-full ">   
    <div class="py-8">
        <div class="flex justify-between items-center ml-24 mb-6">
            {{-- Section Judul --}}
            <div>
                <h2 class="text-2xl font-semibold leading-relaxed">Total Sampah Terkumpul per Dropbox</h2>
                <h4 class="text-base font-normal mb-10">Daftar total sampah terkumpul per dropbox</h4>
            </div>
            
            {{-- Form Pencarian dan Filter --}}
            <div class="mr-10">
                <form method="GET" action="{{ route('manajemen.datamaster.dropbox.index') }}" class="flex items-center space-x-4" id="search-form" autocomplete="off">
                    <!-- Kolom Pencarian -->
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request()->input('search') }}" 
                        placeholder="Cari Dropbox..." 
                        class="px-4 py-2 border rounded-md text-sm" 
                        id="search-input" 
                        autocomplete="off" 
                    >

                    <!-- Filter Dropdown -->
                    <select name="filter" class="px-4 py-2 border rounded-md text-sm">
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @if($results->isNotEmpty())
                    @foreach($results as $result)
                        <x-dropbox-card
                            :image="'https://picsum.photos/720/720'"
                            :nama_dropbox="$result->nama_dropbox"
                            :berat="number_format($result->total_berat_sampah, 1)" {{-- Sesuaikan format desimal --}}
                            :poin="number_format($result->total_poin, 0)"
                        />
                    @endforeach
                @else
                <p></p>
                <div class="flex flex-col justify-center items-center">
                    <div>
                        <p>Tidak Ada Data Ditemukan</p>
                    </div>
                    <div class="flex justify-center w-full">
                        <button class="bg-green-400 border rounded-lg w-full">
                            <a href="{{ route('manajemen.datamaster.dropbox.index') }}" class="text-center">Kembali</a>
                        </button>
                    </div>
                </div>
                
                
                @endif
            </div>

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center space-x-4">
                {{-- Previous Button --}}
                @if($results->currentPage() > 1)
                    <a href="{{ $results->previousPageUrl() }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Previous</a>
                @else
                    <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">Previous</span>
                @endif

                {{-- Page Numbers --}}
                @for ($i = 1; $i <= $results->lastPage(); $i++)
                    <a href="{{ $results->url($i) }}" class="px-4 py-2 {{ $i == $results->currentPage() ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-800' }} rounded-md">
                        {{ $i }}
                    </a>
                @endfor

                {{-- Next Button --}}
                @if($results->hasMorePages())
                    <a href="{{ $results->nextPageUrl() }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Next</a>
                @else
                    <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">Next</span>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('search-input').addEventListener('keydown', function(event) {
    // Cek jika tombol yang ditekan adalah Enter (kode 13)
    if (event.key === 'Enter') {
        event.preventDefault(); // Mencegah form dikirim saat menekan Enter (default behavior)

        const query = this.value; // Ambil nilai input pencarian
        const filter = document.querySelector('select[name="filter"]').value; // Ambil nilai filter

        // Membuat query string
        const queryParams = new URLSearchParams();
        if (query) queryParams.append('search', query);
        if (filter) queryParams.append('filter', filter);

        // Update URL dengan query baru
        window.history.pushState({}, '', '?' + queryParams.toString());

        // Kirimkan form
        document.getElementById('search-form').submit();
    }
});


    // Menangani perubahan pada dropdown filter
    document.querySelector('select[name="filter"]').addEventListener('change', function() {
        const query = document.getElementById('search-input').value; // Ambil nilai input pencarian
        const filter = this.value; // Ambil nilai filter

        // Membuat query string
        const queryParams = new URLSearchParams();
        if (query) queryParams.append('search', query);
        if (filter) queryParams.append('filter', filter);

        // Update URL dengan query baru
        window.history.pushState({}, '', '?' + queryParams.toString());

        // Kirimkan form jika filter diubah
        document.getElementById('search-form').submit();
    });

</script>

@endsection
