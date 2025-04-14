<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="assets/img/backgrounds/bgweb.jpg" alt="Logo">
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


</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let menuItems = document.querySelectorAll(".menu-item a");

        // Cek apakah ada menu yang aktif tersimpan di localStorage
        let activeMenu = localStorage.getItem("activeMenu");

        if (activeMenu) {
            // Hapus semua active dulu
            document.querySelectorAll(".menu-item").forEach((item) => {
                item.classList.remove("active");
            });

            // Tambahkan active ke menu yang sesuai
            let activeElement = document.querySelector(`.menu-item a[href="${activeMenu}"]`);
            if (activeElement) {
                activeElement.parentElement.classList.add("active");
            }
        }

        // Tambahkan event listener ke setiap menu
        menuItems.forEach((menu) => {
            menu.addEventListener("click", function () {
                // Hapus active dari semua menu
                document.querySelectorAll(".menu-item").forEach((item) => {
                    item.classList.remove("active");
                });

                // Tambahkan active ke yang diklik
                this.parentElement.classList.add("active");

                // Simpan ke localStorage agar tetap aktif setelah reload
                localStorage.setItem("activeMenu", this.getAttribute("href"));
            });
        });
    });
</script>

