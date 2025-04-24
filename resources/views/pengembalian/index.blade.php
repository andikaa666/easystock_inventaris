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

                                        <th>Nama Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                    @forelse ($pengembalian as $data)
<tr>
    <td>{{ $data->nama_peminjam }}</td>
    <td>{{ $data->tanggal_pengembalian }}</td>
    <td>{{ $data->jumlah_barang }}</td>
    <td>{{ $data->status_barang }}</td>
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
                <input type="number" class="form-control" id="jumlah" name="jumlah_barang" readonly>
              </div>

            <div class="mb-3">
              <label class="form-label">Tanggal Pengembalian</label>
              <input type="date" class="form-control" name="tanggal_pengembalian" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Status Barang</label>
              <input type="text" class="form-control" name="status_barang" required placeholder="Contoh: Baik / Rusak / Hilang">
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
            // Store peminjaman data globally
            let peminjamanData = {};

            // When peminjaman is selected, store its data
            $('#nama_peminjam').on('change', function() {
                let peminjamId = $(this).val();
                if (peminjamId) {
                    // Find the selected peminjaman data
                    @foreach($peminjaman as $p)
                        if ('{{ $p->id }}' === peminjamId) {
                            peminjamanData = {
                                id: '{{ $p->id }}',
                                tanggal_peminjaman: '{{ $p->tanggal_peminjaman }}'
                            };
                        }
                    @endforeach
                }
            });

            // When barang is selected, update jumlah
            $('#nama_barang').on('change', function () {
                let selectedOption = $(this).find(':selected');
                let jumlah = selectedOption.data('jumlah') || '';
                $('#jumlah').val(jumlah);
            });

            // Calculate denda when return date is selected
            $('input[name="tanggal_pengembalian"]').on('change', function() {
                let tanggalPengembalian = $(this).val();
                if (tanggalPengembalian && peminjamanData.tanggal_peminjaman) {
                    // Calculate days difference
                    let start = new Date(peminjamanData.tanggal_peminjaman);
                    let end = new Date(tanggalPengembalian);
                    let diffTime = Math.abs(end - start);
                    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                    // Calculate denda (Rp 5.000 per day)
                    let denda = diffDays * 5000;

                    // Update total_denda field with formatting
                    $('#total_denda').val(denda.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
                }
            });

            // Form submission
            $('#formPengembalian').submit(function (e) {
                e.preventDefault();

                // Validate required fields
                let peminjamId = $('#nama_peminjam').val();
                let barangId = $('#nama_barang').val();
                let tanggalPengembalian = $('input[name="tanggal_pengembalian"]').val();
                let jumlahBarang = $('#jumlah').val();
                let statusBarang = $('input[name="status_barang"]').val();

                if (!peminjamId || !barangId || !tanggalPengembalian || !jumlahBarang || !statusBarang) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Error',
                        text: 'Semua field harus diisi!'
                    });
                }

                // Convert formatted denda back to number before submitting
                let totalDenda = $('#total_denda').val().replace(/[^0-9]/g, '');

                // Create FormData and ensure field mappings are correct
                let formData = $(this).serialize();
                formData = formData.replace('peminjaman_id', 'id_peminjam');
                formData = formData.replace('barang_id', 'id_barang');
                formData += '&total_denda=' + totalDenda;

                $.ajax({
                    url: "{{ route('pengembalian.store') }}",
                    type: "POST",
                    data: formData,
                    data: formData,
                    success: function (res) {
                        if (res.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // Reset form and reload page
                                $('#formPengembalian')[0].reset();
                                $('#modalPengembalian').modal('hide');
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: res.message
                            });
                        }
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON?.errors;
                        let errorMessage = 'Terjadi kesalahan saat menyimpan data.';

                        if (errors) {
                            errorMessage = Object.values(errors).flat().join('\n');
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: errorMessage
                        });
                    }
                });
            });

            // Delete functionality
            $('.delete-btn').on('click', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data pengembalian akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/pengembalian/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data pengembalian berhasil dihapus.',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat menghapus data.'
                                });
                            }
                        });
                    }
                });
            });
        });
      </script>



</body>
</html>
