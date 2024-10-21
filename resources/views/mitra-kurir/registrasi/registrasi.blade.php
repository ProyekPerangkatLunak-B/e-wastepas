<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Mitra Kurir</title>
</head>
<body>
    <h1>
        Registrasi
    </h1>
    <div>  
       <form action="/registrasi" method="POST">
        @csrf
        <label for="nama">Nama Lengkap</label><br>
        <input type="text" name="nama" id="namaF"><br>
        
        <label for="nomor KTP">No KTP</label><br>
        <input type="text" name="KTP" id="ktpF"><br>
        
        <label for="email">Email</label><br>
        <input type="email" name="Email" id="emailF"><br>
        
        <label for="Nomor HP">Nomor HP</label><br>
        <input type="text" name="NomorHP" id="noHpF"><br>
        
        <label for="password">Password</label><br>
        <input type="password" name="password" id="passwordF"><br>
        
        <label for="ulangiPassword">Ulangi Password</label><br>
        <input type="password" name="ulangiPassword" id="ulangiPasswordF"><br><br>
        
        <button type="submit">Registrasi</button>
       </form>
    </div>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>