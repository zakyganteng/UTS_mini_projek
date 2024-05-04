<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-danger">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi bi-balloon-heart"></i> Zaky</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-6 col-md-auto"><a href="{{ route('Barang.index') }}" class="nav-link">Barang List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3    ">
                <img src="{{ Vite::asset('resources/images/img_1.jpg') }}" class="img-fluid" alt="Foto Profil" style="width: 300px; height: auto; right: 90px;">
            </div>
            <div class="col-md-8">
                <h2>Biodata</h2>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Nama:</strong> M Zaky Aulia D</li>
                    <li class="list-group-item"><strong>Umur:</strong> 21 tahun</li>
                    <li class="list-group-item"><strong>Alamat:</strong> Sidoarjo</li>
                    <li class="list-group-item"><strong>Pekerjaan:</strong> Mahasiswa</li>
                    <li class="list-group-item"><strong>Email:</strong> tiogery712@gmail..com </li>
                </ul>
            </div>
        </div>
    </div>


    @vite('resources/js/app.js')
</body>
</html>
