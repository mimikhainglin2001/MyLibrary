<?php require_once APPROOT.'/views/inc/nav.php' ?>

<main class="profile-page-main">
    <section class="profile-details-section">
        <div class="profile-container">
            <h1>User Profile</h1>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['user']->id) : ?>
                <p>Welcome, <?php echo htmlspecialchars($data['user']->name); ?>! 👋</p>
            <?php endif; ?>

            <div class="profile-info-grid">
                <div class="profile-info-item">
                    <strong>Name:</strong>
                    <span><?php echo htmlspecialchars($data['user']->name); ?></span>
                </div>
                <div class="profile-info-item">
                    <strong>Email:</strong>
                    <span><?php echo htmlspecialchars($data['user']->email); ?></span>
                </div>
                <div class="profile-info-item">
                    <strong>Joined:</strong>
                    <span><?php echo date('F j, Y', strtotime($data['user']->created_at)); ?></span>
                </div>
                <?php if (isset($data['user']->address)) : // Example of optional fields ?>
                    <div class="profile-info-item">
                        <strong>Address:</strong>
                        <span><?php echo htmlspecialchars($data['user']->address); ?></span>
                    </div>
                <?php endif; ?>
                <?php if (isset($data['user']->phone)) : ?>
                    <div class="profile-info-item">
                        <strong>Phone:</strong>
                        <span><?php echo htmlspecialchars($data['user']->phone); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['user']->id) : ?>
                <div class="profile-actions">
                    <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $data['user']->id; ?>" class="btn btn-primary">Edit Profile</a>
                    </div>
            <?php endif; ?>
        </div>
    </section>
    <div class="navigation-buttons">
        <button class="back-btn" onclick="history.back()"><i class="fas fa-undo"></i> Back</button>
    </div>
</main>

<?php require_once APPROOT.'/views/inc/footer.php' ?>