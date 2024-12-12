<!-- it hear -->
<?php 
    if(isset($test)){
        test_array($test);
    }
?>
<div class="content-right mt-4">
    <div class="content-right-container">
        <div class="content-right-container-box">
            <h4 class="mb-4">Đơn hàng</h4>
            <form action="index.php?page=admin&content=bill&action=filter" method="post"
                class="form-dashboard mb-5"
                style="
                  width: 100%;
                  border: 1px solid #aaaaaa;
                  border-radius: 10px;
                "
              >
                <div
                  class="title px-2 py-3"
                  style="width: 100%; border-bottom: 1px solid #aaaaaa"
                >
                  Form Dashboard
                </div>
                <div class="form-content px-2 py-3">
                  <div class="container px-0 mx-0 form-dashboard-container">
                    <div class="row me-0 ms-0 mb-1">
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="username">Khách hàng</label><br />
                        <input
                          type="text"
                          id="username"
                          name="username"
                          placeholder="Tên khách hàng"
                        />
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="price">Giá tiền</label><br />
                        <select name="price" id="price">
                          <option value="">
                            --- Chọn giá tiền ---
                          </option>
                          <option value="1">0 - 10tr</option>
                          <option value="2">10tr - 50tr</option>
                          <option value="3">50tr - 100tr</option>
                        </select>
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="priceOptional">Tùy chọn giá tiền</label><br />
                        <input
                          type="number"
                          id="name"
                          name="priceFrom"
                          placeholder="Từ"
                          value="0"
                          style="width: 100px;"
                        />
                        đến
                        <input
                          type="number"
                          id="name"
                          name="priceTo"
                          placeholder="Đến"
                          value="0"
                          style="width: 100px;"
                        />
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="dateFrom">Ngày bắt đầu</label><br />
                        <select name="dayFrom" id="brands" style="width: 80px;">
                          <option value="">
                            Ngày
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 31) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .'</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                        <select name="monthFrom" id="brands" style="width: 80px;">
                          <option value="">
                            Tháng
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 12) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .'</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                        <select name="yearFrom" id="brands" style="width: 80px;">
                          <option value="">
                            Năm
                          </option>
                          <?php 
                          $string = '';
                          $count = 2007;
                          while ($count < date("Y")) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .'</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="dateEnd">Ngày kết thúc</label><br />
                        <select name="dayEnd" id="brands" style="width: 80px;">
                          <option value="">
                            Ngày
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 31) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .'</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                        <select name="monthEnd" id="brands" style="width: 80px;">
                          <option value="">
                            Tháng
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 12) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .'</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                        <select name="yearEnd" id="brands" style="width: 80px;">
                          <option value="">
                            Năm
                          </option>
                          <?php 
                          $string = '';
                          $count = 2007;
                          while ($count < date("Y")) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .'</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="timeFrom">Thời gian từ:</label><br />
                        <select name="hourFrom" id="brands" style="width: 80px;">
                          <option value="">
                            Giờ
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 24) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .' giờ</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                        <select name="minuteFrom" id="brands" style="width: 80px;">
                          <option value="">
                            Phút
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 60) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .' phút</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="timeTo">Thời gian đến:</label><br />
                        <select name="hourTo" id="brands" style="width: 80px;">
                          <option value="">
                            Giờ
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 24) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .' giờ</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                        <select name="minuteTo" id="brands" style="width: 80px;">
                          <option value="">
                            Phút
                          </option>
                          <?php 
                          $string = '';
                          $count = 0;
                          while ($count < 60) {
                            $count++;
                            $string .= '
                                <option value="'. $count .'">'. $count .' phút</option>
                            ';
                          }
                          echo $string;
                          ?>
                        </select>
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="phone">Số điện thoại khách hàng</label><br />
                        <input
                          type="text"
                          id="phone"
                          name="phone"
                          placeholder="Số điện thoại"
                        />
                      </div>
                      <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                        <label for="status">Trạng thái đơn hàng</label><br />
                        <select name="status" id="status">
                          <option value="">
                            --- Tất cả ---
                          </option>
                          <option value="0">Đang mua hàng</option>
                          <option value="1">Đã thanh toán</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-dashboard-icons mt-2">
                      <input
                        type="submit"
                        class="btn btn-main-color text-white"
                        value="Lọc"
                        name="filter"
                      >
                      </input>
                    </div>
                  </div>
                </div>
              </form>
            <!-- delete form hear -->

            <div class="content-right-table">
                <div
                    class="content-right-table-head d-flex justify-content-between px-2 py-3 align-items-center"
                    style="width: 100%; border-bottom: 1px solid #aaaaaa">
                    <p class="mb-0"><?php echo count($listBill) ?> results</p>
                    <p class="mb-0">Doanh thu: <?php 
                        $price = 0;
                        foreach ($listBill as $key => $bill) {
                            $price += $bill['price'];
                        }
                        echo number_format($price, 0, ',', '.');
                    ?> VND</p>
                </div>
                <div class="table-scroll-admin">
                    <table class="content-right-table-info">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Khách hàng</th>
                                <th>Giá tiền</th>
                                <th>Thời gian</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $string = '';
                            foreach ($listBill as $key => $bill) {
                                $status = $bill['status'] === 1 ? 'Đã thanh toán' : 'Đang mua hàng';
                                $string .= '
                                        <tr>
                                            <td>' . $key + 1 . '</td>
                                            <td>
                                                <div class="right-content-table-name">
                                                    ' . $bill['name'] . '
                                                </div>
                                            </td>
                                            <td>' . number_format($bill['price'], 0, ',', '.') . '</td>
                                            <td>' . $bill['time'] . '</td>
                                            <td>' . $bill['phone'] . '</td>
                                            <td>' . $status . '</td>
                                        </tr>
                                    ';
                            }
                            echo $string;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- it end hear -->