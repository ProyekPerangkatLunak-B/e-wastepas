@extends('layouts.main-manajemen')

@section('content')

<div class="min-h-screen mx-auto bg-gray-100 w-full ">   
    <div class="py-8">
        {{-- Section Judul --}}
        <h2 class="text-xl font-semibold leading-relaxed ml-24">Layar Dan Monitor</h2>
        <h4 class="text-base font-normal ml-24">Daftar jenis sampah dan total poin per kategori</h4>
        <div class="px-12 pb-6 mt-4">
            <!-- Baris Pertama: 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <x-card-jenis
                    image="https://s3-alpha-sig.figma.com/img/fc66/304d/765acd835e93bc375a7210b475feeefe?Expires=1734307200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=mBKNflc2zZrsaOAhxKokrknem-pEXn8fFM0al6wuZMPnvNxo29HmY5kCi4wuJzEwqfvrPfUEldywrKTF8-3J7x9qeLrAKxtUgQqVhNpOE6fCTl9t1pKFataATYjvjS-bGGewQdjliOV-htFLm2sZer4V4wYoGNU51KDZW8IgxxM41v-mUDrEpYMQeq~MUNdx2bEsp6t2VZnl9SeUQ6Fud9jRaNiAPBDxg9Y-WjlTSp20zfMJgWhslNhpnWCn6cPJpJ8H3x2036iaMqDDJ6CtDJ8kGvSvVnqh7bgEDE4EWNPlXZRe6Fb-LdC5-TuiFdZOcbEra-dDhBbtepCg~~sTlQ__"
                    title="Laptop"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="37.932"
                    poin="10.019" />
                <x-card-jenis
                    image="https://picsum.photos/720/720"
                    title="Monitor"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="20.000"
                    poin="11.378" />
                <x-card-jenis
                    image="https://picsum.photos/720/720"
                    title="Notebook"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="30.000"
                    poin="19.374" />
                <x-card-jenis
                    image="https://picsum.photos/720/720"
                    title="Tablet"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="39.374"
                    poin="47.293" />
                <x-card-jenis
                    image="https://picsum.photos/720/720"
                    title="Televisi"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="54.952"
                    poin="60.364" />

        </div>
        

    </div>
</div>

@endsection
