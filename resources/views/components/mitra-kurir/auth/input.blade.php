<div>
    <label for="{{ $id }}" class="block text-sm font-medium leading-7 text-gray-500 mt-2">{{ $label }}</label>
    <div class="mt-2 relative">
        <input 
            id="{{ $id }}" 
            name="{{ $name }}" 
            type="{{ $type }}" 
            placeholder="{{ $placeholder }}" 
            required 
            autofocus
            class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none  focus:bg-white {{ $type === 'password' ? 'pr-10' : '' }}"
        >
        @if($type === 'password')
            <button 
                type="button" 
                onclick="togglePassword('{{ $id }}')" 
                class="absolute inset-y-0 right-0 flex items-center pr-3"
            >
                <svg id="eye-open-{{ $id }}" class="h-5 w-5 text-gray-500 hidden" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" fill="currentColor"/>
                </svg>
                <svg id="eye-closed-{{ $id }}" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>
                </svg>
            </button>
        @endif
    </div>
</div>

<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const eyeOpen = document.getElementById(`eye-open-${inputId}`);
    const eyeClosed = document.getElementById(`eye-closed-${inputId}`);
    
    if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
    } else {
        input.type = 'password';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
    }
}
</script>
