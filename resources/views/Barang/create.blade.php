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


            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('Barang.index') }}"
                            class="nav-link">Barang List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                <a href="" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i> My
                    Profile</a>
            </div>
        </div>
    </nav>

    <div class="container-sm mt-5">
        <form action="{{ route('Barang.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Barang</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="KodeBarang" class="form-label">Kode Barang</label>
                            <input class="form-control" type="text" name="KodeBarang" id="KodeBarang" value=""
                                placeholder="Enter Kode Barang">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="NamaBarang" class="form-label">Nama Barang</label>
                            <input class="form-control" type="text" name="NamaBarang" id="NamaBarang" value=""
                                placeholder="Enter Nama Barang">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Qty" class="form-label">Qty</label>
                            <input class="form-control" type="text" name="Qty" id="Qty" value=""
                                placeholder="Enter Qty">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Harga" class="form-label">Harga</label>
                            <input class="form-control" type="text" name="Harga" id="Harga" value=""
                                placeholder="Enter Harga">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select name="position" id="position" class="form-select">
                                @foreach ($satuans as $position)
                                    <option value="{{ $position->id }}" {{ old('position') == $position->id ? 'selected' : '' }}>{{ $position->kode_satuan.' - '.$position->nama_satuan }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('Barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
