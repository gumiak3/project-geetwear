<?php
session_start();
if($_SESSION['login'] && $_SESSION['user-type']=='admin'){

}else{
    header("location:logowanie.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GEETWEAR ADMIN PANEL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css_bootstrap/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css_bootstrap/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css_bootstrap/style.css" />

  </head>
  <body>
    <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >GEETWEAR</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="./index.php">Sklep</a></li>
                <li>
                  <a class="dropdown-item" href="#">Wyloguj się</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar end -->
    <!-- Offcanvas START -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="#" class="dashboard nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                MANAGEMENT
              </div>
            </li>
              <a href="#" class="categories nav-link px-3">
                <span class="me-2"><i class="bi bi-tag"></i></span>
                <span>Categories</span>
              </a>
              <a href="#" class="pages nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
              <a href="#" class="users nav-link px-3">
                <span class="me-2"><i class="bi bi-people"></i></span>
                <span>Users</span>
              </a>
              <a href="#" class="orders nav-link px-3">
                <span class="me-2"><i class="bi bi-box-seam"></i></span>
                <span>Orders</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- Offcanvas END -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div id='content'class="row">
          
        </div>
    </main>
   <script src="./js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js_bootstrap/jquery-3.5.1.js"></script>
    <script src="./js_bootstrap/jquery.dataTables.min.js"></script>
    <script src="./js_bootstrap/dataTables.bootstrap5.min.js"></script>
    <script src="./js_bootstrap/script.js"></script>
    <script src="./jscript/adminManagement.js"></script>
  </body>
</html>