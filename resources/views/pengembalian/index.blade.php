<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />

        <title>Pengembalian</title>

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
                            <h5 class="mb-0">List Pengembalian</h5>
                            <div class="btn-group">

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPengembalian">
                                    Kembali?
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Jumlah Barang</th>
                                        <th>Status Barang</th>
                                        <th>Total Denda</th>
                                        <th>Nama Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                    @forelse ($pengembalian as $data)
<tr>
    <td>{{ $data->peminjaman->nama_peminjam }}</td>
    <td>{{ $data->tanggal_pengembalian }}</td>
    <td>{{ $data->jumlah }}</td>
    <td>{{ $data->status_barang }}</td>
    <td>{{ $data->total_denda }}</td>
    <td>{{ $data->barang->nama_barang }}</td>
    <td>
        {{-- Tambahkan aksi seperti edit atau delete jika perlu --}}
        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $data->id }}">Hapus</button>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">Data belum tersedia.</td>
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
        <!-- add-->
        <!-- Modal Tambah Pengembalian -->
<!-- Modal Tambah Pengembalian -->
<div class="modal fade" id="modalPengembalian" tabindex="-1" aria-labelledby="modalPengembalianLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="formPengembalian">
        @csrf
        <input type="hidden" name="peminjaman_id" id="peminjaman_id">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Pengembalian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                <select class="form-select" id="nama_peminjam" name="peminjaman_id" required>
                    <option value="">-- Pilih Peminjam --</option>
                    @foreach ($peminjaman as $p)
                      <option value="{{ $p->id }}">{{ $p->nama_peminjam }}</option>
                    @endforeach
                  </select>

              </div>

              <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <select class="form-select" id="nama_barang" name="barang_id" required>
                  <option value="">-- Pilih Barang --</option>
                  @foreach ($barang as $b)
                    <option value="{{ $b->id }}" data-jumlah="{{ $b->stok }}">{{ $b->nama_barang }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" readonly>
              </div>


            <div class="mb-3">
              <label class="form-label">Tanggal Pengembalian</label>
              <input type="date" class="form-control" name="tanggal_pengembalian" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Status Barang</label>
              <input type="text" class="form-control" name="status_barang" required placeholder="Contoh: Baik / Rusak / Hilang">
            </div>

            <div class="mb-3">
                <label class="form-label">Total Denda</label>
                <input type="text" class="form-control" name="total_denda" id="total_denda" placeholder="Masukkan total denda (jika ada)" required>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </div>
      </form>
    </div>
  </div>




    </div>
    <!-- edit -->
    {{-- <div class="modal fade" id="kategoriModalEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="edit_id">

                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" id="edit_nama_kategori" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih Barang</label>
                            <select name="id_barang" id="edit_barang_id" class="form-control">
                                <option value="">-- Pilih Barang --</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

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

          // Saat user memilih nama barang, isi otomatis jumlahnya
          $('#nama_barang').on('change', function () {
            let selectedOption = $(this).find(':selected');
            let jumlah = selectedOption.data('jumlah') || '';
            $('#jumlah').val(jumlah);
          });

          // Saat form disubmit
          $('#formPengembalian').submit(function (e) {
            e.preventDefault();

            $.ajax({
              url: "{{ route('pengembalian.store') }}",
              type: "POST",
              data: $(this).serialize(),
              success: function (res) {
                Swal.fire("Berhasil", res.message, "success").then(() => location.reload());
              },
              error: function (err) {
                console.error(err);
                Swal.fire("Gagal", "Terjadi kesalahan saat menyimpan data.", "error");
              }
            });
          });

        });
      </script>



</body>
</html>
