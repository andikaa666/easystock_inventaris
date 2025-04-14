<footer class="footer shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
      <span class="footer-text">
        © <script>document.write(new Date().getFullYear());</script> <strong>EasyStock</strong> — Manage your inventory smartly
      </span>
      <a href="https://github.com/andikaa666" target="_blank" class="footer-link d-flex align-items-center">
        <i class="bi bi-github me-2"></i> GitHub
      </a>
    </div>
  </footer>

  <!-- Bootstrap Icons (jika belum) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <style>
    .footer {
      background: linear-gradient(to right, #f8f9fa, #e2e6ea);
      color: #343a40;
      width: calc(100% - 250px);
      position: fixed;
      bottom: 0;
      left: 250px;
      padding: 10px 30px;
      z-index: 1030;
      font-size: 0.95rem;
      border-top: 1px solid #ced4da;
      transition: all 0.3s ease-in-out;
      backdrop-filter: blur(8px);
    }

    .footer-text {
      display: flex;
      align-items: center;
      font-weight: 500;
    }

    .footer-link {
      color: #212529;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.2s ease, transform 0.2s ease;
    }

    .footer-link:hover {
      color: #0d6efd;
      transform: translateY(-2px);
    }

    @media (max-width: 992px) {
      .footer {
        left: 0;
        width: 100%;
        text-align: center;
        justify-content: center;
      }

      .footer .container-fluid {
        flex-direction: column;
        gap: 5px;
      }
    }
  </style>
