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
<body>

    <div class="bg-white p-8 md:p-10 rounded-xl shadow-xl max-w-sm w-full mx-4 relative">
            <div class="book-icon">
                &#128213; 
            </div>
        <h2 class="text-3xl font-bold text-gray-800 text-center mt-8 mb-8">Change Password</h2>
        <!-- <p class="text-gray-600 text-center mb-8">Reset Your Password With Email</p> -->

        <form  class="space-y-6" method = "POST" action="<?php echo URLROOT; ?>/auth/changedPassword">
            <?php require APPROOT.'/views/components/auth_message.php'; ?>
             <div>
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
              <div>
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="confirm_password" placeholder="Confirm Password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                Submit
            </button>
        </form>
    </div>
</body>
</html>
