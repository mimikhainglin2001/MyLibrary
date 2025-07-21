<?php require_once APPROOT . '/views/inc/sidebar.php';?>
        <!-- Main Content Area (Matches booklist.html design) -->
        <main class="main-content-area bg-blue-100 shadow-md">
            <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Return Book List</h2>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 sm:w-64">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <i class="fas fa-user-circle text-gray-700 text-2xl"></i>
                    <span class="text-gray-700 font-medium"><?php echo $name;?></span>
                </div>
            </div>

            <!-- Issue Book List Table -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <!-- Wrapper for vertically scrollable table with fixed header -->
                <div class="table-scroll-container"> 
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-header">Member ID</th> <!-- Removed w-XX -->
                                <th class="table-header">Member Name</th> <!-- Removed w-XX -->
                                <th class="table-header">ISBN</th> <!-- Removed w-XX -->
                                <th class="table-header">Book</th> <!-- Removed w-XX -->
                                <th class="table-header">Issue Date</th> <!-- Removed w-XX -->
                                <th class="table-header">Due Date</th> <!-- Removed w-XX -->
                            
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Example Row 1 -->
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">1</td>
                                <td class="table-cell">John Doe Long Name</td>
                                <td class="table-cell">00111</td>
                                <td class="table-cell">Brain and Heart: A Comprehensive Guide to Human Anatomy and Emotion</td>
                                <td class="table-cell">May 5, 2025</td>
                                <td class="table-cell">May 12, 2025</td>
                                
                            </tr>
                            <!-- Example Row 2 -->
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">2</td>
                                <td class="table-cell">Alice Wonderland</td>
                                <td class="table-cell">00112</td>
                                <td class="table-cell">Sone Htuk Mg San Shar: A Classic Myanmar Novel of Adventure and Intrigue</td>
                                <td class="table-cell">May 6, 2025</td>
                                <td class="table-cell">May 13, 2025</td>
                               
                            </tr>
                            <!-- Example Row 3 -->
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">3</td>
                                <td class="table-cell">Elle Fanning</td>
                                <td class="table-cell">00113</td>
                                <td class="table-cell">Myanmar Politic: An In-depth Analysis of the Political Landscape and History</td>
                                <td class="table-cell">May 7, 2025</td>
                                <td class="table-cell">May 14, 2025</td>
                                
                            </tr>
                            <!-- Example Row 4 -->
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">4</td>
                                <td class="table-cell">Kim Kardashian</td>
                                <td class="table-cell">00114</td>
                                <td class="table-cell">Thu Lo Lu ThuKhaMain: A Philosophical Journey Through Life's Challenges</td>
                                <td class="table-cell">May 8, 2025</td>
                                <td class="table-cell">May 15, 2025</td>
                                
                            </tr>
                            <!-- Example Row 5 -->
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">5</td>
                                <td class="table-cell">Jeon Jungkook</td>
                                <td class="table-cell">00115</td>
                                <td class="table-cell">A Yeik: A Poetic Collection of Short Stories and Reflections on Life</td>
                                <td class="table-cell">May 9, 2025</td>
                                <td class="table-cell">May 16, 2025</td>
                               
                            </tr>
                            
                        </tbody>
                    </table>
                </div> <!-- End table-scroll-container -->
                <div class="mt-8 flex justify-end">
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='<?php echo URLROOT;?>/admin/adminDashboard'">
                        <i class="fas fa-arrow-left mr-2"></i>Back
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- Logout Message Box
    <div id="logoutMessageBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-4">Logged Out Successfully!</h4>
            <p class="text-gray-600 mb-6">You have been successfully logged out of the admin dashboard.</p>
            <button id="closeMessageBox" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                OK
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutButton = document.getElementById('logoutButton');
            const logoutMessageBox = document.getElementById('logoutMessageBox');
            const closeMessageBox = document.getElementById('closeMessageBox');

            // Function to show the message box
            function showMessageBox() {
                logoutMessageBox.classList.add('show');
            }

            // Function to hide the message box
            function hideMessageBox() {
                logoutMessageBox.classList.remove('show');
            }

            // Event listener for the logout button
            // Make sure your logout button in sidebar.php has id="logoutButton"
            if (logoutButton) {
                logoutButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior
                    console.log('Logout initiated...');
                    // In a real application, you would perform actual logout logic here,
                    // e.g., clearing session storage, redirecting to a login page, etc.
                    showMessageBox(); // Show the custom message box
                });
            }


            // Event listener to close the message box
            closeMessageBox.addEventListener('click', hideMessageBox);

            // Close message box if clicked outside (optional)
            logoutMessageBox.addEventListener('click', function(event) {
                if (event.target === logoutMessageBox) {
                    hideMessageBox();
                }
            });
        });
    </script> -->
</body>
</html>