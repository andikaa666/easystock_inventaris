<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />

        <title>Barang</title>

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
                            <h5 class="mb-0">List Barang</h5>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreateBarang">
                                    Tambah Barang
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Keterangan Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($barang as $data)
                                    <tr>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->keterangan_barang }}</td>
                                        <td>
                                            <div class="btn-group dropend">
                                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                    &#x22EE;
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('barang.edit', $data->id) }}" class="dropdown-item text-warning">Edit</a>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item text-warning edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item text-danger delete-btn" data-id="{{ $data->id }}">Delete</button>
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

    <div class="modal fade" id="modalCreateBarang" tabindex="-1" aria-labelledby="modalCreateBarangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateBarangLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="tambahBarangForm" action="{{ route('barang.store') }}" method="POST">

                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_barang" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan_barang" name="keterangan_barang" required></textarea>
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

    <!-- Modal Edit Barang -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBarangForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">

                        <div class="form-group">
                            <label for="edit_nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="edit_nama_barang" name="nama_barang" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_stok">Stok</label>
                            <input type="number" class="form-control" id="edit_stok" name="stok" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_keterangan_barang">Keterangan</label>
                            <textarea class="form-control" id="edit_keterangan_barang" name="keterangan_barang" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.nav.footer')
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Tambah Barang (Pesan Notifikasi yang benar)
            $('#tambahBarangForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('barang.store') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data berhasil ditambahkan!",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat menambahkan data.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });

            // Klik tombol Edit Barang
            $('.edit-btn').on('click', function() {
                let id = $(this).data('id');
                console.log("ID:", id);
                $.ajax({
                    url: '/barang/' + id + '/edit',
                    type: 'GET',
                    success: function(data) {
                        console.log('edit di klik');
                        $('#edit_id').val(data.id);
                        $('#edit_nama_barang').val(data.nama_barang);
                        $('#edit_stok').val(data.stok);
                        $('#edit_keterangan_barang').val(data.keterangan_barang);
                        $('#editBarangForm').attr('action', '/barang/' + data.id);

                        $('#editModal').modal('show');
                    },
                    error: function() {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat mengambil data.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });

            // Submit Edit Barang
            $('#editBarangForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#edit_id').val();
                let formData = $(this).serialize();

                $.ajax({
                    url: '/barang/' + id,
                    type: 'PUT',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat memperbarui data.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });

            // Hapus Barang
            $('.delete-btn').on('click', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data akan dihapus secara permanen!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/barang/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Terjadi kesalahan saat menghapus data.",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>


    {{-- <script>
        $(document).on('click', '.delete-btn', function () {
            let id = $(this).data('id');1
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/barang/" + id,
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data telah dihapus.",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Terjadi kesalahan saat menghapus data.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });
                }
            });
        });

        @if(session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        @endif
    </script> --}}
</body>
</html>
