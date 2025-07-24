<?php require_once APPROOT .'/views/inc/sidebar.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR3 authorization/lQfrg1Bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <main class="main-content-area bg-blue-100 shadow-md">
            <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Book List</h2>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 sm:w-64">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <a href="<?php echo URLROOT; ?>/admin/profile" class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition duration-300">
                        <i class="fas fa-user-circle text-2xl"></i>
                        <span class="font-medium"><?php echo $name; ?></span>
                    </a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="table-scroll-container"> 
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-header">Book ID</th>
                                <th class="table-header">ISBN</th>
                                <th class="table-header">Title</th>
                                <th class="table-header">Author</th>
                                <th class="table-header">Quantity</th>
                                <th class="table-header">Status</th>
                                <th class="table-header">Details</th> <th class="table-header text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">1</td>
                                <td class="table-cell book-isbn">00110</td>
                                <td class="table-cell book-title">MyanmarMhu Myanmar Yayyar</td>
                                <td class="table-cell book-author">Min Thu Wan</td>
                                <td class="table-cell book-quantity">1</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="1">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="1">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="1">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">2</td>
                                <td class="table-cell book-isbn">00111</td>
                                <td class="table-cell book-title">Brain and Heart - Another Book Title That Is Quite Extensive</td>
                                <td class="table-cell book-author">Phay Myint</td>
                                <td class="table-cell book-quantity">1</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="2">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="2">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">3</td>
                                <td class="table-cell book-isbn">00112</td>
                                <td class="table-cell book-title">Sone Htuk Mg San Shar - A Classic Myanmar Novel</td>
                                <td class="table-cell book-author">Shwe Ou Daung</td>
                                <td class="table-cell book-quantity">3</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="3">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="3">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">4</td>
                                <td class="table-cell book-isbn">00113</td>
                                <td class="table-cell book-title">Myanmar Politic - An In-depth Analysis of the Political Landscape</td>
                                <td class="table-cell book-author">Mg Htin</td>
                                <td class="table-cell book-quantity">1</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="4">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="4">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">5</td>
                                <td class="table-cell book-isbn">00114</td>
                                <td class="table-cell book-title">Thu Lo Lu ThuKhaMain - A Philosophical Journey</td>
                                <td class="table-cell book-author">Journal Kyaw Ma Ma Lay</td>
                                <td class="table-cell book-quantity">2</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="5">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="5">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">6</td>
                                <td class="table-cell book-isbn">00115</td>
                                <td class="table-cell book-title">A Yeik - A Poetic Collection of Short Stories</td>
                                <td class="table-cell book-author">Ma Sandar</td>
                                <td class="table-cell book-quantity">3</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="6">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="6">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">7</td>
                                <td class="table-cell book-isbn">00116</td>
                                <td class="table-cell book-title">The Green Mile</td>
                                <td class="table-cell book-author">Stephen King</td>
                                <td class="table-cell book-quantity">5</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="7">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="7">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">8</td>
                                <td class="table-cell book-isbn">00117</td>
                                <td class="table-cell book-title">1984</td>
                                <td class="table-cell book-author">George Orwell</td>
                                <td class="table-cell book-quantity">2</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                       <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="8">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="8">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">9</td>
                                <td class="table-cell book-isbn">00118</td>
                                <td class="table-cell book-title">To Kill a Mockingbird</td>
                                <td class="table-cell book-author">Harper Lee</td>
                                <td class="table-cell book-quantity">4</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                       <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="9">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="9">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">10</td>
                                <td class="table-cell book-isbn">00119</td>
                                <td class="table-cell book-title">The Great Gatsby</td>
                                <td class="table-cell book-author">F. Scott Fitzgerald</td>
                                <td class="table-cell book-quantity">3</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="10">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="10">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">11</td>
                                <td class="table-cell book-isbn">00120</td>
                                <td class="table-cell book-title">Moby Dick</td>
                                <td class="table-cell book-author">Herman Melville</td>
                                <td class="table-cell book-quantity">1</td><td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                       <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="11">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="11">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">12</td>
                                <td class="table-cell book-isbn">00121</td>
                                <td class="table-cell book-title">War and Peace</td>
                                <td class="table-cell book-author">Leo Tolstoy</td>
                                <td class="table-cell book-quantity">2</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="12">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="12">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">13</td>
                                <td class="table-cell book-isbn">00122</td>
                                <td class="table-cell book-title">Pride and Prejudice</td>
                                <td class="table-cell book-author">Jane Austen</td>
                                <td class="table-cell book-quantity">4</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                       <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="13">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="13">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">14</td>
                                <td class="table-cell book-isbn">00123</td>
                                <td class="table-cell book-title">The Catcher in the Rye</td>
                                <td class="table-cell book-author">J.D. Salinger</td>
                                <td class="table-cell book-quantity">3</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                       <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="14">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="14">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell book-id">15</td>
                                <td class="table-cell book-isbn">00124</td>
                                <td class="table-cell book-title">The Hobbit</td>
                                <td class="table-cell book-author">J.R.R. Tolkien</td>
                                <td class="table-cell book-quantity">5</td>
                                <td class="table-cell book-status">Available</td>
                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                                    </div>
                                </td>

                                <td class="table-cell">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-book-id="15">
                                            <i class="fas fa-edit mr-1"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-book-id="15">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div class="mt-8 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='<?php echo URLROOT;?>/admin/adminDashboard'">
                        <i class="fas fa-arrow-left mr-2"></i>Back
                    </button>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='<?php echo URLROOT;?>/admin/addNewBook'">
                        Add New Book
                    </button>
                </div>
            </div>
        </main>
    </div>

    <div id="logoutMessageBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-4">Logged Out Successfully!</h4>
            <p class="text-gray-600 mb-6">You have been successfully logged out of the admin dashboard.</p>
            <button id="closeMessageBox" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                OK
            </button>
        </div>
    </div>

    <div id="deleteConfirmationBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-4">Confirm Deletion</h4>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this book? This action cannot be undone.</p>
            <div class="flex justify-center space-x-4">
                <button id="confirmDeleteButton" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                    Delete
                </button>
                <button id="cancelDeleteButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-300">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <div id="editMessageBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-6">Edit Book Details</h4>
            <div class="space-y-4 text-left">
                <div>
                    <label for="editBookId" class="block text-gray-700 text-sm font-bold mb-2">Book ID:</label>
                    <input type="text" id="editBookId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 cursor-not-allowed" readonly>
                </div>
                <div>
                    <label for="editBookISBN" class="block text-gray-700 text-sm font-bold mb-2">ISBN:</label>
                    <input type="text" id="editBookISBN" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="editBookTitle" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="editBookTitle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="editBookAuthor" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                    <input type="text" id="editBookAuthor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="editBookQuantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                    <div class="flex items-center">
                        <button id="decrementQuantity" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-3 rounded-l focus:outline-none focus:shadow-outline">-</button>
                        <input type="number" id="editBookQuantity" class="shadow appearance-none border-t border-b text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" min="0">
                        <button id="incrementQuantity" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-3 rounded-r focus:outline-none focus:shadow-outline">+</button>
                    </div>
                </div>
                <div>
                    <label for="editBookStatus" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select id="editBookStatus" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <button id="saveEditChangesButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                    Save Changes
                </button>
                <button id="cancelEditButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-300">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <div id="viewDetailsMessageBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-6">Book Details</h4>
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Book ID:</label>
                    <p id="viewBookId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-100"></p>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">ISBN:</label>
                    <p id="viewBookISBN" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-100"></p>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <p id="viewBookTitle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-100"></p>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                    <p id="viewBookAuthor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-100"></p>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                    <p id="viewBookQuantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-100"></p>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <p id="viewBookStatus" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-gray-100"></p>
                </div>
            </div>
            <div class="mt-8 flex justify-center">
                <button id="closeViewDetailsButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <style>
        /* Styles for the message boxes */
        .message-box-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Slightly darker overlay */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .message-box-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .message-box-content {
            background-color: white;
            padding: 2.5rem; /* Increased padding */
            border-radius: 0.75rem; /* More rounded corners */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25); /* Stronger, more diffused shadow */
            text-align: center;
            max-width: 550px; /* Slightly wider for better form layout */
            width: 90%;
            border: 1px solid #dcdcdc; /* Slightly more visible light gray border */
            transform: translateY(-30px) scale(0.95); /* Initial transform for animation */
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Bouncy animation */
        }

        .message-box-overlay.show .message-box-content {
            transform: translateY(0) scale(1); /* Final state for animation */
        }

        /* Button styling improvements */
        .message-box-content button {
            padding: 0.75rem 1.75rem; /* More generous padding */
            border-radius: 0.5rem; /* Slightly less rounded than full circle, more like the image */
            font-weight: 600; /* Semibold */
            transition: all 0.2s ease-in-out; /* Smooth transitions for all properties */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle button shadow */
            border: 1px solid transparent; /* Default transparent border */
        }

        .message-box-content button:hover {
            transform: translateY(-1px); /* Slight lift on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
        }

        /* Specific button colors (Tailwind classes are already good, but reinforcing) */
        .bg-blue-600:hover { background-color: #2563eb; } /* Darker blue */
        .bg-red-600:hover { background-color: #dc2626; } /* Darker red */
        .bg-gray-300:hover { background-color: #d1d5db; } /* Darker gray */

        /* Add borders to specific buttons for consistency with image */
        #confirmDeleteButton, #cancelDeleteButton,
        #saveEditChangesButton, #cancelEditButton,
        #closeViewDetailsButton {
            border: 1px solid rgba(0, 0, 0, 0.1); /* Light border for buttons */
        }


        /* Input field focus styles */
        .message-box-content input:focus,
        .message-box-content select:focus {
            border-color: #3b82f6; /* Blue border on focus */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5); /* Blue ring on focus */
        }

        /* Adjustments for input fields to match image style */
        .message-box-content input,
        .message-box-content select,
        .message-box-content p { /* Added p for the view details box */
            border: 1px solid #d1d5db; /* Light gray border */
            border-radius: 0.375rem; /* Slightly rounded corners */
            padding: 0.625rem 0.875rem; /* Adjusted padding */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ... (Your existing JavaScript for logout, delete, and edit) ...

            // Get references to the new view details elements
            const viewDetailsMessageBox = document.getElementById('viewDetailsMessageBox');
            const closeViewDetailsButton = document.getElementById('closeViewDetailsButton');
            const viewDetailsButtons = document.querySelectorAll('.view-details-button');

            const viewBookId = document.getElementById('viewBookId');
            const viewBookISBN = document.getElementById('viewBookISBN');
            const viewBookTitle = document.getElementById('viewBookTitle');
            const viewBookAuthor = document.getElementById('viewBookAuthor');
            const viewBookQuantity = document.getElementById('viewBookQuantity');
            const viewBookStatus = document.getElementById('viewBookStatus');

            // Function to show the view details pop-up
            function showViewDetailsBox() {
                viewDetailsMessageBox.classList.add('show');
            }

            // Function to hide the view details pop-up
            function hideViewDetailsBox() {
                viewDetailsMessageBox.classList.remove('show');
            }

            // Event listener for all "View Details" buttons
            viewDetailsButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr'); // Get the parent row
                    
                    // Extract data from the row
                    const bookId = row.querySelector('.book-id').textContent;
                    const bookISBN = row.querySelector('.book-isbn').textContent;
                    const bookTitle = row.querySelector('.book-title').textContent;
                    const bookAuthor = row.querySelector('.book-author').textContent;
                    const bookQuantity = row.querySelector('.book-quantity').textContent;
                    const bookStatus = row.querySelector('.book-status').textContent;

                    // Populate the view details pop-up with data
                    viewBookId.textContent = bookId;
                    viewBookISBN.textContent = bookISBN;
                    viewBookTitle.textContent = bookTitle;
                    viewBookAuthor.textContent = bookAuthor;
                    viewBookQuantity.textContent = bookQuantity;
                    viewBookStatus.textContent = bookStatus;

                    showViewDetailsBox();
                });
            });

            // Event listener for the "Close" button in the view details pop-up
            closeViewDetailsButton.addEventListener('click', hideViewDetailsBox);

            // Close the view details pop-up if clicked outside
            viewDetailsMessageBox.addEventListener('click', function(event) {
                if (event.target === viewDetailsMessageBox) {
                    hideViewDetailsBox();
                }
            });


            // Existing Logout and Delete functionality (ensure these are also present in your full script)
            const logoutMessageBox = document.getElementById('logoutMessageBox');
            const closeMessageBox = document.getElementById('closeMessageBox');

            // Example of how logout might be triggered (assuming a logout button exists elsewhere)
            // If you have a logout button, add an event listener to it:
            // document.getElementById('logoutButtonId').addEventListener('click', function() {
            //     logoutMessageBox.classList.add('show');
            // });

            if (closeMessageBox) {
                closeMessageBox.addEventListener('click', function() {
                    logoutMessageBox.classList.remove('show');
                });
            }

            if (logoutMessageBox) {
                logoutMessageBox.addEventListener('click', function(event) {
                    if (event.target === logoutMessageBox) {
                        logoutMessageBox.classList.remove('show');
                    }
                });
            }

            const deleteConfirmationBox = document.getElementById('deleteConfirmationBox');
            const confirmDeleteButton = document.getElementById('confirmDeleteButton');
            const cancelDeleteButton = document.getElementById('cancelDeleteButton');
            const deleteButtons = document.querySelectorAll('.delete-issue-button'); // Corrected selector

            let bookIdToDelete = null; // Variable to store the ID of the book to be deleted

            function showDeleteConfirmationBox() {
                deleteConfirmationBox.classList.add('show');
            }

            function hideDeleteConfirmationBox() {
                deleteConfirmationBox.classList.remove('show');
            }

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    bookIdToDelete = this.dataset.bookId; // Get the book ID from the data attribute
                    showDeleteConfirmationBox();
                });
            });

            confirmDeleteButton.addEventListener('click', function() {
                if (bookIdToDelete) {
                    // In a real application, you would send an AJAX request to delete the book
                    console.log('Deleting book with ID:', bookIdToDelete);
                    // For demonstration, we'll just hide the box and simulate success
                    alert('Book ' + bookIdToDelete + ' deleted successfully (simulated)!');
                    hideDeleteConfirmationBox();
                    // You might want to remove the row from the table here
                    const rowToDelete = document.querySelector(`.delete-issue-button[data-book-id="${bookIdToDelete}"]`).closest('tr');
                    if (rowToDelete) {
                        rowToDelete.remove();
                    }
                    bookIdToDelete = null; // Reset
                }
            });

            cancelDeleteButton.addEventListener('click', hideDeleteConfirmationBox);

            deleteConfirmationBox.addEventListener('click', function(event) {
                if (event.target === deleteConfirmationBox) {
                    hideDeleteConfirmationBox();
                }
            });

            // Edit functionality
            const editMessageBox = document.getElementById('editMessageBox');
            const cancelEditButton = document.getElementById('cancelEditButton');
            const saveEditChangesButton = document.getElementById('saveEditChangesButton');
            const editButtons = document.querySelectorAll('.edit-issue-button');

            const editBookId = document.getElementById('editBookId');
            const editBookISBN = document.getElementById('editBookISBN');
            const editBookTitle = document.getElementById('editBookTitle');
            const editBookAuthor = document.getElementById('editBookAuthor');
            const editBookQuantity = document.getElementById('editBookQuantity');
            const incrementQuantity = document.getElementById('incrementQuantity');
            const decrementQuantity = document.getElementById('decrementQuantity');
            const editBookStatus = document.getElementById('editBookStatus');

            function showEditMessageBox() {
                editMessageBox.classList.add('show');
            }

            function hideEditMessageBox() {
                editMessageBox.classList.remove('show');
            }

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr'); // Get the parent row
                    
                    // Extract data from the row
                    editBookId.value = row.querySelector('.book-id').textContent;
                    editBookISBN.value = row.querySelector('.book-isbn').textContent;
                    editBookTitle.value = row.querySelector('.book-title').textContent;
                    editBookAuthor.value = row.querySelector('.book-author').textContent;
                    editBookQuantity.value = row.querySelector('.book-quantity').textContent;
                    editBookStatus.value = row.querySelector('.book-status').textContent;

                    showEditMessageBox();
                });
            });

            cancelEditButton.addEventListener('click', hideEditMessageBox);

            saveEditChangesButton.addEventListener('click', function() {
                // In a real application, you would send an AJAX request to save changes
                const updatedBook = {
                    id: editBookId.value,
                    isbn: editBookISBN.value,
                    title: editBookTitle.value,
                    author: editBookAuthor.value,
                    quantity: editBookQuantity.value,
                    status: editBookStatus.value
                };
                console.log('Saving changes:', updatedBook);
                alert('Book ' + updatedBook.id + ' updated successfully (simulated)!');
                hideEditMessageBox();
                // You would typically re-render the table row or the entire table with updated data
                // For demonstration, manually update the row
                const rowToUpdate = document.querySelector(`.book-id:not(#editBookId):not(#viewBookId)`); // Targeting a specific class might be better if you use dynamic IDs
                if (rowToUpdate) {
                    const parentRow = rowToUpdate.closest('tr');
                    parentRow.querySelector('.book-isbn').textContent = updatedBook.isbn;
                    parentRow.querySelector('.book-title').textContent = updatedBook.title;
                    parentRow.querySelector('.book-author').textContent = updatedBook.author;
                    parentRow.querySelector('.book-quantity').textContent = updatedBook.quantity;
                    parentRow.querySelector('.book-status').textContent = updatedBook.status;
                }
            });

            editMessageBox.addEventListener('click', function(event) {
                if (event.target === editMessageBox) {
                    hideEditMessageBox();
                }
            });

            incrementQuantity.addEventListener('click', function() {
                editBookQuantity.value = parseInt(editBookQuantity.value) + 1;
            });

            decrementQuantity.addEventListener('click', function() {
                if (parseInt(editBookQuantity.value) > 0) {
                    editBookQuantity.value = parseInt(editBookQuantity.value) - 1;
                }
            });
        });
    </script>