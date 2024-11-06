<form action="{{ route('otp.send') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Send OTP</button>
</form>

@if(session('message'))
    <p>{{ session('message') }}</p>
@endif
@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<form action="{{ route('otp.send') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Send OTP</button>
</form>

<form action="{{ route('otp.verify') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="text" name="otp" placeholder="Enter your OTP" required>
    <button type="submit">Verify OTP</button>
</form>
