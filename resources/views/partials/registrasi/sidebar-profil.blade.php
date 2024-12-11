<div class="fixed inset-y-0 left-0 w-[22rem] bg-dark z-0 border-r border-gray-200 overflow-y-auto">
    <div class="p-6">
        <div class="flex items-center mb-6">
            <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo" class="w-12 h-12">
            <a href="{{ route('masyarakat.penjemputan.index') }}">
                <h1 class="ml-4 text-2xl font-bold text-green-500">E-WastePas</h1>
            </a>
        </div>
        <hr class="mb-4 border-t-2 border-gray-200">

        {{-- Masyarakat Section --}}
        <nav>
            <div class="flex mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill-lock text-secondary-normal" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
              </svg>
            <h2 class="mb-4 ml-2 font-bold text-md text-secondary-normal">Masyarakat</h2>
        </div>
            <ul class="space-y-4">
                <li>
                    <a href=""
                        class="flex items-center justify-between p-3 text-sm bg-gray-100 font-semibold border rounded-2xl border-green-400 text-gray-700 hover:bg-gray-100 hover:text-green-600">
                        Profil
                        <span class="text-gray-400" ></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
