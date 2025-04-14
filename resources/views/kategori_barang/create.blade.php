<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Form Tambah Kategori</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
    <style>
      
      .card-container {
        background: #f8f9fa;
        padding: 50px 50px 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 1200px;
        margin: auto;
      }

      .card-container:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
      }

      .input-group-outline .form-control {
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
      }

      .input-group-outline .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
      }

      .form-label {
        position: absolute;
        top: 50%;
        left: 15px;
        color: #aaa;
        font-size: 1rem;
        transform: translateY(-50%);
        transition: all 0.3s ease;
      }

      .input-group-outline .form-control:focus + .form-label,
      .input-group-outline .form-control:not(:placeholder-shown) + .form-label {
        font-size: 0.9rem;
        color: #3498db;
        transform: translateY(-25px);
      }

      .btn-primary {
        background-color: #3498db;
        border-radius: 25px;
        font-weight: 600;
        padding: 12px 30px;
        width: 100%;
        transition: background-color 0.3s ease, transform 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #2980b9;
        transform: scale(1.05);
      }

      .btn-outline-primary {
        color: #3498db;
        border-color: #3498db;
        font-weight: 600;
        border-radius: 25px;
        padding: 10px 25px;
      }

      .btn-outline-primary:hover {
        background-color: #3498db;
        color: white;
      }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- sidebar -->
        @include('layouts.nav.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('layouts.nav.nav')

          <div class="row justify-content-center">
            <div class="col-lg-10 mb-5">
              <div class="card-container mt-4 p-3 border rounded">
                <div class="float-end">
                  <a href="{{ route('barang.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>
                <h5 class="mb-3 text-dark">Form Tambah Kategori</h5>

                <form action="{{ route('kategori_barang.store') }}" method="POST" style="max-width: 500px; margin: auto; padding: 20px; border-radius: 8px; background: #f9f9f9; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    @csrf

                    <label for="nama_kategori" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" required
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 15px;">

                    <label for="id_barang" style="display: block; margin-bottom: 5px; font-weight: bold;">Pilih Barang</label>
                    <select id="id_barang" name="id_barang" required
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 15px;">
                        <option value="" selected disabled>Pilih Barang</option>
                        @foreach($barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                        @endforeach
                    </select>

                    <button type="submit" style="width: 100%; padding: 10px; border: none; background: #007bff; color: white; border-radius: 5px; cursor: pointer;">
                        Simpan
                    </button>
                </form>



              </div>
            </div>
          </div>
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
