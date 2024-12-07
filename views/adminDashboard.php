<?php 
// test_array($billsAndUsers);
?>
<div class="content-right mt-4">
          <div class="content-right-container">
            <div class="content-right-container-box">
              <div class="content-dashboard-themes">
                <div class="row mx-0 my-0">
                  <!-- #130e2e -->
                  <div
                    class="col text-center d-flex justify-content-center align-items-center"
                  >
                    <div
                      class="content-dashboard-themes-box border d-flex align-items-center"
                      style="
                        width: fit-content;
                        height: fit-content;
                        padding: 25px 50px;
                      "
                    >
                      <span class="material-symbols-outlined admin-ion-desktop">
                        desktop_windows
                      </span>
                      <div class="content-dashboard-name-qty text-start">
                        <p class="mb-0">Màn hình</p>
                        <p class="mb-0"><?= $countAll['monitor'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div
                    class="col text-center d-flex justify-content-center align-items-center"
                  >
                    <div
                      class="content-dashboard-themes-box border d-flex align-items-center"
                      style="
                        width: fit-content;
                        height: fit-content;
                        padding: 25px 50px;
                      "
                    >
                      <span class="material-symbols-outlined admin-ion-desktop">
                        desktop_windows
                      </span>
                      <div class="content-dashboard-name-qty text-start">
                        <p class="mb-0">Khách hàng</p>
                        <p class="mb-0"><?= $countAll['user'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div
                    class="col text-center d-flex justify-content-center align-items-center"
                  >
                    <div
                      class="content-dashboard-themes-box border d-flex align-items-center"
                      style="
                        width: fit-content;
                        height: fit-content;
                        padding: 25px 50px;
                      "
                    >
                      <span class="material-symbols-outlined admin-ion-desktop">
                        desktop_windows
                      </span>
                      <div class="content-dashboard-name-qty text-start">
                        <p class="mb-0">Hóa đơn</p>
                        <p class="mb-0"><?= $countAll['bill'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div
                    class="col text-center d-flex justify-content-center align-items-center"
                  >
                    <div
                      class="content-dashboard-themes-box border d-flex align-items-center"
                      style="
                        width: fit-content;
                        height: fit-content;
                        padding: 25px 50px;
                      "
                    >
                      <span class="material-symbols-outlined admin-ion-desktop">
                        desktop_windows
                      </span>
                      <div class="content-dashboard-name-qty text-start">
                        <p class="mb-0">Doanh thu</p>
                        <p class="mb-0"><?= number_format($countAll['revenue'], 0, '.', ',') ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- chartjs -->
              <div class="chart-dashboard mt-4">
                <canvas
                  id="myChart"
                  style="width: 100%; max-width: 100%; height: 400px"
                ></canvas>
              </div>
              <div class="double-table d-flex justify-content-between mt-3" style="width: 100%;">
                <table class="table" style="width: 49%;">
                  <thead>
                    <tr>
                      <th colspan="4" class="text-center">Các đơn hàng đã thanh toán mới nhất</th>
                    </tr>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Tên Khách Hàng</th>
                      <th scope="col">Tổng tiền</th>
                      <th scope="col">Thời gian</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $string = '';
                      foreach ($billsAndUsers['lastedBills'] as $key => $bill) {
                        $string .= '
                            <tr>
                              <th scope="row">'. $key + 1 .'</th>
                              <td>'. $bill['name'] .'</td>
                              <td>'. number_format($bill['price'], 0, ',', '.') .'</td>
                              <td>'. $bill['date_time'] .'</td>
                            </tr>
                        ';
                      }
                      echo $string;
                    ?>
                  </tbody>
                </table>


                <table class="table" style="width: 49%;">
                  <thead>
                    <tr>
                      <th colspan="4" class="text-center">Các khách hàng mới</th>
                    </tr>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $string = '';
                      foreach ($billsAndUsers['lastedUsers'] as $key => $user) {
                        $gender = $user['gender'] == 1 ? 'female' : 'male';
                        $string .= '
                          <tr>
                            <th scope="row">'. $key + 1 .'</th>
                            <td>'. $user['name'] .'</td>
                            <td>'. $user['phone'] .'</td>
                            <td>'. $gender .'</td>
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
