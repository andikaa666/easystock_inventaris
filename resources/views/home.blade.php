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
            <div class="row">
              <!-- CARD 1 -->
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="info-card shadow-blue">
                  <div class="info-icon">
                    <i class="bx bx-box"></i>
                  </div>
                  <div class="info-content">
                    <h4>{{ $totalBarang }}</h4>
                    <p>Jumlah Barang Tersedia</p>
                  </div>
                  <a href="{{ route('barang.index') }}" class="info-link">
                    Lihat Detail <i class="bx bx-right-arrow-alt"></i>
                  </a>
                </div>
              </div>

              <!-- CARD 2 -->
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="info-card shadow-blue">
                  <div class="info-icon">
                    <i class="bx bx-archive-in"></i>
                  </div>
                  <div class="info-content">
                    <h4>{{ $totalPinjam }}</h4>
                    <p>Jumlah Barang Dipinjam</p>
                  </div>
                  <a href="{{ route('peminjamanB.index') }}" class="info-link">
                    Lihat Detail <i class="bx bx-right-arrow-alt"></i>
                  </a>
                </div>
              </div>
              <!-- CARD 3 - LAPORAN -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="info-card shadow-blue">
                <div class="info-icon">
                    <i class="bx bx-file"></i>
                </div>
                <div class="info-content">
                    <h4>Laporan</h4>
                    <p>Lihat laporan aktivitas</p>
                </div>
                <a href="{{ route('peminjamanB.index') }}" class="info-link">
                    Lihat Detail <i class="bx bx-right-arrow-alt"></i>
                </a>
                </div>
            </div>


              <!-- STATISTIK BARANG (DIAGRAM BATANG) -->
        <div class="card mt-4">
            <div class="card-body">
            <h5 class="card-title mb-4">Statistik Barang</h5>
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
              height: 350
            },
            series: [{
              name: 'Jumlah',
              data: [{{ $totalBarang }}, {{ $totalPinjam }}]
            }],
            xaxis: {
              categories: ['Barang Tersedia', 'Barang Dipinjam'],
              labels: {
                style: {
                  colors: ['#0072ff', '#0072ff'],
                  fontSize: '14px',
                  fontWeight: 600
                }
              }
            },
            colors: ['#0072ff'],
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '50%'
              }
            },
            dataLabels: {
              enabled: true,
              style: {
                colors: ['#000']
              }
            },
            title: {
              text: 'Statistik Data Barang',
              align: 'center',
              style: {
                fontSize: '20px',
                color: '#333'
              }
            }
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
