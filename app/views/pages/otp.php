<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $email = $_SESSION['post_email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP - MySite</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS for OTP page -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/librarycss/otp.css">
</head>
<body class="otp-page-body">
    <div class="container">
        <div class="otp-card">
            <div class="book-icon">
                &#128213; <!-- Unicode for an open book emoji -->
            </div>
            <h2 class="text-3xl font-bold text-gray-800 text-center mt-8 mb-8">Enter OTP!</h2>
            <p class="text-gray-600 text-center mb-8">An OTP has been sent to <?php echo  $_SESSION['post_email'] ?></p>

            <form method="post" action="/auth/verify_otp">
                <div class="otp-inputs">
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp1" required>
                    <input type="text" maxlength="1" class="otp-input"name="otp[]" id="otp2" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp3" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp4" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp5" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp6" required>
                </div>

                 <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-full shadow-lg transition duration-300 ease-in-out transform">
                Submit
            </button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript for auto-tabbing and input validation in OTP fields
        const otpInputs = document.querySelectorAll('.otp-input');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                // Allow only numbers
                input.value = input.value.replace(/[^0-9]/g, '');

                if (input.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });
    </script>
</body>
</html>