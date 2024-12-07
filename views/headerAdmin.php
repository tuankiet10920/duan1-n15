<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <!-- jQuery (Bootstrap JS yêu cầu jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <link rel="stylesheet" href="./style_admin.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  </head>
  <body>
    <section class="admin position-relative">
      <div class="left position-fixed" style="top: 0; left: 0">
        <div class="left-container">
          <div class="header-left">
            <div
              class="header-left-container py-2 d-flex justify-content-center align-items-center"
            >
              <div
                class="header-left-image me-2 rounded-circle overflow-hidden"
                style="width: 30px; height: 30px"
              >
                <img
                  src="./imgduan1/logo-dung-duong-ban.jpg"
                  alt=""
                  width="100%"
                  height="100%"
                />
              </div>
              <p class="text-white mb-0 ms-2 fs-5" style="font-weight: 600">
                Monitor Admin
              </p>
            </div>
          </div>
          <div class="left-content">
            <div class="left-content-title">
              <p class="text-white">Main</p>
              <a href="index.php?page=admin"
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      dashboard
                    </span>
                  </div>
                  <p class="mb-0">Dashboard</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <p class="text-white mt-3">Entity</p>
              <a
                href="index.php?page=admin&content=monitor"
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      desktop_windows
                    </span>
                  </div>
                  <p class="mb-0">Monitor</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      branding_watermark
                    </span>
                  </div>
                  <p class="mb-0">Brand</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      photo_library
                    </span>
                  </div>
                  <p class="mb-0">Images</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      background_grid_small
                    </span>
                  </div>
                  <p class="mb-0">Color Space</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      lan
                    </span>
                  </div>
                  <p class="mb-0">Connection Port</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      monitor_heart
                    </span>
                  </div>
                  <p class="mb-0">Base Plate</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      9k
                    </span>
                  </div>
                  <p class="mb-0">Screen Solution</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      60fps_select
                    </span>
                  </div>
                  <p class="mb-0">Scan Frequency</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      person
                    </span>
                  </div>
                  <p class="mb-0">User</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      alternate_email
                    </span>
                  </div>
                  <p class="mb-0">Address</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      call
                    </span>
                  </div>
                  <p class="mb-0">Phone Number</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      shopping_bag
                    </span>
                  </div>
                  <p class="mb-0">Bill</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      receipt_long
                    </span>
                  </div>
                  <p class="mb-0">Bill Detail</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      confirmation_number
                    </span>
                  </div>
                  <p class="mb-0">Voucher</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      favorite
                    </span>
                  </div>
                  <p class="mb-0">Love</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href=""
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                      comment
                    </span>
                  </div>
                  <p class="mb-0">Comment</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
              <a
                href="index.php?page=login&action=logoutAdmin"
                class="text-decoration-none left-content-box d-flex justify-content-between text-white align-items-center mb-2 select-entity"
              >
                <div
                  class="left-content-box-leftside d-flex align-items-center"
                >
                  <div
                    class="left-content-box-icon me-3 border d-flex align-items-center px-1 py-1 rounded"
                    style="height: fit-content; background: #ecfbf9"
                  >
                    <span
                      class="material-symbols-outlined"
                      style="color: #4490db"
                    >
                    logout
                    </span>
                  </div>
                  <p class="mb-0">Logout</p>
                </div>
                <span class="material-symbols-outlined"> chevron_right </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="right position-absolute" style="top: 0; right: 0">
        <div class="header-right py-2">
          <div class="header-right-container">
            <div
              class="header-right-container-box d-flex justify-content-between"
            >
              <form action="">
                <div class="group-find d-flex align-items-center border">
                  <label for="find-dashboard" style="height: 20px" class="me-2">
                    <span
                      class="material-symbols-outlined"
                      style="font-size: 16px"
                    >
                      search
                    </span>
                  </label>
                  <input
                    type="text"
                    id="find-dashboard"
                    name="find-dashboard"
                    placeholder="Find user or monitor"
                  />
                </div>
              </form>
              <div class="small-info-user d-flex align-items-center">
                <div
                  class="image-small-user rounded-circle overflow-hidden"
                  style="width: 30px; height: 30px"
                >
                  <img
                    src="./imgduan1/logo-dung-duong-ban.jpg"
                    alt=""
                    width="100%"
                    height="100%"
                  />
                </div>
                <p class="text-dark mb-0 ms-2" style="font-size: 12px">
                  <?php 
                    if(isset($_SESSION['admin'])){
                      echo $_SESSION['admin']['name'];
                    }else{
                      echo 'Undefined Account';
                    }
                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>