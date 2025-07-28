<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register — MySite</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/librarycss/register.css?v=2"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="p-8 md:p-10 rounded-xl max-w-xl w-full mx-4 relative">
    <div class="container">
      <div class="register-card">
        <div class="book-icon" style="color:green;">&#128213;</div>
        <h2 class="text-3xl font-bold text-gray-800 text-center mt-8 mb-8">REGISTER</h2>

        <form method="post" action="<?php echo URLROOT; ?>/auth/register" class="space-y-6">
          <?php require APPROOT.'/views/components/auth_message.php'; ?>
          <input type="text" name="name" placeholder="Full Name" required />
          <input type="email" name="email" placeholder="Email" required />
          <input type="text" name="rollno" placeholder="Roll No" required />

          <div class="gender-selection">
            <label><input type="radio" name="gender" value="male" /> Male</label>
            <label><input type="radio" name="gender" value="female" /> Female</label>
          </div>

          <select name="year" required>
            <option value="">Year</option>
            <option value="First Year">First Year</option>
            <option value="Second Year">Second Year</option>
            <option value="Third Year">Third Year</option>
            <option value="Fourth Year">Fourth Year</option>
            <option value="Final Year">Final Year</option>
          </select>

          <!-- Password field with toggle -->
          <div class="relative">
            <input type="password" id="password" name="password" placeholder="Password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <span class="absolute inset-y-0 right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="togglePassword('password', 'eyeIcon1')">
              <i id="eyeIcon1" class="fas fa-eye"></i>
            </span>
          </div>

          <!-- Confirm Password field with toggle -->
          <div class="relative">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <span class="absolute inset-y-0 right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="togglePassword('confirm_password', 'eyeIcon2')">
              <i id="eyeIcon2" class="fas fa-eye"></i>
            </span>
          </div>

          <div class="terms-conditions">
            <input type="checkbox" id="terms" required />
            <label for="terms">I agree with the terms and conditions</label>
          </div>

          <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            Register
          </button>

          <p class="text-center text-gray-600 text-sm mt-6">
             Already have an account ? <a href="<?php echo URLROOT; ?>/pages/login" style="color: green; font-weight: bold;">Login</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  <!-- Show/Hide Password Script -->
  <script>
    function togglePassword(fieldId, iconId) {
      const input = document.getElementById(fieldId);
      const icon = document.getElementById(iconId);
      const isPassword = input.type === "password";

      input.type = isPassword ? "text" : "password";
      icon.classList.toggle("fa-eye");
      icon.classList.toggle("fa-eye-slash");
    }
  </script>
</body>
</html>
