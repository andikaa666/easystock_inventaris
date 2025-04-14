<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />

        <title>Kategori</title>

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
                            <h5 class="mb-0">List Kategori</h5>
                            <div class="btn-group">

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kategoriModalCreate">
                                    Tambah Kategori (Modal)
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($kategori_barang as $data)
                                    <tr>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>{{ optional($data->barang)->nama_barang }}</td> <!-- Cegah error -->
                                        <td>
                                            <div class="btn-group dropend">
                                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                    &#x22EE;
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('kategori_barang.edit', $data->id) }}" class="dropdown-item text-warning">Edit</a>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item text-warning edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#kategoriModalEdit">Edit</button>
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
                                        <td colspan="3" class="text-center">Data belum tersedia.</td>
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
        <div class="modal fade" id="kategoriModalCreate" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formCreate">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" required>
                            </div>
                            <select name="id_barang" id="barang_id" class="form-control">
                                <option value="">-- Pilih Barang --</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- edit -->
    <div class="modal fade" id="kategoriModalEdit" tabindex="-1">
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
        function loadBarangOptions(selectedId = null, edit = false) {
            $.ajax({
                url: "/barang-list",
                type: "GET",
                success: function (data) {
                    let selectOptions = '<option value="">-- Pilih Barang --</option>';
                    $.each(data, function (key, barang) {
                        let selected = (selectedId == barang.id) ? 'selected' : '';
                        selectOptions += `<option value="${barang.id}" ${selected}>${barang.nama_barang}</option>`;
                    });
                    if (edit) {
                        $("#edit_barang_id").html(selectOptions);
                    } else {
                        $("#barang_id").html(selectOptions);
                    }
                },
                error: function () {
                    Swal.fire("Gagal", "Gagal mengambil data barang.", "error");
                }
            });
        }

        $("#kategoriModalCreate").on("shown.bs.modal", function () {
            loadBarangOptions();
        });

        $("#formCreate").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "/kategori_barang",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire("Sukses!", response.success, "success").then(() => {
                        location.reload();
                    });
                },
                error: function (xhr) {
                    Swal.fire("Gagal!", "Gagal menambahkan data.", "error");
                }
            });
        });

        $(".edit-btn").click(function () {
            let id = $(this).data("id");
            $.ajax({
                url: "/kategori_barang/" + id + "/edit",
                type: "GET",
                success: function (response) {
                    $("#edit_id").val(response.kategori.id);
                    $("#edit_nama_kategori").val(response.kategori.nama_kategori);
                    loadBarangOptions(response.kategori.id_barang, true);
                    $("#kategoriModalEdit").modal("show");
                },
                error: function () {
                    Swal.fire("Gagal", "Gagal mengambil data kategori.", "error");
                }
            });
        });

        $("#formEdit").submit(function (e) {
            e.preventDefault();
            let id = $("#edit_id").val();
            $.ajax({
                url: "/kategori_barang/" + id,
                type: "PUT",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire("Sukses!", response.success, "success").then(() => {
                        location.reload();
                    });
                },
                error: function (xhr) {
                    Swal.fire("Gagal!", "Gagal memperbarui data.", "error");
                }
            });
        });

        $(document).on('click', '.delete-btn', function () {
            let id = $(this).data('id');
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
                        url: "/kategori_barang/" + id,
                        type: "DELETE",
                        success: function (response) {
                            Swal.fire("Sukses!", response.success, "success").then(() => {
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus data.", "error");
                        }
                    });
                }
            });
        });
    });
</script>

</body>
</html>
