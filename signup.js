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

passwordConfirmation.addEventListener("blur", () => validatePasswordConfirmationField());
passwordConfirmation.addEventListener("focus", () => clearFeedback(passwordConfirmation));

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
    if (passwordValue.length < 6) { // Mật khẩu tối thiểu 6 ký tự
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
