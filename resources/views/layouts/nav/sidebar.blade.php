<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo">
      <a href="home" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="assets/img/backgrounds/bgweb.jpg" alt="Logo" />
        </span>
        <span class="app-brand-text demo menu-text">EasyStock</span>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle">
        <i class="bx bx-chevron-left"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner">
      <li class="menu-item active">
        <a href="home" class="menu-link">
          <i class="menu-icon bx bx-home-circle"></i>
          <div>Dashboard</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('barang.index')}}" class="menu-link">
          <i class="menu-icon bx bx-box"></i>
          <div>Barang</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('kategori_barang.index')}}" class="menu-link">
          <i class="menu-icon bx bx-category"></i>
          <div>Kategori</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('peminjamanB.index')}}" class="menu-link">
          <i class="menu-icon bx bx-file"></i>
          <div>Peminjaman</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('pengembalian.index')}}" class="menu-link">
          <i class="menu-icon bx bx-undo"></i>
          <div>Pengembalian</div>
        </a>
      </li>
    </ul>
  </aside>

  <!-- Loader -->
  <div id="page-loader">
    <div class="loader"></div>
  </div>

  <style>
    #layout-menu {
      background: linear-gradient(180deg, #243B55, #141E30);
      color: #fff;
      width: 250px;
      height: 100vh;
      position: fixed;
      border-right: 1px solid #1a1a1a;
      top: 0;
      left: 0;
      z-index: 1000;
      transition: all 0.3s ease-in-out;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      box-shadow: 2px 0 8px rgba(0,0,0,0.3);
    }

    #layout-menu.collapsed {
      width: 70px;
      overflow: hidden;
    }

    .menu-inner {
      padding: 10px 0;
    }

    .menu-item {
      list-style: none;
      margin: 5px 0;
    }

    .menu-item a {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      color: #ffffffd9;
      font-size: 1rem;
      text-decoration: none;
      border-radius: 8px;
      transition: background 0.2s ease, padding-left 0.2s ease;
    }

    .menu-item a:hover {
      background: rgba(255, 255, 255, 0.1);
      padding-left: 25px;
    }

    .menu-item.active a {
      background: rgba(255, 255, 255, 0.2);
      color: #ffffff;
      font-weight: bold;
    }

    .menu-icon {
      font-size: 1.3rem;
      margin-right: 12px;
      transition: transform 0.3s;
    }

    .menu-item a:hover .menu-icon {
      transform: scale(1.05);
    }

    .app-brand-logo img {
      width: 55px;
      height: 55px;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
    }

    .app-brand-link:hover img {
      transform: scale(1.05);
    }

    .app-brand-text {
      font-weight: 600;
      font-size: 1.2rem;
      margin-left: 10px;
      color: #fff;
    }

    /* Loader */
    #page-loader {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      /* background: rgba(255,255,255,0.9); */
      z-index: 9999;
      justify-content: center;
      align-items: center;
    }

    .loader {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      100% { transform: rotate(360deg); }
    }

    /* Page transition */
    .page-transition {
      animation: fadeInUp 0.4s ease-in-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(15px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const menuItems = document.querySelectorAll(".menu-item a");
      const loader = document.getElementById('page-loader');
      const menuToggle = document.querySelector('.layout-menu-toggle');
      const sidebar = document.getElementById('layout-menu');

      // Cek menu aktif dari localStorage
      const activeMenu = localStorage.getItem("activeMenu");
      if (activeMenu) {
        document.querySelectorAll(".menu-item").forEach((item) => item.classList.remove("active"));
        const activeElement = document.querySelector(`.menu-item a[href="${activeMenu}"]`);
        if (activeElement) activeElement.parentElement.classList.add("active");
      }

      // Event listener untuk klik menu
      menuItems.forEach((menu) => {
        menu.addEventListener("click", function () {
          localStorage.setItem("activeMenu", this.getAttribute("href"));
          loader.style.display = 'flex';
        });
      });

      // Toggle collapse sidebar
      if (menuToggle && sidebar) {
        menuToggle.addEventListener("click", () => {
          sidebar.classList.toggle("collapsed");
        });
      }
    });
  </script>
