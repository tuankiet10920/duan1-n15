<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- jQuery (Bootstrap JS yêu cầu jQuery) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header class="header">
    <div class="header-text d-flex justify-content-center align-items-center bg-dark" style="height: 40px; width: 100%">
      <p class="text-white" style="margin-bottom: 0px !important">
        MÀN HÌNH CHẤT QUÀ ĐỘC NGAY NGẤT TRONG MÙA XUÂN NÀY!
      </p>
    </div>
    <div class="box-nav border-bottom border-dark pt-1 pb-1">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <img style="width: 15%;" src="./imgduan1/logo.jpg" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ms-3">
                  <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item ms-3">
                  <a class="nav-link" href="index.php?page=products">Sản phẩm</a>
                </li>
                <li class="nav-item ms-3">
                  <a class="nav-link" href="#">Về chúng tôi</a>
                </li>
                <li class="nav-item ms-3">
                  <a class="nav-link" href="#">Liên hệ</a>
                </li>
              </ul>
              <form class="d-flex position-relative" role="search" id="search-form">
                <input id="searchInput" class="form-control me-2" style="width: 100%" type="search" placeholder="Search"
                  aria-label="Search" />
                <span id="searchIcon" class="material-symbols-outlined search-icon">search</span>
                <div id="searchResults" class="search-results"></div>
              </form>
              <?php 
                if(isset($_SESSION['user'])){
                  echo '
                    <div class="header-row-2-name">
                      <p class="mb-0" style="cursor: pointer;" onclick="window.location.href=`http://localhost:8080/duan1-n15/index.php?page=account`">'. $_SESSION['user']['name'] .'</p>
                    </div>
                    <div class="header-row-2-user ms-2 mt-2">
                      <a href="index.php?page=login&action=logout" onclick="reloadLogout()" class="text-decoration-none" style="color: #000;">
                        <span class="material-symbols-outlined">logout</span>
                      </a>
                    </div>
                  ';
                }else{
                  echo '
                    <div class="header-row-2-user ms-2 mt-2">
                      <a href="index.php?page=login" class="text-decoration-none" style="color: #000;">
                        <span class="material-symbols-outlined">person</span>
                      </a>
                    </div>
                  ';
                }
              ?>
              <div class="header-row-2-name">
                <p class="mb-0"></p>
              </div>
              <div class="header-row-2-cart ms-2 mt-2">
                <a href="index.php?page=cart" class="text-decoration-none" style="color: #000;">
                  <span class="material-symbols-outlined">shopping_cart</span>
                </a>
              </div>
              <hr />
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>