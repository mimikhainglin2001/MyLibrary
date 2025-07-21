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
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/librarycss/register.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class=" p-8 md:p-10 rounded-xl max-w-xl w-full mx-4 relative">
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
          <option value="year1">First Year</option>
          <option value="year2">Second Year</option>
          <option value="year3">Third Year</option>
          <option value="year4">Fourth Year</option>
          <option value="year5">Final Year</option>
        </select>

        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />

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
</body>
</html>
