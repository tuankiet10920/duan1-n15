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
