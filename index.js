let href = window.location.href;

let btnFavorite = document.querySelectorAll(".btn-favorite");
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
