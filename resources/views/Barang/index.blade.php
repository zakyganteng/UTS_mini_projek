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
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('Barang.index') }}" class="nav-link active">Barang List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('Barang.create') }}" class="btn btn-primary">Create Barang</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Barang as $Barang)
                        <tr>
                            <td>{{ $Barang->KodeBarang }}</td>
                            <td>{{ $Barang->NamaBarang }}</td>
                            <td>{{ $Barang->Qty }}</td>
                            <td>{{ $Barang->Harga }}</td>
                            <td>{{ $Barang->satuan_name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('Barang.show', ['Barang' => $Barang->Barang_id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i
                                            class="bi-person-lines-fill"></i></a>
                                    <a href="{{ route('Barang.edit', ['Barang' => $Barang->Barang_id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                                    <div>
                                        <form
                                            action="{{ route('Barang.destroy', ['Barang' => $Barang->Barang_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i
                                                    class="bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
