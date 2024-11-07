<div class="flex justify-center">
    <div class="flex gap-2 sm:gap-4">
        @for ($i = 1; $i <= 4; $i++)
            <input id="otp{{ $i }}" name="otp{{ $i }}" type="text" maxlength="1"  
                class="w-14 sm:w-20 md:w-24 lg:w-28
                       h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
                hover:scale-105">
        @endfor
    </div>
</div>

<!-- Script untuk handling OTP input -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = Array.from({ length: 4 }, (_, i) => document.getElementById(`otp${i + 1}`));
        
        inputs.forEach((input, index) => {
            // Handle input
            input.addEventListener('input', function(e) {
                if (e.target.value.length === 1) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
            });
    
            // Handle backspace
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
    
            // Handle paste
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text').slice(0, 4);
                
                pasteData.split('').forEach((char, i) => {
                    if (inputs[i]) {
                        inputs[i].value = char;
                        if (i < inputs.length - 1) {
                            inputs[i + 1].focus();
                        }
                    }
                });
            });
        });
    });
    </script>