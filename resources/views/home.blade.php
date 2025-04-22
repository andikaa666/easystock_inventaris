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

    <title>Home</title>

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

    <!-- Icons. Uncomment required icon fonts -->
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
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- siderbar -->
        @include('layouts.nav.sidebar')

        <!-- sidebar -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('layouts.nav.nav')


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="content-wrapper">
                <!-- Content -->
                    <!-- content -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="modern-card">
                            <div class="card-icon">
                                <i class="bx bx-package h1"></i>
                            </div>
                            <div class="card-body">

                                <h6 class="card-subtitle">Total Barang Masuk</h6>
                                <h5 class="card-title">{{ $totalBarang }} </h5>
                                <p class="card-text">Informasi detail stok barang yang tersedia.</p>
                                <a href="{{ route('barang.index') }}" class="card-link">Lihat Detail <i class="bx bx-right-arrow-alt"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="modern-card">
                            <div class="card-icon">
                                <i class="bx bx-archive-out h1"></i>
                            </div>
                            <div class="card-body">

                                <h6 class="card-subtitle">Total Barang Dipinjam</h6>
                                <h5 class="card-title">{{ $totalPinjam }} </h5>
                                <p class="card-text">Informasi detail barang yang sedang dipinjam.</p>
                                <a href="{{ route('peminjamanB.index') }}" class="card-link">Lihat Detail <i class="bx bx-right-arrow-alt"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="modern-card">
                            <div class="card-icon">
                                <i class="bx bx-file h1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Laporan</h5>
                                <h6 class="card-subtitle">Laporan Aktivitas</h6>
                                <p class="card-text">Informasi detail laporan aktivitas sistem.</p>

                                <!-- Tombol untuk export laporan -->
                                <a href="{{ route('laporan.exportPDF') }}" class="btn btn-primary btn-sm">
                                    Export PDF
                                </a>

                                {{-- <a href="{{ route('peminjamanB.index') }}" class="card-link">Lihat Detail <i class="bx bx-right-arrow-alt"></i></a>
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>


              <!-- STATISTIK BARANG (DIAGRAM BATANG) -->
        <div class="card mb-5">
            <div class="card-body">
            {{-- <h5 class="card-title mb-4">Statistik Barang</h5> --}}
            <div id="bar-chart"></div>
            </div>
        </div>

            </div>
          </div>

      <!-- Content wrapper -->
      </div>

       <!-- chart -->
      <script>
        document.addEventListener("DOMContentLoaded", function () {
  var options = {
    chart: {
      type: 'bar',
      height: 400, // Menyesuaikan tinggi chart
      animations: {
        enabled: true,
        easing: 'easeinout', // Efek animasi
        speed: 800 // Kecepatan animasi
      }
    },
    series: [{
      name: 'Jumlah',
      data: [{{ $totalBarang }}, {{ $totalPinjam }}], // Sesuaikan dengan data
    }],
    xaxis: {
      categories: ['Barang Tersedia', 'Barang Dipinjam'],
      labels: {
        style: {
          colors: ['#0072ff', '#0072ff'],
          fontSize: '14px',
          fontWeight: 600
        }
      },
      axisBorder: {
        show: true,
        color: '#E0E0E0' // Warna border bawah sumbu X
      },
      axisTicks: {
        show: true,
        color: '#E0E0E0' // Warna garis tick pada sumbu X
      },
    },
    yaxis: {
      min: 1,
      max: 100,
      labels: {
        formatter: function (val) {
          return Math.floor(val); // Membulatkan angka agar tampak lebih bersih
        }
      },
      title: {
        text: 'Jumlah Barang',
        style: {
          color: '#333',
          fontSize: '14px'
        }
      },
      axisBorder: {
        show: true,
        color: '#E0E0E0' // Warna border sumbu Y
      },
      axisTicks: {
        show: true,
        color: '#E0E0E0' // Warna garis tick pada sumbu Y
      },
    },
    colors: ['#0072ff'], // Warna bar
    plotOptions: {
      bar: {
        borderRadius: 10,
        columnWidth: '50%' // Lebar bar
      }
    },
    dataLabels: {
      enabled: true,
      style: {
        colors: ['#000']
      },
      offsetY: -10, // Posisi label lebih dekat ke atas batang
      formatter: function (val) {
        return val.toFixed(0); // Menampilkan nilai sebagai angka bulat
      }
    },
    tooltip: {
      enabled: true,
      shared: true,
      intersect: false,
      followCursor: true, // Tooltip mengikuti kursor
      style: {
        fontSize: '12px',
      },
      y: {
        formatter: function (val) {
          return val + " items"; // Menambahkan keterangan unit
        }
      }
    },
    grid: {
      borderColor: '#f1f1f1', // Warna grid
      strokeDashArray: 5, // Jenis garis grid
      xaxis: {
        lines: {
          show: true // Menampilkan grid pada sumbu X
        }
      },
      yaxis: {
        lines: {
          show: true // Menampilkan grid pada sumbu Y
        }
      }
    },
    title: {
      text: 'Statistik Data Barang',
      align: 'center',
      style: {
        fontSize: '20px',
        color: '#333'
      }
    },
    responsive: [{
      breakpoint: 600,
      options: {
        chart: {
          height: 300
        },
        title: {
          fontSize: '16px'
        },
      }
    }]
  };

  var chart = new ApexCharts(document.querySelector("#bar-chart"), options);
  chart.render();
});


      </script>

      <style>
        .info-card {
          background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
          color: #fff;
          border-radius: 16px;
          padding: 24px;
          position: relative;
          overflow: hidden;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
          text-align: center;
        }

        .info-card:hover {
          transform: translateY(-6px);
          box-shadow: 0 12px 25px rgba(0, 114, 255, 0.3);
        }

        .info-icon {
          font-size: 4rem;
          margin-bottom: 16px;
          color: rgba(255, 255, 255, 0.9);
        }

        .info-content h4 {
          font-size: 2.5rem;
          font-weight: bold;
          margin: 0;
        }

        .info-content p {
          font-size: 1.1rem;
          margin: 8px 0 16px;
          opacity: 0.9;
        }

        .info-link {
          display: inline-block;
          background: rgba(255, 255, 255, 0.15);
          color: #fff;
          padding: 8px 16px;
          border-radius: 30px;
          font-weight: 500;
          text-decoration: none;
          transition: background 0.3s;
        }

        .info-link:hover {
          background: rgba(255, 255, 255, 0.3);
        }

        .shadow-blue {
          box-shadow: 0 8px 20px rgba(0, 114, 255, 0.15);
        }
      </style>
      <style>
        .modern-card {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.05); /* Efek shadow lebih halus dan modern */
            overflow: hidden;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border: 1px solid #eee;
            margin-bottom: 1.5rem;
        }

        .modern-card:hover {
            transform: translateY(-0.2rem);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08); /* Efek hover lebih terasa */
        }

        .card-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px; /* Ukuran ikon lebih kecil dan modern */
            background-color: #f9f9f9; /* Latar belakang ikon sangat terang */
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s ease-in-out;
        }

        .card-icon i {
            font-size: 2rem; /* Ukuran ikon lebih pas */
            color: #4a5568; /* Warna ikon abu-abu gelap yang modern */
        }

        .card-body {
            padding: 1rem;
            text-align: left;
        }

        .card-title {
            font-size: 1rem; /* Ukuran judul lebih proporsional */
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: #2d3748; /* Warna judul lebih gelap dan modern */
        }

        .card-subtitle {
            font-size: 0.85rem;
            color: #718096; /* Warna subtitle abu-abu sedang */
            margin-bottom: 0.6rem;
        }

        .card-text {
            color: #5e6472; /* Warna teks lebih kalem */
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }

        .card-link {
            color: #1a73e8; /* Warna link biru modern */
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500; /* Sedikit lebih tebal */
            transition: color 0.15s ease-in-out;
        }

        .card-link:hover {
            color: #0b5ed7; /* Warna link lebih gelap saat hover */
        }

        /* Responsif untuk kerapihan */
        .col-md-4 {
            flex: 0 0 auto;
            width: 31%; /* Lebar sedikit disesuaikan untuk memberi ruang antar card */
            margin-right: 2%;
        }

        .col-md-4:last-child {
            margin-right: 0;
        }

        @media (max-width: 992px) {
            .col-md-4 {
                width: 48%;
                margin-right: 4%;
            }
            .col-md-4:nth-child(even) {
                margin-right: 0;
            }
        }

        @media (max-width: 576px) {
            .col-md-4 {
                width: 100%;
                margin-right: 0;
            }
        }
    </style>
    <style>
        .small-box {
  position: relative;
  display: block;
  background: linear-gradient(135deg, #17a2b8 0%, #0c016b 100%);
  color: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-align: center;
}

.small-box:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
}

.small-box .inner {
  padding: 15px;
}

.small-box .inner h3 {
  font-size: 2.8rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: #fff;
}

.small-box .inner p {
  font-size: 1.2rem;
  margin-top: 5px;
  font-weight: 500;
  color: rgba(255, 255, 255, 0.9);
}

.small-box .icon {
  position: absolute;
  top: 15px;
  right: 15px;
  font-size: 4.5rem;
  color: rgba(255, 255, 255, 0.3);
}

.small-box-footer {
  display: block;
  padding: 12px;
  background: rgba(0, 0, 0, 0.1);
  color: #fff;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  border-radius: 0 0 12px 12px;
  transition: background 0.3s ease;
}

.small-box-footer:hover {
  background: rgba(0, 0, 0, 0.3);
}

      </style>
              </div>






          <!-- Content wrapper -->
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
