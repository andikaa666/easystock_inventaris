<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme shadow-sm rounded-3 px-3" id="layout-navbar">
    <!-- Menu toggle (untuk mobile) -->
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-between w-100" id="navbar-collapse">
      <!-- Search -->
      <div class="navbar-nav align-items-center me-auto">
        <div class="nav-item d-flex align-items-center px-2">
          <i class="bx bx-search fs-5 text-muted me-2"></i>
          <input type="text" class="form-control border-0 shadow-none bg-transparent" placeholder="Cari..." aria-label="Search..." />
        </div>
      </div>

      <!-- Right side -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">

        <!-- Notification bell -->
        <li class="nav-item me-3 dropdown">
          <a class="nav-link position-relative" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class="bx bx-bell fs-4"></i>
            <span id="notifBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display: none;">0</span>
          </a>
          <ul id="notifList" class="dropdown-menu dropdown-menu-end shadow-sm p-2 rounded-3">
            <li class="dropdown-header">Notifikasi</li>
            <!-- Notifikasi stok menipis akan ditambahkan secara dinamis -->
          </ul>
        </li>

        <!-- Fullscreen toggle -->
        <li class="nav-item me-3">
          <a href="javascript:void(0);" class="nav-link" onclick="toggleFullScreen()" title="Fullscreen">
            <i class="bx bx-fullscreen fs-4"></i>
          </a>
        </li>

        <!-- User Dropdown -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="../assets/img/avatars/6.png" alt="User Avatar" class="w-px-35 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-lg p-3 rounded-3">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-online me-3">
                    <img src="../assets/img/avatars/6.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                  <div>
                    Hello {{ Auth::user()->username }}
                    <small class="text-muted">Admin</small>
                  </div>
                </div>
              </a>
            </li>
            <li><div class="dropdown-divider"></div></li>
            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>My Profile</a></li>
            {{-- <li><a class="dropdown-item" href="#"><i class="bx bx-cog me-2"></i>Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="bx bx-credit-card me-2"></i>Billing <span class="badge bg-danger ms-1">4</span></a></li> --}}
            <li><div class="dropdown-divider"></div></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bx bx-power-off me-2"></i>Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <script>
    // Fullscreen toggle
    function toggleFullScreen() {
      if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
      } else {
        document.exitFullscreen();
      }
    }

    // Dark mode toggle (jika aktifkan kembali)
    function toggleDarkMode() {
      const html = document.documentElement;
      html.classList.toggle("dark-mode");
      const icon = document.getElementById("darkModeIcon");
      icon.classList.toggle("bx-sun");
      icon.classList.toggle("bx-moon");
    }

    // Fetch notifikasi stok menipis
    document.addEventListener("DOMContentLoaded", function () {
      fetch("/api/barang/stok-menipis")
        .then((res) => res.json())
        .then((data) => {
          const notifBadge = document.getElementById("notifBadge");
          const notifList = document.getElementById("notifList");

          if (data.length > 0) {
            notifBadge.textContent = data.length;
            notifBadge.style.display = "inline-block";

            // Hapus notifikasi lama kecuali header
            const oldItems = notifList.querySelectorAll("li:not(.dropdown-header)");
            oldItems.forEach(item => item.remove());

            // Tambahkan notifikasi baru
            data.forEach(item => {
              const li = document.createElement("li");
              li.innerHTML = `<a class="dropdown-item text-warning" href="#">⚠️ Stok '${item.nama_barang}' tinggal ${item.stok}</a>`;
              notifList.appendChild(li);
            });
          } else {
            notifBadge.style.display = "none";
          }
        })
        .catch((err) => console.error("Gagal mengambil notifikasi stok:", err));
    });
  </script>
