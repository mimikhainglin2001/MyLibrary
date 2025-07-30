<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>

<main class="main-content-area bg-blue-100 shadow-md p-8 min-h-screen">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Change Password</h2>

    <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
        <form action="<?php echo URLROOT; ?>/admin/changePassword/<?php echo isset($data['loginuser']['id']) ? $data['loginuser']['id'] : ''; ?>" method="POST" class="space-y-6">

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Current Password</label>
                <input type="password" name="currentPassword" value=""
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">New Password</label>
                <input type="password" name="newPassword" value=""
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Confirm Password</label>
                <input type="password" name="confirmPassword" value=""
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</main>
