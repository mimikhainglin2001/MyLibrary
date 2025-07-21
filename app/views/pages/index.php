<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/public/librarycss/home.css?v=2">
    <!-- Font Awesome (free version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
   
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



    <!-- Hero Section (Updated for mobile stacking) -->
    <section class="relative text-center py-8 md:py-20 flex flex-col md:flex-row items-center justify-center rounded-lg m-4 bg-white shadow-md">
        <!-- Image for hero section -->
        <div class="hero-image-container md:w-1/2 md:mr-8 lg:mr-12"></div>
        <div class="p-4 md:p-0 max-w-lg mx-auto md:mx-0 md:text-left">
          
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Your Gateway To Knowledge</h2>
            <button onclick="window.location.href='<?php echo URLROOT;?>/pages/login'" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                Get Start
            </button>
        </div>
    </section>

    <!-- Services Section (Updated content and mobile stacking) -->
    <section class="py-16 px-6 md:px-10 bg-white rounded-lg m-4 shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Services</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Service Card 1: Silent Reading -->
            <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <img src="https://placehold.co/400x250/E0F2F7/333333?text=Silent+Reading" alt="Silent Reading" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Silent Reading</h3>
                    <p class="text-gray-600 text-sm">
                        One needs space to read books or to study, our library has special arrangements for the silent zone.
                    </p>
                </div>
            </div>

            <!-- Service Card 2: Book Rentals -->
            <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <img src="https://placehold.co/400x250/E0F2F7/333333?text=Book+Rentals" alt="Book Rentals" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Book Rentals</h3>
                    <p class="text-gray-600 text-sm">
                        Apart from reading inside the library, we also provide facility to rent and return the books in time.
                    </p>
                </div>
            </div>

            <!-- Service Card 3: Categorized Book -->
            <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <img src="https://placehold.co/400x250/E0F2F7/333333?text=Categorized+Books" alt="Categorized Books" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Categorized Book</h3>
                    <p class="text-gray-600 text-sm">
                        We have excellent collection of books categorized under children, fiction, education, cookbooks, etc for easy access.
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>