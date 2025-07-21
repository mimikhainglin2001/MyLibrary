<?php $name = $_SESSION['name']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Your Gateway To Knowledge</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/librarycss/home.css">
   <link rel="stylesheet" href="<?php echo URLROOT;?>/public/librarycss/literaryBook.css?v=2">
   <link rel="stylesheet" href="<?php echo URLROOT;?>/public/librarycss/category.css?v=2">



   <style>
    body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom background image for hero section */
       
        /* Specific styling for the hero image container */
        .hero-image-container {
            width: 100%;
            height: 250px; /* Fixed height for mobile, adjust as needed */
            background-image: url('home.jpg'); /* Use your home.jpg here */
            background-size: cover;
            background-position: center;
            border-radius: 0.5rem; /* rounded-lg */
            margin-bottom: 1.5rem; /* mb-6 */
        }
        @media (min-width: 768px) { /* md breakpoint */
            .hero-image-container {
                width: 50%; /* Adjusted for md:w-1/2 */
                height: auto; /* Allow height to adjust with content if needed, or set a fixed height for consistency */
                min-height: 250px; /* Ensure minimum height on desktop */
                margin-bottom: 0;
            }
        }
   </style>
</head>
<body class="bg-gray-100">

  <header>
        <div class="header-content">
            <div class="logo-container">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h1 class="library-title">Library</h1>
            </div>
            <nav class="main-nav">
                <a href="<?php echo URLROOT;?>/pages/category">HOME</a>
                <a href="<?php echo URLROOT?>/pages/contact">CONTACT</a>
                <a href="<?php echo URLROOT?>/pages/login">LOGOUT</a>
                <i class="fas fa-user-circle user-icon"></i>
                <span><?php echo $name?></span>
            </nav>
        </div>
    </header>