<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('buku.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="kode_buku">Kode Buku</label>
                                <input type="text" class="form-control @error('kode_buku') is-invalid @enderror"
                                    name="kode_buku" value="{{ old('kode_buku') }}" required>

                                <!-- error message untuk kode_buku -->
                                @error('kode_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ old('judul') }}" required>

                                <!-- error message untuk judul -->
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori ID</label>
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror"
                                    value="{{ old('kategori_id') }}" required>
                                    <option value="0">Pilih Kategori</option>
                                    @foreach ($bukus as $buku)
                                        <option value="{{ $buku->id }}">{{ $buku->kode_kategori }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk kategori_id -->
                                @error('kategori_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="penerbit">Penerbit ID</label>
                                <select name="penerbit_id" class="form-control @error('penerbit_id') is-invalid @enderror"
                                    value="{{ old('penerbit_id') }}" required>
                                    <option value="0">Pilih Penerbit</option>
                                    @foreach ($penerbits as $penerbit)
                                        <option value="{{ $penerbit->id }}">{{ $penerbit->kode_penerbit }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk penerbit_id -->
                                @error('penerbit_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror"
                                    name="isbn" value="{{ old('isbn') }}" required>

                                <!-- error message untuk isbn -->
                                @error('isbn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control @error('pengarang') is-invalid @enderror"
                                    name="pengarang" value="{{ old('pengarang') }}" required>

                                <!-- error message untuk pengarang -->
                                @error('pengarang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                                <input type="text" class="form-control @error('jumlah_halaman') is-invalid @enderror"
                                    name="jumlah_halaman" value="{{ old('jumlah_halaman') }}" required>

                                <!-- error message untuk jumlah_halaman -->
                                @error('jumlah_halaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror"
                                    name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>

                                <!-- error message untuk tahun_terbit -->
                                @error('tahun_terbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sinopsis">Sinopsis</label>
                                <input type="text" class="form-control @error('sinopsis') is-invalid @enderror"
                                    name="sinopsis" value="{{ old('sinopsis') }}" required>

                                <!-- error message untuk sinopsis -->
                                @error('sinopsis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="text" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar" value="{{ old('gambar') }}" required>

                                <!-- error message untuk gambar -->
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
</body>

</html>
