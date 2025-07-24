
<?php require_once APPROOT . '/views/inc/sidebar.php'; // Your existing sidebar ?>

<main class="main-content-area bg-blue-100 shadow-md p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Admin Profile</h2>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-6 mb-6">
            <i class="fas fa-user-circle text-blue-500 text-6xl"></i>
            <div>
                <p class="text-3xl font-semibold text-gray-800"><?php echo htmlspecialchars($data['name'] ?? 'Admin User'); ?></p>
                <p class="text-gray-600">Admin</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-3">Contact Information</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Name : </strong> <?php echo htmlspecialchars($data['loginuser']['name']); ?></li>
                    <li><strong>Email : </strong> <?php echo htmlspecialchars($data['loginuser']['email']); ?></li>
                    <li><strong>Gender : </strong> <?php echo htmlspecialchars($data['loginuser']['gender']); ?></li>
                    <!-- <li><strong>Role : </strong> <?php echo htmlspecialchars($data['loginuser']['role_id']); ?></li> -->
                </ul>
            </div>
            <!-- <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-3">Account Details</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>User ID:</strong> <?php echo htmlspecialchars($data['id'] ?? 'N/A'); ?></li>
                    <li><strong>Registered On:</strong> <?php echo htmlspecialchars($data['registered_at'] ?? 'N/A'); ?></li>
                    <li><strong>Role:</strong> Administrator</li>
                </ul>
            </div> -->
        </div>

        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-3">Actions</h3>
            <div class="flex flex-wrap gap-4">
                <a href="<?php echo URLROOT; ?>/admin/edit_profile" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    <i class="fas fa-edit mr-2"></i>Edit Profile
                </a>
                <a href="<?php echo URLROOT; ?>/admin/change_password" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    <i class="fas fa-key mr-2"></i>Change Password
                </a>
                </div>
        </div>
    </div>
</main>