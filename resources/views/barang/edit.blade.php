<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Form Edit Barang</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" /> --}}
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" /> --}}
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
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
                    <h4 class="mb-0">Edit Barang</h4>
                    <a href="{{ route('barang.index') }}" class="btn btn-sm btn-outline-secondary">← Kembali</a>
                  </div>

                  <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Barang -->
                    <div class="mb-3">
                      <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
                      <input type="text" id="nama_barang" name="nama_barang"
                             class="form-control" required
                             value="{{ old('nama_barang', $barang->nama_barang) }}">
                    </div>

                    <!-- Stok -->
                    <div class="mb-3">
                      <label for="stok" class="form-label fw-semibold">Stok</label>
                      <input type="number" id="stok" name="stok"
                             class="form-control" min="1" required
                             value="{{ old('stok', $barang->stok) }}">
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-4">
                      <label for="keterangan_barang" class="form-label fw-semibold">Keterangan Barang</label>
                      <textarea id="keterangan_barang" name="keterangan_barang"
                                class="form-control" rows="4" required>{{ old('keterangan_barang', $barang->keterangan_barang) }}</textarea>
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

<li>
    <a href="{{ route('barang.edit', $barang->id) }}" class="dropdown-item text-warning">Edit</a>
</li>
