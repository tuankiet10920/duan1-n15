const otpInputs = document.querySelectorAll('.otp-input');
const submitButton = document.querySelector('.custom-button');

// Sự kiện khi nhấn nút "Tiếp tục"
submitButton.addEventListener('click', (e) => {
    e.preventDefault(); // Ngăn chặn submit mặc định
    let isValid = true; // Biến kiểm tra trạng thái

    // Kiểm tra từng ô nhập OTP
    otpInputs.forEach((input) => {
        if (!input.value.trim()) { // Nếu ô trống
            input.classList.add('is-invalid'); // Thêm lớp báo lỗi
            isValid = false; // Đặt trạng thái không hợp lệ
        } else {
            input.classList.remove('is-invalid'); // Xóa lớp báo lỗi
            input.classList.add('is-valid'); // Đánh dấu hợp lệ
        }
    });

    // Nếu có lỗi, hiển thị thông báo
    if (!isValid) {
        alert("Vui lòng nhập đầy đủ mã OTP!");
        return;
    }

    // Nếu hợp lệ, lấy giá trị OTP
    const otpCode = Array.from(otpInputs).map((input) => input.value).join('');
    alert(`Mã OTP của bạn là: ${otpCode}`);
});

// Xóa lỗi khi người dùng nhập lại
otpInputs.forEach((input) => {
    input.addEventListener('input', () => {
        input.classList.remove('is-invalid'); // Xóa trạng thái lỗi
        input.classList.remove('is-valid'); // Xóa trạng thái hợp lệ
    });
});
