<?php require_once APPROOT .'/views/inc/sidebar.php'; ?>

<main class="main-content-area bg-blue-100 shadow-md">
    <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Borrow Book List</h2>
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
                        <th class="table-header">Member ID</th>
                        <th class="table-header">Member Name</th>
                        <th class="table-header">ISBN</th>
                        <th class="table-header">Book</th>
                        <th class="table-header">Borrow Date</th>
                        <th class="table-header">Due Date</th>
                        <th class="table-header">Details</th>
                        <th class="table-header text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">1</td>
                        <td class="table-cell">John Doe Long Name</td>
                        <td class="table-cell">00111</td>
                        <td class="table-cell">Brain and Heart: A Comprehensive Guide to Human Anatomy and Emotion</td>
                        <td class="table-cell">May 5, 2025</td>
                        <td class="table-cell">May 12, 2025</td>
                        <td class="table-cell text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="1">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="1">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">2</td>
                        <td class="table-cell">Alice Wonderland</td>
                        <td class="table-cell">00112</td>
                        <td class="table-cell">Sone Htuk Mg San Shar: A Classic Myanmar Novel of Adventure and Intrigue</td>
                        <td class="table-cell">May 6, 2025</td>
                        <td class="table-cell">May 13, 2025</td>
                        <td class="table-cell text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="2">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="2">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">3</td>
                        <td class="table-cell">Elle Fanning</td>
                        <td class="table-cell">00113</td>
                        <td class="table-cell">Myanmar Politic: An In-depth Analysis of the Political Landscape and History</td>
                        <td class="table-cell">May 7, 2025</td>
                        <td class="table-cell">May 14, 2025</td>
                        <td class="table-cell text-center">
                           <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="3">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="3">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">4</td>
                        <td class="table-cell">Kim Kardashian</td>
                        <td class="table-cell">00114</td>
                        <td class="table-cell">Thu Lo Lu ThuKhaMain: A Philosophical Journey Through Life's Challenges</td>
                        <td class="table-cell">May 8, 2025</td>
                        <td class="table-cell">May 15, 2025</td>
                        <td class="table-cell text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="4">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="4">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">5</td>
                        <td class="table-cell">Jeon Jungkook</td>
                        <td class="table-cell">00115</td>
                        <td class="table-cell">A Yeik: A Poetic Collection of Short Stories and Reflections on Life</td>
                        <td class="table-cell">May 9, 2025</td>
                        <td class="table-cell">May 16, 2025</td>
                        <td class="table-cell text-center">
                             <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="5">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="5">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">6</td>
                        <td class="table-cell">Austin Butler</td>
                        <td class="table-cell">00116</td>
                        <td class="table-cell">The Green Mile: A Story of Miracles and Humanity</td>
                        <td class="table-cell">May 10, 2025</td>
                        <td class="table-cell">May 17, 2025</td>
                        <td class="table-cell text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="6">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="6">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">7</td>
                        <td class="table-cell">Smith Johnson</td>
                        <td class="table-cell">00117</td>
                        <td class="table-cell">1984: A Dystopian Novel of Surveillance and Control</td>
                        <td class="table-cell">May 11, 2025</td>
                        <td class="table-cell">May 18, 2025</td>
                        <td class="table-cell text-center">
                           <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="7">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="7">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">8</td>
                        <td class="table-cell">TaeRi Kim</td>
                        <td class="table-cell">00118</td>
                        <td class="table-cell">To Kill a Mockingbird: A Classic Tale of Justice and Prejudice</td>
                        <td class="table-cell">May 12, 2025</td>
                        <td class="table-cell">May 19, 2025</td>
                        <td class="table-cell text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="8">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="8">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">9</td>
                        <td class="table-cell">Charli D'Amelio</td>
                        <td class="table-cell">00119</td>
                        <td class="table-cell">The Great Gatsby: A Novel of the Jazz Age and American Dream</td>
                        <td class="table-cell">May 13, 2025</td>
                        <td class="table-cell">May 20, 2025</td>
                        <td class="table-cell text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="9">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="9">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">10</td>
                        <td class="table-cell">Olivia Rodrigo</td>
                        <td class="table-cell">00120</td>
                        <td class="table-cell">Moby Dick: The Epic Hunt for the White Whale</td>
                        <td class="table-cell">May 14, 2025</td>
                        <td class="table-cell">May 21, 2025</td>
                        <td class="table-cell text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button" data-book-id="2">
                                        View
                                        </button>
                        </td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-issue-button" data-issue-id="10">
                                    <i class="fas fa-edit mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-issue-button" data-issue-id="10">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> <div class="mt-8 flex justify-end">
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='<?php echo URLROOT;?>/admin/adminDashboard'">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </button>
        </div>
    </div>
</main>
</div>

<div id="deleteIssueConfirmationBox" class="message-box-overlay">
    <div class="message-box-content">
        <h4 class="text-2xl font-bold text-gray-800 mb-4">Confirm Deletion</h4>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this issued book record? This action cannot be undone.</p>
        <div class="flex justify-center space-x-4">
            <button id="confirmDeleteIssueButton" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                Delete
            </button>
            <button id="cancelDeleteIssueButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-300">
                Cancel
            </button>
        </div>
    </div>
</div>

<div id="editIssueMessageBox" class="message-box-overlay">
    <div class="message-box-content">
        <h4 class="text-2xl font-bold text-gray-800 mb-6">Edit Issued Book Details</h4>
        <div class="space-y-4 text-left">
            <div>
                <label for="editIssueId" class="block text-gray-700 text-sm font-bold mb-2">Issue ID:</label>
                <input type="text" id="editIssueId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 cursor-not-allowed" readonly>
            </div>
            <div>
                <label for="editIssueMemberId" class="block text-gray-700 text-sm font-bold mb-2">Member ID:</label>
                <input type="text" id="editIssueMemberId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="editIssueMemberName" class="block text-gray-700 text-sm font-bold mb-2">Member Name:</label>
                <input type="text" id="editIssueMemberName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="editIssueISBN" class="block text-gray-700 text-sm font-bold mb-2">ISBN:</label>
                <input type="text" id="editIssueISBN" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="editIssueBookTitle" class="block text-gray-700 text-sm font-bold mb-2">Book Title:</label>
                <input type="text" id="editIssueBookTitle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="editIssueDate" class="block text-gray-700 text-sm font-bold mb-2">Issue Date:</label>
                <input type="date" id="editIssueDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="editDueDate" class="block text-gray-700 text-sm font-bold mb-2">Due Date:</label>
                <input type="date" id="editDueDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>
        <div class="mt-8 flex flex-wrap justify-center space-x-2 space-y-2 sm:space-y-0">
            <button id="saveEditIssueChangesButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                Save Changes
            </button>
            <button id="renewBookButton" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                Renew
            </button>
            <button id="returnBookButton" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                Return
            </button>
            <button id="cancelEditIssueButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-300">
                Cancel
            </button>
        </div>
    </div>
</div>

<div id="viewDetailsMessageBox" class="message-box-overlay">
    <div class="message-box-content text-left">
        <h4 class="text-2xl font-bold text-gray-800 mb-6">Issued Book Details</h4>
        <div class="space-y-3">
            <p><strong>Issue ID:</strong> <span id="viewDetailIssueId"></span></p>
            <p><strong>Member ID:</strong> <span id="viewDetailMemberId"></span></p>
            <p><strong>Member Name:</strong> <span id="viewDetailMemberName"></span></p>
            <p><strong>ISBN:</strong> <span id="viewDetailISBN"></span></p>
            <p><strong>Book Title:</strong> <span id="viewDetailBookTitle"></span></p>
            <p><strong>Issue Date:</strong> <span id="viewDetailIssueDate"></span></p>
            <p><strong>Due Date:</strong> <span id="viewDetailDueDate"></span></p>
            </div>
        <div class="mt-8 flex justify-center">
            <button id="closeDetailsButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-300">
                Close
            </button>
        </div>
    </div>
</div>

<style>
    /* Styles for the message boxes (retained from previous versions, ensure they are in your main CSS or <style> block) */
    .message-box-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
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
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 500px;
        width: 90%;
        transform: translateY(-20px);
        transition: transform 0.3s ease;
    }

    .message-box-overlay.show .message-box-content {
        transform: translateY(0);
    }

    .popup-box-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 50;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .popup-box-overlay.show {
        display: flex;
    }

    .popup-box {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }


</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOMContentLoaded event fired for Issue Book List page.'); // Debugging line

        // --- Logout functionality (if present in sidebar.php and needed here) ---
        const logoutButton = document.getElementById('logoutButton');
        const logoutMessageBox = document.getElementById('logoutMessageBox');
        const closeMessageBox = document.getElementById('closeMessageBox');

        function showLogoutMessageBox() {
            if (logoutMessageBox) {
                logoutMessageBox.classList.add('show');
            }
        }

        function hideLogoutMessageBox() {
            if (logoutMessageBox) {
                logoutMessageBox.classList.remove('show');
            }
        }

        if (logoutButton) {
            logoutButton.addEventListener('click', function(event) {
                event.preventDefault();
                console.log('Logout initiated...');
                showLogoutMessageBox();
            });
        }
        if (closeMessageBox) {
            closeMessageBox.addEventListener('click', hideLogoutMessageBox);
        }
        if (logoutMessageBox) {
            logoutMessageBox.addEventListener('click', function(event) {
                if (event.target === logoutMessageBox) {
                    hideLogoutMessageBox();
                }
            });
        }

        // --- Delete functionality for Issued Books ---
        const deleteIssueButtons = document.querySelectorAll('.delete-issue-button');
        const deleteIssueConfirmationBox = document.getElementById('deleteIssueConfirmationBox');
        const confirmDeleteIssueButton = document.getElementById('confirmDeleteIssueButton');
        const cancelDeleteIssueButton = document.getElementById('cancelDeleteIssueButton');
        let issueIdToDelete = null;

        function showDeleteIssueConfirmationBox() {
            deleteIssueConfirmationBox.classList.add('show');
        }

        function hideDeleteIssueConfirmationBox() {
            deleteIssueConfirmationBox.classList.remove('show');
            issueIdToDelete = null;
        }

        deleteIssueButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                issueIdToDelete = this.dataset.issueId;
                showDeleteIssueConfirmationBox();
            });
        });

        confirmDeleteIssueButton.addEventListener('click', function() {
            console.log(`Deleting issued book record with ID: ${issueIdToDelete}`);
            // In a real application, send AJAX DELETE request to your backend
            // e.g., fetch(`/api/issued-books/${issueIdToDelete}`, { method: 'DELETE' })
            // .then(response => response.json())
            // .then(data => {
            //     console.log('Issued book record deleted:', data);
            //     location.reload(); // Reload or remove row from DOM
            // })
            // .catch(error => console.error('Error deleting issued book record:', error));

            //alert(`Issued book record with ID ${issueIdToDelete} has been conceptually deleted.`); // For demonstration
            hideDeleteIssueConfirmationBox();
            location.reload(); // Reload the page to reflect changes (in a real app, you might update the DOM directly)
        });

        cancelDeleteIssueButton.addEventListener('click', hideDeleteIssueConfirmationBox);
        deleteIssueConfirmationBox.addEventListener('click', function(event) {
            if (event.target === deleteIssueConfirmationBox) {
                hideDeleteIssueConfirmationBox();
            }
        });

        // --- Edit functionality for Issued Books ---
        const editIssueButtons = document.querySelectorAll('.edit-issue-button');
        const editIssueMessageBox = document.getElementById('editIssueMessageBox');
        const editIssueId = document.getElementById('editIssueId');
        const editIssueMemberId = document.getElementById('editIssueMemberId');
        const editIssueMemberName = document.getElementById('editIssueMemberName');
        const editIssueISBN = document.getElementById('editIssueISBN');
        const editIssueBookTitle = document.getElementById('editIssueBookTitle');
        const editIssueDate = document.getElementById('editIssueDate');
        const editDueDate = document.getElementById('editDueDate');
        const saveEditIssueChangesButton = document.getElementById('saveEditIssueChangesButton');
        const cancelEditIssueButton = document.getElementById('cancelEditIssueButton');
        let currentEditIssueRow = null; // To store the table row being edited

        // New buttons for Renew and Return
        const renewBookButton = document.getElementById('renewBookButton');
        const returnBookButton = document.getElementById('returnBookButton');

        function showEditIssueMessageBox() {
            editIssueMessageBox.classList.add('show');
        }

        function hideEditIssueMessageBox() {
            editIssueMessageBox.classList.remove('show');
            currentEditIssueRow = null; // Clear the stored row
        }

        editIssueButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                currentEditIssueRow = this.closest('tr'); // Get the parent table row

                // Get data from the table cells based on their order
                // Member ID (0), Member Name (1), ISBN (2), Book (3), Issue Date (4), Due Date (5)
                const issueId = this.dataset.issueId; // Get from data-issue-id
                const memberId = currentEditIssueRow.children[0].textContent;
                const memberName = currentEditIssueRow.children[1].textContent;
                const isbn = currentEditIssueRow.children[2].textContent;
                const bookTitle = currentEditIssueRow.children[3].textContent;
                const issueDate = currentEditIssueRow.children[4].textContent;
                const dueDate = currentEditIssueRow.children[5].textContent;

                // Populate the edit form fields
                editIssueId.value = issueId;
                editIssueMemberId.value = memberId;
                editIssueMemberName.value = memberName;
                editIssueISBN.value = isbn;
                editIssueBookTitle.value = bookTitle;
                // For dates, you might need to reformat if your input type is 'date'
                // Example: "May 5, 2025" -> "2025-05-05"
                editIssueDate.value = new Date(issueDate).toISOString().split('T')[0];
                editDueDate.value = new Date(dueDate).toISOString().split('T')[0];

                showEditIssueMessageBox();
            });
        });

        saveEditIssueChangesButton.addEventListener('click', function() {
            const updatedIssue = {
                id: editIssueId.value,
                memberId: editIssueMemberId.value,
                memberName: editIssueMemberName.value,
                isbn: editIssueISBN.value,
                bookTitle: editIssueBookTitle.value,
                issueDate: editIssueDate.value,
                dueDate: editDueDate.value
            };

            console.log('Saving changes for issued book:', updatedIssue);
            // In a real application, you would send an AJAX POST/PUT request to your backend
            // e.g., fetch(`/api/issued-books/${updatedIssue.id}`, {
            //     method: 'PUT',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify(updatedIssue)
            // })
            // .then(response => response.json())
            // .then(data => {
            //     console.log('Issued book updated:', data);
            //     // Update the table row with new data
            //     if (currentEditIssueRow) {
            //         currentEditIssueRow.children[0].textContent = updatedIssue.memberId;
            //         currentEditIssueRow.children[1].textContent = updatedIssue.memberName;
            //         currentEditIssueRow.children[2].textContent = updatedIssue.isbn;
            //         currentEditIssueRow.children[3].textContent = updatedIssue.bookTitle;
            //         currentEditIssueRow.children[4].textContent = new Date(updatedIssue.issueDate).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
            //         currentEditIssueRow.children[5].textContent = new Date(updatedIssue.dueDate).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
            //     }
            //     hideEditIssueMessageBox();
            // })
            // .catch(error => console.error('Error updating issued book:', error));

            // alert('Issued book details updated conceptually!'); // For demonstration
            if (currentEditIssueRow) {
                currentEditIssueRow.children[0].textContent = updatedIssue.memberId;
                currentEditIssueRow.children[1].textContent = updatedIssue.memberName;
                currentEditIssueRow.children[2].textContent = updatedIssue.isbn;
                currentEditIssueRow.children[3].textContent = updatedIssue.bookTitle;
                currentEditIssueRow.children[4].textContent = new Date(updatedIssue.issueDate).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
                currentEditIssueRow.children[5].textContent = new Date(updatedIssue.dueDate).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
            }
            hideEditIssueMessageBox();
        });

        cancelEditIssueButton.addEventListener('click', hideEditIssueMessageBox);
        editIssueMessageBox.addEventListener('click', function(event) {
            if (event.target === editIssueMessageBox) {
                hideEditIssueMessageBox();
            }
        });

        // Renew Book Button Handler
        if (renewBookButton) {
            renewBookButton.addEventListener('click', function() {
                const issueIdToRenew = editIssueId.value;
                const currentDueDate = new Date(editDueDate.value);
                currentDueDate.setDate(currentDueDate.getDate() + 7); // Example: Renew for 7 more days
                const newDueDate = currentDueDate.toISOString().split('T')[0];

                if (confirm(`Are you sure you want to renew this book (Issue ID: ${issueIdToRenew}) until ${new Date(newDueDate).toLocaleDateString()}?`)) {
                    console.log(`Renewing book (Issue ID: ${issueIdToRenew}) to new due date: ${newDueDate}`);
                    // In a real application, send AJAX request to update the due date in the backend
                    // e.g., fetch(`/api/issued-books/${issueIdToRenew}/renew`, {
                    //     method: 'POST',
                    //     headers: { 'Content-Type': 'application/json' },
                    //     body: JSON.stringify({ newDueDate: newDueDate })
                    // })
                    // .then(response => response.json())
                    // .then(data => {
                    //     console.log('Book renewed:', data);
                    //     alert('Book renewed successfully!');
                    //     hideEditIssueMessageBox();
                    //     location.reload(); // Reload to show updated due date
                    // })
                    // .catch(error => console.error('Error renewing book:', error));

                    // alert(`Book (Issue ID: ${issueIdToRenew}) renewed until ${new Date(newDueDate).toLocaleDateString()}!`); // For demonstration
                    if (currentEditIssueRow) {
                        currentEditIssueRow.children[5].textContent = new Date(newDueDate).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
                    }
                    hideEditIssueMessageBox();
                }
            });
        }

        // Return Book Button Handler
        if (returnBookButton) {
            returnBookButton.addEventListener('click', function() {
                const issueIdToReturn = editIssueId.value;

                if (confirm(`Are you sure you want to return this book (Issue ID: ${issueIdToReturn})?`)) {
                    console.log(`Returning book (Issue ID: ${issueIdToReturn})`);
                    // In a real application, send AJAX request to mark the book as returned in the backend
                    // This might involve deleting the record or updating a 'returned' status
                    // e.g., fetch(`/api/issued-books/${issueIdToReturn}/return`, { method: 'POST' })
                    // .then(response => response.json())
                    // .then(data => {
                    //     console.log('Book returned:', data);
                    //     alert('Book returned successfully!');
                    //     hideEditIssueMessageBox();
                    //     location.reload(); // Reload to remove the returned book
                    // })
                    // .catch(error => console.error('Error returning book:', error));

                    // alert(`Book (Issue ID: ${issueIdToReturn}) marked as returned!`); // For demonstration
                    hideEditIssueMessageBox();
                    location.reload(); // Reload the page to simulate removal of the row
                }
            });
        }

        // --- View Details functionality (NEW) ---
        const viewDetailsButtons = document.querySelectorAll('.view-details-button');
        const viewDetailsMessageBox = document.getElementById('viewDetailsMessageBox');
        const closeDetailsButton = document.getElementById('closeDetailsButton');

        const viewDetailIssueId = document.getElementById('viewDetailIssueId');
        const viewDetailMemberId = document.getElementById('viewDetailMemberId');
        const viewDetailMemberName = document.getElementById('viewDetailMemberName');
        const viewDetailISBN = document.getElementById('viewDetailISBN');
        const viewDetailBookTitle = document.getElementById('viewDetailBookTitle');
        const viewDetailIssueDate = document.getElementById('viewDetailIssueDate');
        const viewDetailDueDate = document.getElementById('viewDetailDueDate');

        function showViewDetailsMessageBox() {
            viewDetailsMessageBox.classList.add('show');
        }

        function hideViewDetailsMessageBox() {
            viewDetailsMessageBox.classList.remove('show');
        }

        viewDetailsButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const row = this.closest('tr'); // Get the parent table row

                const issueId = this.dataset.issueId;
                const memberId = row.children[0].textContent;
                const memberName = row.children[1].textContent;
                const isbn = row.children[2].textContent;
                const bookTitle = row.children[3].textContent;
                const issueDate = row.children[4].textContent;
                const dueDate = row.children[5].textContent;

                // Populate the details message box
                viewDetailIssueId.textContent = issueId;
                viewDetailMemberId.textContent = memberId;
                viewDetailMemberName.textContent = memberName;
                viewDetailISBN.textContent = isbn;
                viewDetailBookTitle.textContent = bookTitle;
                viewDetailIssueDate.textContent = issueDate;
                viewDetailDueDate.textContent = dueDate;

                showViewDetailsMessageBox();
            });
        });

        closeDetailsButton.addEventListener('click', hideViewDetailsMessageBox);
        viewDetailsMessageBox.addEventListener('click', function(event) {
            if (event.target === viewDetailsMessageBox) {
                hideViewDetailsMessageBox();
            }
        });
    });
</script>