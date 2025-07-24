<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/librarycss/login.css?v=2">
</head>
<body>

<div class="bg-white p-8 md:p-10 rounded-xl shadow-xl max-w-sm w-full mx-4 relative">
    <div class="book-icon">
        &#128213;
    </div>
    <h2 class="text-3xl font-bold text-gray-800 text-center mt-8 mb-8">LOGIN</h2>
    <p class="text-gray-600 text-center mb-8">Enter your email and password</p>

    <form class="space-y-6" method="POST" action="<?php echo URLROOT; ?>/auth/login">
        <?php require APPROOT.'/views/components/auth_message.php'; ?>

        <div>
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <!-- Password with toggle -->
        <div class="relative">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            
            <!-- Eye icon -->
            <span class="absolute inset-y-0 right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="togglePassword()">
                <i id="eyeIcon" class="fas fa-eye"></i>
            </span>
        </div>

        <div class="text-right">
            <a href="<?php echo URLROOT;?>/pages/forgotPassword" class="text-blue-600 hover:underline text-sm font-medium">Forgot Password ?</a>
        </div>

        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            Login
        </button>
    </form>

    <p class="text-center text-gray-600 text-sm mt-6">
       Don't have an account? <a href="<?php echo URLROOT; ?>/pages/register" style="color: green; font-weight: bold;">Register</a>
    </p>
</div>

<!-- Show/Hide Password Script -->
<script>
function togglePassword() {
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");
    const isPassword = passwordInput.type === "password";

    passwordInput.type = isPassword ? "text" : "password";
    eyeIcon.classList.toggle("fa-eye");
    eyeIcon.classList.toggle("fa-eye-slash");
}
</script>

</body>
</html>
