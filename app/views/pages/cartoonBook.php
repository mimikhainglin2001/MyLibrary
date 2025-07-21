<?php require_once APPROOT . '/views/inc/nav.php';?>

    <!-- Hero Section -->
    <section class="relative text-center py-8 md:py-20 flex flex-col md:flex-row items-center justify-center m-4 bg-white shadow-md">
        <!-- Image for hero section -->
        <div class="hero-image-container md:w-1/2 md:mr-8 lg:mr-12"></div>
        <div class="p-4 md:p-0 max-w-lg mx-auto md:mx-0 md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Find The Book You Love</h2>
            <!-- Search Bar -->
            <div class="flex items-center justify-center md:justify-start mb-6">
                <input type="text" placeholder="Search" class="px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-xs">
                <button class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 transition duration-300">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Literary Book Listed Section -->
    <section class="py-16 px-6 md:px-10 bg-white rounded-lg m-4 shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Cartoon Book Listed</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Book Card 1 -->
            <div class="flex flex-col items-center p-6 bg-gray-50 shadow-md hover:shadow-lg transition duration-300 justify-between">
                <img src="images/book/b1.webp" alt="Book Cover 1" class="w-36 h-48 object-cover mb-4" style="width: 144px; height: 192px;">
                <div class="text-center flex flex-col flex-grow w-full">
                    <p class="text-sm text-gray-500 mb-1 book-id">ID: 1</p>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Title: MyanmarMhu MyanmarYayyar</h3>
                    <p class="text-sm text-gray-600 mb-2">Author: Min Thu Wan</p>
                    <p class="text-sm text-gray-600 mb-2">ISBN: 00110</p>
                    <div class="flex justify-center items-center mb-2">
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                        <i class="far fa-star text-yellow-400 text-sm"></i>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">Book Quantity: 1</p>
                    <p class="text-sm text-gray-600 mb-4">Available Book Quantity: 1</p>
                    <button class="issue-book-btn bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 mt-auto">
                        Issue Book
                    </button>
                </div>
            </div>

            <!-- Book Card 2 -->
            <div class="flex flex-col items-center p-6 bg-gray-50 shadow-md hover:shadow-lg transition duration-300 justify-between">
                <img src="images/book/b2.jpg" alt="Book Cover 2" class="w-36 h-48 object-cover mb-4" style="width: 144px; height: 192px;">
                <div class="text-center flex flex-col flex-grow w-full">
                    <p class="text-sm text-gray-500 mb-1 book-id">ID: 2</p>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Title: Ma Eain Kan</h3>
                    <p class="text-sm text-gray-600 mb-2">Author: Khin Khin Htoo</p>
                    <p class="text-sm text-gray-600 mb-2">ISBN: 00111</p>
                    <div class="flex justify-center items-center mb-2">
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                        <i class="far fa-star text-yellow-400 text-sm"></i>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">Book Quantity: 1</p>
                    <p class="text-sm text-gray-600 mb-4">Available Book Quantity: 1</p>
                    <button class="issue-book-btn bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 mt-auto">
                        Issue Book
                    </button>
                </div>
            </div>

            <!-- Book Card 3 -->
            <div class="flex flex-col items-center p-6 bg-gray-50 shadow-md hover:shadow-lg transition duration-300 justify-between">
                <img src="images/book/b3.jpg" alt="Book Cover 3" class="w-36 h-48 object-cover mb-4" style="width: 144px; height: 192px;">
                <div class="text-center flex flex-col flex-grow w-full">
                    <p class="text-sm text-gray-500 mb-1 book-id">ID: 3</p>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Title: Sone Hauk Mg San Shar</h3>
                    <p class="text-sm text-gray-600 mb-2">Author: Shwe Oo Daung</p>
                    <p class="text-sm text-gray-600 mb-2">ISBN: 00112</p>
                    <div class="flex justify-center items-center mb-2">
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                        <i class="far fa-star text-yellow-400 text-sm"></i>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">Book Quantity: 3</p>
                    <p class="text-sm text-gray-600 mb-4">Available Book Quantity: 2</p>
                    <button class="issue-book-btn bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 mt-auto">
                        Issue Book
                    </button>
                </div>
            </div>

            <!-- Book Card 4 -->
            <div class="flex flex-col items-center p-6 bg-gray-50 shadow-md hover:shadow-lg transition duration-300 justify-between">
                <img src="images/book/b4.png" alt="Book Cover 4" class="w-36 h-48 object-cover mb-4" style="width: 144px; height: 192px;">
                <div class="text-center flex flex-col flex-grow w-full">
                    <p class="text-sm text-gray-500 mb-1 book-id">ID: 4</p>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Title: Myanmar Politic ThukhaMain</h3>
                    <p class="text-sm text-gray-600 mb-2">Author: Mg Htin</p>
                    <p class="text-sm text-gray-600 mb-2">ISBN: 00113</p>
                    <div class="flex justify-center items-center mb-2">
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                        <i class="far fa-star text-yellow-400 text-sm"></i>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">Book Quantity: 1</p>
                    <p class="text-sm text-gray-600 mb-4">Available Book Quantity: 1</p>
                    <button class="issue-book-btn bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 mt-auto">
                        Issue Book
                    </button>
                </div>
            </div>

            <!-- Book Card 5 -->
            <div class="flex flex-col items-center p-6 bg-gray-50 shadow-md hover:shadow-lg transition duration-300 justify-between">
                <img src="images/book/b5.png"alt="Book Cover 5" class="w-36 h-48 object-cover mb-4" style="width: 144px; height: 192px;">
                    <p class="text-sm text-gray-500 mb-1 book-id">ID: 5</p>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Title: Thu Lo Lu</h3>
                    <p class="text-sm text-gray-600 mb-2">Author: Myint Myat</p>
                    <p class="text-sm text-gray-600 mb-2">ISBN: 00114</p>
                    <div class="flex justify-center items-center mb-2">
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                        <i class="far fa-star text-yellow-400 text-sm"></i>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">Book Quantity: 2</p>
                    <p class="text-sm text-gray-600 mb-4">Available Book Quantity: 2</p>
                     <button class="issue-book-btn bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 mt-auto" style="width: 300px;">
                        Issue Book
                    </button>
                </div>
                <!-- Book Card 6 -->
            <div class="flex flex-col items-center p-6 bg-gray-50 shadow-md hover:shadow-lg transition duration-300 justify-between">
                <img src="images/book/b6.jpg" alt="Book Cover 6" class="w-36 h-48 object-cover mb-4" style="width: 144px; height: 192px;">
                <div class="text-center flex flex-col flex-grow w-full">
                    <p class="text-sm text-gray-500 mb-1 book-id">ID: 6</p>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Title: A Yeik</h3>
                    <p class="text-sm text-gray-600 mb-2">Author: Ma Sandar</p>
                    <p class="text-sm text-gray-600 mb-2">ISBN: 00115</p>
                    <div class="flex justify-center items-center mb-2">
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                        <i class="far fa-star text-yellow-400 text-sm"></i>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">Book Quantity: 3</p>
                    <p class="text-sm text-gray-600 mb-4">Available Book Quantity: 2</p>
                    <button class="issue-book-btn bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 mt-auto">
                        Issue Book
                    </button>
                </div>
            </div>
            </div>
            
        </div>

        <div class="flex justify-between items-center mt-12 max-w-6xl mx-auto">
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='home.html'">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </button>
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='book1.html'">
                See More<i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </section>

    <!-- Issue Confirmation Message Box -->
    <div id="issueConfirmationMessageBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-4">Book Issued Successfully!</h4>
            <p class="text-gray-600 mb-6">The book has been successfully issued to you.</p>
            <button id="closeIssueConfirmationMessageBox" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                OK
            </button>
        </div>
    </div>
</body>
</html>
