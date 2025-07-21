<?php 
$name = $_SESSION['name'] ?? 'Admin'; // Default to 'Admin' if not set
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Library</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link to external CSS file (assuming admin.css handles responsive adjustments for sidebar/main content) -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/librarycss/adminDashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/librarycss/manageMember.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/librarycss/manageBook.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/librarycss/issueBook.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/librarycss/addnewBook.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR3 authorization/lQfrg1Bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="bg-gray-100">

    <!-- Main Content Area with Sidebar -->
    <div class="body-flex-container">
        <aside class="sidebar-container bg-blue-900 text-white flex flex-col shadow-lg">
            <div class="p-6 text-2xl font-bold border-b border-blue-800 hidden sm:block">
                ADMIN DASHBOARD
            </div>
            <nav class="flex-1 mt-6">
                <ul>
                    <li class="mb-2">
                        <a href="<?php echo URLROOT;?>/admin/adminDashboard" class="flex items-center p-4 text-blue-100 hover:bg-blue-700 transition duration-300 rounded-lg">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo URLROOT;?>/admin/manageMember" class="flex items-center p-4 text-blue-100 bg-blue-700 transition duration-300 rounded-lg">
                            <i class="fas fa-users mr-3"></i>
                            Manage Members
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo URLROOT;?>/admin/manageBook" class="flex items-center p-4 text-blue-100 hover:bg-blue-700 transition duration-300 rounded-lg">
                            <i class="fas fa-book mr-3"></i>
                            Manage Books
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo URLROOT;?>/admin/issueBook" class="flex items-center p-4 text-blue-100 hover:bg-blue-700 transition duration-300 rounded-lg">
                            <i class="fas fa-plus-circle mr-3"></i>
                            Issue
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo URLROOT;?>/admin/returnBook" class="flex items-center p-4 text-blue-100 hover:bg-blue-700 transition duration-300 rounded-lg">
                            <i class="fas fa-undo-alt mr-3"></i>
                            Return
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo URLROOT;?>/admin/addnewBook" class="flex items-center p-4 text-blue-100 hover:bg-blue-700 transition duration-300 rounded-lg">
                            <i class="fas fa-undo-alt mr-3"></i>
                            Add New Book
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo URLROOT;?>/admin/reservation" class="flex items-center p-4 text-blue-100 hover:bg-blue-700 transition duration-300 rounded-lg">
                            <i class="fas fa-clipboard-list mr-3"></i>
                            Reservations
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="mt-auto p-6 border-t border-blue-800">
                <a href="<?php echo URLROOT;?>/pages/login" id="logoutButton" class="flex items-center p-4 text-blue-100 hover:bg-blue-700 transition duration-300 rounded-lg">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </div>
        </aside>