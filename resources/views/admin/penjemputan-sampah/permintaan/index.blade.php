@extends('layouts.main-admin-penjemputan-sampah')

@section('content')
    {{-- Container Utama --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-1">
            {{-- Section Judul --}}
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Permintaan Penjemputan Sampah</h2>
            <h4 class="text-base font-normal ml-14">Daftar permintaan penjemputan sampah elektronik</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8 px-12">
            <!-- Card -->
                <div class="bg-white pt-6 pb-6 mx-8 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-gray-600 text-xs font-extralight text-center mb-2">Jarak</h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-4 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-gray-400 text-white rounded-xl font-bold text-center px-10 py-1">Detail</button>
                        
                    </a>
               
                </div>

                <div class="bg-white pt-6 pb-6 mx-8 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-gray-600 text-xs font-extralight text-center mb-2">Jarak</h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-4 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <button class="bg-gray-400 text-white rounded-xl font-bold text-center px-10 py-1">Detail</button>
                </div>

                <div class="bg-white pt-6 pb-6 mx-8 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-gray-600 text-xs font-extralight text-center mb-2">Jarak</h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-4 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <button class="bg-gray-400 text-white rounded-xl font-bold text-center px-10 py-1">Detail</button>
                </div>

                <div class="bg-white pt-6 pb-6 mx-8 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-gray-600 text-xs font-extralight text-center mb-2">Jarak</h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-4 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <button class="bg-gray-400 text-white rounded-xl font-bold text-center px-10 py-1">Detail</button>
                </div>

                <div class="bg-white pt-6 pb-6 mx-8 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-gray-600 text-xs font-extralight text-center mb-2">Jarak</h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-4 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <button class="bg-gray-400 text-white rounded-xl font-bold text-center px-10 py-1">Detail</button>
                </div>

                <div class="bg-white pt-6 pb-6 mx-8 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-gray-600 text-xs font-extralight text-center mb-2">Jarak</h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-2 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-gray-100 text-gray-600 rounded-lg font-normal text-center text-sm mx-5 mb-4 px-5 py-1">Jenis Sampah<em class="pl-4"> Jumlah</em></h5>
                    <button class="bg-gray-400 text-white rounded-xl font-bold text-center px-10 py-1">Detail</button>
                </div>
                
            </div>


            
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
