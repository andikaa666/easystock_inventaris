<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Peminjaman Barang</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>
<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include('layouts.nav.sidebar')

      <div class="layout-page">
        @include('layouts.nav.nav')

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card p-4 shadow-sm">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Edit Peminjaman Barang</h4>
                <a href="{{ route('peminjamanB.index') }}" class="btn btn-sm btn-outline-secondary">← Kembali</a>
              </div>

              <form action="{{ route('peminjamanB.update', $peminjamanB->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Peminjam -->
                <div class="mb-3">
                  <label for="nama_peminjam" class="form-label fw-semibold">Nama Peminjam</label>
                  <input type="text" id="nama_peminjam" name="nama_peminjam"
                    class="form-control" required
                    value="{{ old('nama_peminjam', $peminjamanB->nama_peminjam) }}">
                </div>

                <!-- Tanggal -->
                <div class="mb-3">
                  <label for="tanggal_peminjaman" class="form-label fw-semibold">Tanggal Peminjaman</label>
                  <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                    class="form-control" required
                    value="{{ old('tanggal_peminjaman', $peminjamanB->tanggal_peminjaman) }}">
                </div>

                <!-- Jumlah -->
                <div class="mb-3">
                  <label for="jumlah_barang" class="form-label fw-semibold">Jumlah Barang</label>
                  <input type="number" id="jumlah_barang" name="jumlah_barang"
                    class="form-control" min="1" required
                    value="{{ old('jumlah_barang', $peminjamanB->jumlah_barang) }}">
                </div>

                <!-- Barang -->
                <div class="mb-4">
                  <label for="id_barang" class="form-label fw-semibold">Barang</label>
                  <select id="id_barang" name="id_barang" class="form-select" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $b)
                      <option value="{{ $b->id }}" {{ $b->id == $peminjamanB->id_barang ? 'selected' : '' }}>
                        {{ $b->nama_barang }} (Stok: {{ $b->stok }})
                      </option>
                    @endforeach
                  </select>
                </div>

                <!-- Tombol -->
                <div class="d-grid">
                  <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
