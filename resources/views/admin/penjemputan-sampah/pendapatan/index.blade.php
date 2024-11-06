@extends('layouts.main-admin-penjemputan-sampah')

@section('content')
    {{-- Container Utama --}}
    <div class="container max-w-full px-16 mx-auto bg-gray-100">
        <div class=" py-4">
            {{-- Tabs --}}
            
                <a href="{{ route('admin.penjemputan-sampah.pendapatan.index') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/pendapatan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-white px-20 mb-10 rounded-xl font-bold text-center  py-2  ml-5 border-green-400 border-2">Total Sampah</button>      
                 </a>
                
                <a href="{{ route('admin.penjemputan-sampah.pendapatan.total-poin') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/pendapatan/total-poin') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-white px-20 rounded-xl font-bold text-center  py-2 ml-5 ">Total Poin</button>      
                 </a>
            

            {{-- Table --}}
            <div class="  grid grid-cols-3">
                <table class=" bg-white  col-span-2 border-green-400 border rounded-xl">
                    <thead>
                        <tr class="text-gray-500 font-medium">
                            <th class="p-4 text-center border-b">Total sampah elektronik yang didapat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (range(1, 10) as $i) 
                            <tr class="border-b ">
                                <td class="p-4 text-gray-700 text-left">Nama Sampah {{ $i }}</td>
                                <td class="py-2">
                                    <span class="bg-green-300 font-normal px-10 py-2 text-center rounded-xl">+20</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
