let href = window.location.href;

let btnFavorite = document.querySelectorAll(".btn-favorite");
function goToAccountPage(){
  window.location.href = "http://localhost:8080/duan1-n15/index.php?page=account";
}

btnFavorite.forEach((button) => {
  button.addEventListener("click", addFavorite);
});
function addFavorite() {
  let button = this;

  if (button.childNodes[1].nodeName === "SPAN") {
    button.innerHTML = `
        <i class="fa fa-heart ms-2" style="font-size: 21px; color: red"></i>
        `;
  } else {
    button.innerHTML = `
         <span class="material-symbols-outlined ms-2"> favorite </span>
        `;
  }
}

if(href.search("otp") === -1){
  if(localStorage.getItem('countdownTime')){
    localStorage.removeItem('countdownTime');
  }
}

if(href.search("otp") !== -1){
  // Lấy phần tử hiển thị thời gian
let countdownElement = document.getElementById('timeSessionCoutdown');

// Hàm để cập nhật thời gian đếm ngược
function countdown(minutes, seconds) {
  // Chuyển đổi phút và giây thành giây để dễ tính toán
  let savedTime = localStorage.getItem('countdownTime');
  if (savedTime) {
    // Nếu có, lấy dữ liệu và tiếp tục đếm ngược từ đó
    totalSeconds = parseInt(savedTime);
  } else {
    // Nếu không có, bắt đầu từ thời gian mặc định
    totalSeconds = minutes * 60 + seconds;
  }

  // Thiết lập một khoảng thời gian để cập nhật mỗi giây
  let interval = setInterval(() => {
    totalSeconds--;

    // Tính toán lại phút và giây từ tổng số giây
    let minutesLeft = Math.floor(totalSeconds / 60);
    let secondsLeft = totalSeconds % 60;

    // Định dạng chuỗi hiển thị
    let formattedTime = `${minutesLeft.toString().padStart(2, '0')}:${secondsLeft.toString().padStart(2, '0')}`;
    countdownElement.textContent = formattedTime;
    localStorage.setItem('countdownTime', totalSeconds);
    // Nếu thời gian hết, dừng khoảng thời gian và thực hiện hành động mong muốn (tùy chọn)
    if (totalSeconds <= 0) {
      clearInterval(interval);
      // Thêm code ở đây để thực hiện hành động khi thời gian hết, ví dụ:
      countdownElement.innerHTML = 'Mã otp của bạn đã hết hiệu lực, vui lòng quay lại!';
    }
  }, 1000);
}

// Bắt đầu đếm ngược từ 2 phút
countdown(2, 0)
}



if (href.search("login") !== -1) {
  // Lấy các phần tử email và password
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  // Gắn sự kiện kiểm tra cho trường email khi blur (rời khỏi trường nhập liệu)
  emailInput.addEventListener("blur", function () {
    validateEmailField();
  });

  // Xóa thông báo lỗi khi người dùng focus vào trường email
  emailInput.addEventListener("focus", function () {
    clearFeedback(emailInput);
  });

  // Gắn sự kiện kiểm tra cho trường mật khẩu khi blur
  passwordInput.addEventListener("blur", function () {
    validatePasswordField();
  });

  // Xóa thông báo lỗi khi người dùng focus vào trường mật khẩu
  passwordInput.addEventListener("focus", function () {
    clearFeedback(passwordInput);
  });

  // Hàm kiểm tra email
  function validateEmailField() {
    const emailValue = emailInput.value.trim();
    if (!validateEmail(emailValue)) {
      emailInput.classList.add("is-invalid");
    } else {
      emailInput.classList.remove("is-invalid");
      emailInput.classList.add("is-valid");
    }
  }

  // Hàm kiểm tra mật khẩu
  function validatePasswordField() {
    const passwordValue = passwordInput.value.trim();
    if (passwordValue === "") {
      passwordInput.classList.add("is-invalid");
    } else {
      passwordInput.classList.remove("is-invalid");
      passwordInput.classList.add("is-valid");
    }
  }

  // Hàm xóa thông báo lỗi khi người dùng focus
  function clearFeedback(input) {
    input.classList.remove("is-invalid", "is-valid");
  }

  // Hàm kiểm tra định dạng email
  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
}

if (href.search("detail") !== -1) {
  let btnIncrease = document.getElementById("increaseQty");
  let btnDecrease = document.getElementById("decreaseQty");

  btnIncrease.addEventListener("click", increaseQty);
  btnDecrease.addEventListener("click", decreaseQty);
}
function showFormComment(paragraph, idMonitor, idUser) {
  let checkFormExist = false
  
  console.log(paragraph.parentNode);
  paragraph.parentNode.childNodes.forEach(node => {
    if(node.id === 'comment-form'){
      checkFormExist = true
    }
  });
  if(checkFormExist === false){
    let formSendComment = document.createElement("form");
    let attributes = {
      id: "comment-form",
      action: `index.php?page=detail&action=commentChild&id=${idMonitor}&idUser=${idUser}`,
      method: "post"
    }
    formSendComment.innerHTML = `
                      <textarea id="comment-input" name="contentCommentChild"
                          placeholder="Viết bình luận của bạn ở đây..." required></textarea>
                      <div class="button-send text-end" style="width: 100%;">
                          <button type="button" class="btn px-4 py-2 text-white" onclick="cancelSendComment(this)">Hủy</button>
                          <input type="submit" name="sendCommentChild" value="Gửi" class="btn px-4 py-2 text-white" style="width: fit-content; background: #7cb1e6;"></input>
                      </div>
    `;
    for (let key in attributes) {
      formSendComment.setAttribute(key, attributes[key])
    }
    paragraph.parentNode.appendChild(formSendComment);
  }
}

function cancelSendComment(button){
  console.log(button.parentNode.parentNode);
  button.parentNode.parentNode.remove();
}


if (href.search("signup") !== -1) {
  // Lấy các phần tử nhập liệu
  const nameInput = document.getElementById("name");
  const numberInput = document.getElementById("number");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const passwordConfirmation = document.getElementById("passwordConfirmation");

  // Gắn sự kiện cho các trường nhập liệu
  nameInput.addEventListener("blur", () => validateNameField());
  nameInput.addEventListener("focus", () => clearFeedback(nameInput));

  numberInput.addEventListener("blur", () => validateNumberField());
  numberInput.addEventListener("focus", () => clearFeedback(numberInput));

  emailInput.addEventListener("blur", () => validateEmailField());
  emailInput.addEventListener("focus", () => clearFeedback(emailInput));

  passwordInput.addEventListener("blur", () => validatePasswordField());
  passwordInput.addEventListener("focus", () => clearFeedback(passwordInput));

  passwordConfirmation.addEventListener("blur", () =>
    validatePasswordConfirmationField()
  );
  passwordConfirmation.addEventListener("focus", () =>
    clearFeedback(passwordConfirmation)
  );

  // Hàm kiểm tra tên
  function validateNameField() {
    const nameValue = nameInput.value.trim();
    if (nameValue === "" || nameValue.length < 3) {
      nameInput.classList.add("is-invalid");
    } else {
      nameInput.classList.remove("is-invalid");
      nameInput.classList.add("is-valid");
    }
  }

  // Hàm kiểm tra số điện thoại
  function validateNumberField() {
    const numberValue = numberInput.value.trim();
    const phoneRegex = /^[0-9]{10}$/; // Kiểm tra số điện thoại đúng 10 số
    if (!phoneRegex.test(numberValue)) {
      numberInput.classList.add("is-invalid");
    } else {
      numberInput.classList.remove("is-invalid");
      numberInput.classList.add("is-valid");
    }
  }

  // Hàm kiểm tra email
  function validateEmailField() {
    const emailValue = emailInput.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailValue)) {
      emailInput.classList.add("is-invalid");
    } else {
      emailInput.classList.remove("is-invalid");
      emailInput.classList.add("is-valid");
    }
  }

  // Hàm kiểm tra mật khẩu
  function validatePasswordField() {
    const passwordValue = passwordInput.value.trim();
    if (passwordValue.length < 6) {
      // Mật khẩu tối thiểu 6 ký tự
      passwordInput.classList.add("is-invalid");
    } else {
      passwordInput.classList.remove("is-invalid");
      passwordInput.classList.add("is-valid");
    }
  }

  // Hàm kiểm tra xác nhận mật khẩu
  function validatePasswordConfirmationField() {
    const passwordValue = passwordInput.value.trim();
    const passwordConfirmationValue = passwordConfirmation.value.trim();
    if (passwordConfirmationValue !== passwordValue) {
      passwordConfirmation.classList.add("is-invalid");
    } else {
      passwordConfirmation.classList.remove("is-invalid");
      passwordConfirmation.classList.add("is-valid");
    }
  }

  // Hàm xóa thông báo lỗi khi focus
  function clearFeedback(input) {
    input.classList.remove("is-invalid", "is-valid");
  }
}

let qtyCart = 1;
function decreaseQty() {
  if (qtyCart > 1) {
    qtyCart -= 1;
  }
  document.querySelector("#qty").value = qtyCart;
}
function increaseQty() {
  qtyCart += 1;
  document.querySelector("#qty").value = qtyCart;
}

let imgBig = document.querySelector("#imgBig");
let imgSmall = document.querySelectorAll(".imgSmall");
imgSmall.forEach((image) => {
  image.addEventListener("click", changeSrcImage);
});

function changeSrcImage() {
  imgBig.src = this.src;
}


// Danh sách sản phẩm giả lập (có thể thay bằng API)
const products = [
  { id: 1, name: "Màn Hình Dell VG27AQ3A Full HD (1080p) 144 inch", image: "./imgduan1/dell1.jpg" },
  { id: 2, name: "Màn Hình Gaming ASUS TUF Gaming VG27AQ3A Full HD (1080p) 144 inch", image: "./imgduan1/dell1.jpg" },
];

// Lấy phần tử input và container kết quả
const searchInput = document.getElementById("searchInput");
const searchIcon = document.getElementById("searchIcon");
const searchResults = document.getElementById("searchResults");

// Xử lý sự kiện nhập liệu
searchInput.addEventListener("input", function () {
  const query = this.value.trim().toLowerCase();

  // Nếu không có gì nhập, ẩn box kết quả và hiển thị lại icon tìm kiếm
  if (!query) {
    searchResults.style.display = "none";
    searchIcon.style.display = "block"; // Hiển thị lại icon khi không nhập
    return;
  }

  // Lọc sản phẩm theo tên
  const filteredProducts = products.filter((product) =>
    product.name.toLowerCase().includes(query)
  );

  // Hiển thị kết quả
  if (filteredProducts.length > 0) {
    searchResults.innerHTML = filteredProducts
      .map(
        (product) => `
      <div class="search-results-item" onclick="goToProduct(${product.id})">
        <img src="${product.image}" alt="${product.name}" />
        <span>${product.name}</span>
      </div>
    `
      )
      .join("");
    searchResults.style.display = "block";
    searchIcon.style.display = "none"; // Ẩn icon khi có kết quả tìm kiếm
  } else {
    searchResults.innerHTML = `<p>Không tìm thấy sản phẩm</p>`;
    searchResults.style.display = "block";
    searchIcon.style.display = "none"; // Ẩn icon khi không tìm thấy kết quả
  }
});

// Hàm chuyển hướng đến trang sản phẩm
function goToProduct(id) {
  window.location.href = `index.php?page=product&id=${id}`;
}

// Ẩn box khi click ra ngoài
document.addEventListener("click", (e) => {
  if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
    searchResults.style.display = "none";
    searchIcon.style.display = "block"; // Hiển thị lại icon khi click ra ngoài
  }
});
