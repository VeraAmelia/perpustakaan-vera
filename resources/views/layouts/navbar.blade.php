<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('anggota.index') }}">Anggota <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('buku.index') }}">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kategori.index') }}">kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('penerbit.index') }}">Penerbit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('peminjaman.index') }}">Peminjaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pengembalian.index') }}">Pengembalian</a>
          </li>
      </ul>
    </div>
  </nav>