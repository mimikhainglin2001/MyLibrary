<?php require_once APPROOT . '/views/inc/header.php'; ?>

<style>
    .main-content-area {
        background-color: #ebf8ff;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .text-3xl {
        font-size: 1.875rem;
        font-weight: 700;
        color: #2d3748;
    }

    .text-xl {
        font-size: 1.25rem;
        font-weight: 600;
        color: #4a5568;
    }

    .text-gray-600 {
        color: #718096;
    }

    .text-gray-700 {
        color: #4a5568;
    }

    .text-gray-800 {
        color: #2d3748;
    }

    .bg-white {
        background-color: #ffffff;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .shadow-md {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .p-6 {
        padding: 1.5rem;
    }

    .mb-6 {
        margin-bottom: 1.5rem;
    }

    .mb-8 {
        margin-bottom: 2rem;
    }

    .space-x-6 {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    .space-y-2 li {
        margin-bottom: 0.5rem;
    }

    .grid {
        display: grid;
        gap: 1.5rem;
    }

    .grid-cols-1 {
        grid-template-columns: 1fr;
    }

    @media (min-width: 768px) {
        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .mt-8 {
        margin-top: 2rem;
    }

    .flex {
        display: flex;
        align-items: center;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .gap-4 {
        gap: 1rem;
    }

    .bg-blue-600 {
        background-color: #2563eb;
    }

    .bg-blue-600:hover {
        background-color: #1e40af;
    }

    .bg-yellow-600 {
        background-color: #d97706;
    }

    .bg-yellow-600:hover {
        background-color: #b45309;
    }

    .text-white {
        color: #fff;
    }

    .font-semibold {
        font-weight: 600;
    }

    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .transition {
        transition: all 0.3s ease;
    }

    .fas {
        margin-right: 0.5rem;
    }

    .text-blue-500 {
        color: #3b82f6;
    }

    .text-6xl {
        font-size: 3.75rem;
    }
</style>

<main class="main-content-area">
    <h2 class="text-3xl mb-6">User Profile</h2>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="space-x-6 mb-6">
            <i class="fas fa-user-circle text-blue-500 text-6xl"></i>
            <div>
                <p class="text-3xl">
                    <?php echo htmlspecialchars($data['name'] ?? 'User'); ?>
                </p>
                <p class="text-gray-600">Member</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-xl mb-3">Contact Information</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Name:</strong> <?php echo htmlspecialchars($data['loginuser']['name']); ?></li>
                    <li><strong>Email:</strong> <?php echo htmlspecialchars($data['loginuser']['email']); ?></li>
                    <li><strong>Gender:</strong> <?php echo htmlspecialchars($data['loginuser']['gender']); ?></li>
                    <li><strong>Roll No:</strong> <?php echo htmlspecialchars($data['loginuser']['rollno']); ?></li>
                    <li><strong>Year:</strong> <?php echo htmlspecialchars($data['loginuser']['year']); ?></li>
                    <li><strong>Role : </strong>
                        <?php echo htmlspecialchars($data['loginuser']['role_name'] ?? 'N/A'); ?>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-8">

            <div class="flex flex-wrap gap-4">
                <a href="<?php echo URLROOT; ?>/pages/editProfile/<?php echo $data['loginuser']['id']; ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    <i class="fas fa-edit"></i>Edit Profile
                </a>
                <a href="<?php echo URLROOT; ?>/pages/changeProfilePassword/<?php echo $data['loginuser']['id']; ?>" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    <i class="fas fa-key"></i>Change Password
                </a>
            </div>
        </div>
    </div>
</main>
