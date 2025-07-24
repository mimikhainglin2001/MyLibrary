<?php require_once APPROOT .'/views/inc/sidebar.php'; ?>
        <main class="main-content-area bg-blue-100 shadow-md">
            <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
                <h2 class="text-2xl font-bold text-gray-800">User List</h2>
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
                                <th class="table-header w-24">Member ID</th>
                                <th class="table-header w-48">Member Name</th>
                                <th class="table-header w-32">Year</th>
                                <th class="table-header w-32">Status</th>
                                <th class="table-header w-32">Details</th>
                                <th class="table-header w-48 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">1</td>
                                <td class="table-cell">John Doe Long Name</td>
                                <td class="table-cell">First Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="1"
                                        data-member-name="John Doe Long Name"
                                        data-member-year="First Year"
                                        data-member-status="Active"
                                        data-member-email="john.doe@example.com"
                                        data-member-phone="123-456-7890">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="1">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="1">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">2</td>
                                <td class="table-cell">Alice Wonderland</td>
                                <td class="table-cell">Second Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="2"
                                        data-member-name="Alice Wonderland"
                                        data-member-year="Second Year"
                                        data-member-status="Active"
                                        data-member-email="alice.w@example.com"
                                        data-member-phone="098-765-4321">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="2">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="2">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">3</td>
                                <td class="table-cell">Elle Fanning</td>
                                <td class="table-cell">Fifth Year</td>
                                <td class="table-cell">Inactive</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="3"
                                        data-member-name="Elle Fanning"
                                        data-member-year="Fifth Year"
                                        data-member-status="Inactive"
                                        data-member-email="elle.f@example.com"
                                        data-member-phone="111-222-3333">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="3">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="3">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">4</td>
                                <td class="table-cell">Kim Kardashian</td>
                                <td class="table-cell">Third Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="4"
                                        data-member-name="Kim Kardashian"
                                        data-member-year="Third Year"
                                        data-member-status="Active"
                                        data-member-email="kim.k@example.com"
                                        data-member-phone="444-555-6666">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="4">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="4">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">5</td>
                                <td class="table-cell">Jeon Jungkook</td>
                                <td class="table-cell">Fifth Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="5"
                                        data-member-name="Jeon Jungkook"
                                        data-member-year="Fifth Year"
                                        data-member-status="Active"
                                        data-member-email="jungkook@example.com"
                                        data-member-phone="777-888-9999">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="5">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="5">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">6</td>
                                <td class="table-cell">Austin Butler</td>
                                <td class="table-cell">Fourth Year</td>
                                <td class="table-cell">Inactive</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="6"
                                        data-member-name="Austin Butler"
                                        data-member-year="Fourth Year"
                                        data-member-status="Inactive"
                                        data-member-email="austin.b@example.com"
                                        data-member-phone="222-333-4444">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="6">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="6">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">7</td>
                                <td class="table-cell">Smith Johnson</td>
                                <td class="table-cell">First Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="7"
                                        data-member-name="Smith Johnson"
                                        data-member-year="First Year"
                                        data-member-status="Active"
                                        data-member-email="smith.j@example.com"
                                        data-member-phone="555-123-4567">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="7">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="7">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">8</td>
                                <td class="table-cell">TaeRi Kim</td>
                                <td class="table-cell">Second Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="8"
                                        data-member-name="TaeRi Kim"
                                        data-member-year="Second Year"
                                        data-member-status="Active"
                                        data-member-email="taeri.k@example.com"
                                        data-member-phone="999-888-7777">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="8">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="8">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">9</td>
                                <td class="table-cell">Charli D'Amelio</td>
                                <td class="table-cell">Third Year</td>
                                <td class="table-cell">Inactive</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="9"
                                        data-member-name="Charli D'Amelio"
                                        data-member-year="Third Year"
                                        data-member-status="Inactive"
                                        data-member-email="charli.d@example.com"
                                        data-member-phone="123-123-1234">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="9">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="9">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">10</td>
                                <td class="table-cell">Olivia Rodrigo</td>
                                <td class="table-cell">Second Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="10"
                                        data-member-name="Olivia Rodrigo"
                                        data-member-year="Second Year"
                                        data-member-status="Active"
                                        data-member-email="olivia.r@example.com"
                                        data-member-phone="000-111-2222">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="10">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="10">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">11</td>
                                <td class="table-cell">James Bond</td>
                                <td class="table-cell">First Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="11"
                                        data-member-name="James Bond"
                                        data-member-year="First Year"
                                        data-member-status="Active"
                                        data-member-email="james.b@example.com"
                                        data-member-phone="007-007-0007">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="11">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="11">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50">
                                <td class="table-cell">12</td>
                                <td class="table-cell">Daniel Radcliffe</td>
                                <td class="table-cell">Second Year</td>
                                <td class="table-cell">Active</td>
                                <td class="table-cell text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 view-details-button"
                                        data-member-id="12"
                                        data-member-name="Daniel Radcliffe"
                                        data-member-year="Second Year"
                                        data-member-status="Active"
                                        data-member-email="daniel.r@example.com"
                                        data-member-phone="987-654-3210">
                                        View 
                                    </button>
                                </td>
                                <td class="table-cell text-center flex items-center justify-center space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 edit-button" data-member-id="12">
                                        <i class="fas fa-edit mr-1"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 delete-button" data-member-id="12">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-8 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='<?php echo URLROOT;?>/admin/adminDashboard'">
                        <i class="fas fa-arrow-left mr-2"></i>Back
                    </button>
                </div>
            </div>
        </main>
    </div>

    <div id="deleteConfirmationBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-4">Confirm Deletion</h4>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this user? This action cannot be undone.</p>
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

    <div id="editUserMessageBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-6">Edit User Details</h4>
            <div class="space-y-4 text-left">
                <div>
                    <label for="editMemberId" class="block text-gray-700 text-sm font-bold mb-2">Member ID:</label>
                    <input type="text" id="editMemberId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 cursor-not-allowed" readonly>
                </div>
                <div>
                    <label for="editMemberName" class="block text-gray-700 text-sm font-bold mb-2">Member Name:</label>
                    <input type="text" id="editMemberName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="editMemberYear" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
                    <input type="text" id="editMemberYear" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="editMemberStatus" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select id="editMemberStatus" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 flex justify-center space-x-4">
                <button id="saveEditUserChangesButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                    Save Changes
                </button>
                <button id="cancelEditUserButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-300">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <div id="viewDetailsMessageBox" class="message-box-overlay">
        <div class="message-box-content">
            <h4 class="text-2xl font-bold text-gray-800 mb-6">User Details</h4>
            <div class="space-y-4 text-left">
                <div>
                    <strong class="block text-gray-700 text-sm font-bold mb-1">Member ID:</strong>
                    <span id="viewMemberId" class="text-gray-700"></span>
                </div>
                <div>
                    <strong class="block text-gray-700 text-sm font-bold mb-1">Member Name:</strong>
                    <span id="viewMemberName" class="text-gray-700"></span>
                </div>
                <div>
                    <strong class="block text-gray-700 text-sm font-bold mb-1">Year:</strong>
                    <span id="viewMemberYear" class="text-gray-700"></span>
                </div>
                <div>
                    <strong class="block text-gray-700 text-sm font-bold mb-1">Status:</strong>
                    <span id="viewMemberStatus" class="text-gray-700"></span>
                </div>
                <div>
                    <strong class="block text-gray-700 text-sm font-bold mb-1">Email:</strong>
                    <span id="viewMemberEmail" class="text-gray-700"></span>
                </div>
                <div>
                    <strong class="block text-gray-700 text-sm font-bold mb-1">Phone Number:</strong>
                    <span id="viewMemberPhone" class="text-gray-700"></span>
                </div>
            </div>
            <div class="mt-8 flex justify-center">
                <button id="closeViewDetailsButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-300">
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
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Delete functionality
            const deleteButtons = document.querySelectorAll('.delete-button');
            const deleteConfirmationBox = document.getElementById('deleteConfirmationBox');
            const confirmDeleteButton = document.getElementById('confirmDeleteButton');
            const cancelDeleteButton = document.getElementById('cancelDeleteButton');
            let memberIdToDelete = null;

            // Edit functionality
            const editButtons = document.querySelectorAll('.edit-button');
            const editUserMessageBox = document.getElementById('editUserMessageBox');
            const editMemberId = document.getElementById('editMemberId');
            const editMemberName = document.getElementById('editMemberName');
            const editMemberYear = document.getElementById('editMemberYear');
            const editMemberStatus = document.getElementById('editMemberStatus');
            const saveEditUserChangesButton = document.getElementById('saveEditUserChangesButton');
            const cancelEditUserButton = document.getElementById('cancelEditUserButton');
            let currentEditRow = null; // To store the table row being edited

            // View Details functionality
            const viewDetailsButtons = document.querySelectorAll('.view-details-button');
            const viewDetailsMessageBox = document.getElementById('viewDetailsMessageBox');
            const viewMemberId = document.getElementById('viewMemberId');
            const viewMemberName = document.getElementById('viewMemberName');
            const viewMemberYear = document.getElementById('viewMemberYear');
            const viewMemberStatus = document.getElementById('viewMemberStatus');
            const viewMemberEmail = document.getElementById('viewMemberEmail');
            const viewMemberPhone = document.getElementById('viewMemberPhone');
            const closeViewDetailsButton = document.getElementById('closeViewDetailsButton');


            // --- Delete Confirmation Message Box Functions ---
            function showDeleteConfirmationBox() {
                deleteConfirmationBox.classList.add('show');
            }

            function hideDeleteConfirmationBox() {
                deleteConfirmationBox.classList.remove('show');
                memberIdToDelete = null;
            }

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    memberIdToDelete = this.dataset.memberId;
                    showDeleteConfirmationBox();
                });
            });

            confirmDeleteButton.addEventListener('click', function() {
                console.log(`Deleting user with ID: ${memberIdToDelete}`);
                // In a real application, send AJAX DELETE request
                // alert(`User with ID ${memberIdToDelete} has been conceptually deleted.`);
                hideDeleteConfirmationBox();
                // Optionally remove the row from the DOM or refresh the table
                location.reload();
            });

            cancelDeleteButton.addEventListener('click', hideDeleteConfirmationBox);
            deleteConfirmationBox.addEventListener('click', function(event) {
                if (event.target === deleteConfirmationBox) {
                    hideDeleteConfirmationBox();
                }
            });

            // --- Edit User Message Box Functions ---
            function showEditUserMessageBox() {
                editUserMessageBox.classList.add('show');
            }

            function hideEditUserMessageBox() {
                editUserMessageBox.classList.remove('show');
                currentEditRow = null; // Clear the stored row
            }

            editButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    currentEditRow = this.closest('tr'); // Get the parent table row

                    const memberId = currentEditRow.children[0].textContent;
                    const memberName = currentEditRow.children[1].textContent;
                    const memberYear = currentEditRow.children[2].textContent;
                    const memberStatus = currentEditRow.children[3].textContent;

                    // Populate the edit form fields
                    editMemberId.value = memberId;
                    editMemberName.value = memberName;
                    editMemberYear.value = memberYear;
                    editMemberStatus.value = memberStatus; // Set dropdown value

                    showEditUserMessageBox();
                });
            });

            saveEditUserChangesButton.addEventListener('click', function() {
                const updatedUser = {
                    id: editMemberId.value,
                    name: editMemberName.value,
                    year: editMemberYear.value,
                    status: editMemberStatus.value
                };

                console.log('Saving changes for user:', updatedUser);
                // In a real application, you would send an AJAX POST/PUT request to your backend
                // with the updatedUser data.
                // Example:
                // fetch(`/api/users/${updatedUser.id}`, {
                //      method: 'PUT',
                //      headers: { 'Content-Type': 'application/json' },
                //      body: JSON.stringify(updatedUser)
                // })
                // .then(response => response.json())
                // .then(data => {
                //      console.log('User updated:', data);
                //      // Update the table row with new data
                //      currentEditRow.children[1].textContent = updatedUser.name;
                //      currentEditRow.children[2].textContent = updatedUser.year;
                //      currentEditRow.children[3].textContent = updatedUser.status;
                //      hideEditUserMessageBox();
                // })
                // .catch(error => console.error('Error updating user:', error));

                // alert(`User ID ${updatedUser.id} conceptually updated!`); // For demonstration

                // Update the visible table row for demonstration
                if (currentEditRow) {
                    currentEditRow.children[1].textContent = updatedUser.name;
                    currentEditRow.children[2].textContent = updatedUser.year;
                    currentEditRow.children[3].textContent = updatedUser.status;
                }
                hideEditUserMessageBox();
            });

            cancelEditUserButton.addEventListener('click', hideEditUserMessageBox);

            editUserMessageBox.addEventListener('click', function(event) {
                if (event.target === editUserMessageBox) {
                    hideEditUserMessageBox();
                }
            });

            // --- View Details Message Box Functions ---
            function showViewDetailsMessageBox() {
                viewDetailsMessageBox.classList.add('show');
            }

            function hideViewDetailsMessageBox() {
                viewDetailsMessageBox.classList.remove('show');
            }

            viewDetailsButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    // Get data from data attributes
                    const memberId = this.dataset.memberId;
                    const memberName = this.dataset.memberName;
                    const memberYear = this.dataset.memberYear;
                    const memberStatus = this.dataset.memberStatus;
                    const memberEmail = this.dataset.memberEmail;
                    const memberPhone = this.dataset.memberPhone;

                    // Populate the view details fields
                    viewMemberId.textContent = memberId;
                    viewMemberName.textContent = memberName;
                    viewMemberYear.textContent = memberYear;
                    viewMemberStatus.textContent = memberStatus;
                    viewMemberEmail.textContent = memberEmail;
                    viewMemberPhone.textContent = memberPhone;

                    showViewDetailsMessageBox();
                });
            });

            closeViewDetailsButton.addEventListener('click', hideViewDetailsMessageBox);

            viewDetailsMessageBox.addEventListener('click', function(event) {
                if (event.target === viewDetailsMessageBox) {
                    hideViewDetailsMessageBox();
                }
            });
        });
    </script>
</body>
</html>