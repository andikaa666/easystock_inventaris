<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />

        <title>Peminjaman</title>

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
      </head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.nav.sidebar')
            <div class="layout-page">
                @include('layouts.nav.nav')
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">List Peminjaman</h5>
                            {{-- <a href="{{ route('peminjamanB.create') }}" class="btn btn-primary btn-sm">Pinjam?</a> --}}
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPinjam">Pinjam</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Jumlah Yang Dipinjam</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($peminjamanB as $data)
                                    <tr>
                                        <td>{{ $data->nama_peminjam}}</td>
                                        <td>{{ $data->barang->nama_barang }}</td>
                                        <td>{{ $data->tanggal_peminjaman }}</td>
                                        <td>{{ $data->jumlah_barang }}</td>


                                        {{-- <td>{{ $data->barang->keterangan_barang }}</td> --}}
                                        <td>
                                            <div class="btn-group dropend">
                                              <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li>
                                                  <a href="{{ route('peminjamanB.edit', $data->id) }}" class="dropdown-item text-warning">Edit</a>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item text-danger btn-hapus" data-id="{{ $data->id }}">Delete</button>
                                                </li>
                                              </ul>
                                            </div>
                                          </td>


                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data belum tersedia.</td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>

    </div>
    <!-- Modal Form Pinjam -->
<div class="modal fade" id="modalPinjam" tabindex="-1" aria-labelledby="modalPinjamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="formPeminjaman" action="{{ route('peminjamanB.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalPinjamLabel">Form Meminjam Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
              <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required>
            </div>

            <div class="mb-3">
              <label for="tanggal_peminjaman" class="form-label">Tanggal Meminjam</label>
              <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
            </div>

            <div class="mb-3">
              <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
              <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
              <label for="id_barang" class="form-label">Barang</label>
              <select id="id_barang" name="id_barang" class="form-select" required>
                <option value="" disabled selected>Pilih Barang</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }} (Stok: {{ $b->stok }})</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    @include('layouts.nav.footer')
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
          // Submit Form Tambah Peminjaman
          $('#formPeminjaman').on('submit', function (e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
              url: "{{ route('peminjamanB.store') }}",
              type: 'POST',
              data: formData,
              success: function(response) {
    $('#modalPinjam').modal('hide'); // Tutup modal dulu

    setTimeout(() => {
        Swal.fire({
            title: "Berhasil!",
            text: "Data berhasil ditambahkan!",
            icon: "success",
            confirmButtonText: "OK"
        }).then(() => {
            location.reload();
        });
    }, 300); // Delay kecil biar animasi modal close selesai
},

              error: function (xhr) {
                let errorMessage = "Terjadi kesalahan saat menyimpan data.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                  errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                  title: "Gagal!",
                  text: errorMessage,
                  icon: "error",
                  confirmButtonText: "OK"
                });
              }
            });
          });

          // SweetAlert Delete
          $('.btn-hapus').click(function () {
            let id = $(this).data('id');
            Swal.fire({
              title: 'Yakin ingin menghapus?',
              text: "Data tidak bisa dikembalikan!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#6c757d',
              confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: `/peminjamanB/${id}`,
                  type: 'POST',
                  data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                  },
                  success: function () {
                    Swal.fire(
                      'Terhapus!',
                      'Data berhasil dihapus.',
                      'success'
                    ).then(() => {
                      location.reload();
                    });
                  },
                  error: function () {
                    Swal.fire(
                      'Gagal!',
                      'Terjadi kesalahan saat menghapus data.',
                      'error'
                    );
                  }
                });
              }
            });
          });

          // Flash success message dari session (redirect biasa)
          @if(session('success'))
            Swal.fire({
              title: 'Berhasil!',
              text: '{{ session("success") }}',
              icon: 'success',
              confirmButtonText: 'OK'
            });
          @endif
        });
      </script>


</body>
</html>
