@extends('main')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Mengajukan Permintaan Penjemputan</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Form permintaan untuk permintaan penjemputan sampah elektronik.</h4>
            </div>

            {{-- navbar underline form pengajuan _ --}}
            <div class="flex items-center justify-between w-1/2 mt-4 bg-white rounded-lg ml-14 mr-14">
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-sm font-medium text-gray-700 border-b-2 border-green-500">Form Pengajuan</a>    
                </div>
                {{-- Form section --}}

            </div>
        </div>
    </div>
@endsection