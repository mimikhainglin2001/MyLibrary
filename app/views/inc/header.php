<?php $name = $_SESSION['session_loginuser']; ?>
<?php
$currentUrl = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Gateway To Knowledge</title>
    <link rel="stylesheet" href="/librarycss/index.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/category.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/literarybook.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/historicalbook.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/educationbook.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/romancebook.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/horrorbook.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/cartoonbook.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="/librarycss/contact.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" xintegrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Header -->
    <!-- <header class="header"> -->
        <div class="header-content">
            <div class="logo">
                <div class="logo-icon">📚</div>
            </div>
            <nav>
                <ul class="nav">
                    <li><a href="<?php echo URLROOT; ?>/pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/category">Category</a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/history">History</a></li>
                    <li><a href="<?php echo URLROOT; ?>/auth/logout">Logout</a></li>
                    <div class="flex items-center space-x-4">
                    <a href="<?php echo URLROOT; ?>/pages/userProfile" class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition duration-300">
                        <i class="fas fa-user-circle text-2xl"></i>
                        <span class="font-medium"><?= htmlspecialchars($name['name']) ?></span>
                    </a>
                </div>
                    <!-- <span><?php echo htmlspecialchars($name['name'] ?? 'Guest'); ?></span> -->


                </ul>
            </nav>
        </div>
    <!-- </header> -->