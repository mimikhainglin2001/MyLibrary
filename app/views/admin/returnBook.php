<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>
<main class="main-content-area bg-blue-100 shadow-md">
    <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Return Book List</h2>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 sm:w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <a href="<?php echo URLROOT; ?>/admin/profile" class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition duration-300">
                <i class="fas fa-user-circle text-2xl"></i>
                <span class="font-medium"><?php echo htmlentities($name['name']); ?></span>
            </a>
        </div>
    </div>

    <!-- Return Book List Table -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="table-scroll-container">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border px-4 py-2">Book ID</th>
                        <th class="border px-4 py-2">Member Name</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Borrow Date</th>
                        <th class="border px-4 py-2">Return Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($data['returnBookList'] as $book): ?>
                        <tr class="hover:bg-blue-50">
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['book_id']) ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['name']) ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['title']) ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['borrow_date']) ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['return_date'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex justify-end">
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='<?php echo URLROOT; ?>/admin/adminDashboard'">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </button>
        </div>
    </div>
</main>
</div>

<!-- Optional Logout Message Box Script (commented out, safe to remove or enable) -->
<!--
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

        function showMessageBox() {
            logoutMessageBox.classList.add('show');
        }

        function hideMessageBox() {
            logoutMessageBox.classList.remove('show');
        }

        if (logoutButton) {
            logoutButton.addEventListener('click', function(event) {
                event.preventDefault();
                showMessageBox();
            });
        }

        closeMessageBox.addEventListener('click', hideMessageBox);

        logoutMessageBox.addEventListener('click', function(event) {
            if (event.target === logoutMessageBox) {
                hideMessageBox();
            }
        });
    });
</script>
-->

</body>

</html>