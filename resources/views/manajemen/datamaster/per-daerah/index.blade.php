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

            <div class="mt-8 flex justify-center space-x-4">
                {{-- Previous Button --}}
                @if($currentPage > 1)
                    <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Previous</a>
                @else
                    <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">Previous</span>
                @endif
            
                {{-- Page Numbers --}}
                @for ($i = 1; $i <= min($totalPages, 2); $i++) 
                    <a href="{{ url()->current() }}?page={{ $i }}" class="px-4 py-2 {{ $i == $currentPage ? 'bg-[#E2EDE0] text-white' : 'bg-gray-300 text-gray-800' }} rounded-md">
                        {{ $i }}
                    </a>
                @endfor
            
                {{-- Next Button --}}
                @if($currentPage < $totalPages)
                    <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Next</a>
                @else
                    <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">Next</span>
                @endif
            </div>
            
        </div>
    </div>
</div>

@endsection
