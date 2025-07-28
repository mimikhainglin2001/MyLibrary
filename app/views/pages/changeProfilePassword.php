<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div style="max-width: 600px; margin: 40px auto; background: #f9fafb; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); font-family: Arial, sans-serif;">

    <h2 style="text-align: center; color: #1f2937; margin-bottom: 24px;">Change Password</h2>

    <form action="" method="POST" style="display: flex; flex-direction: column; gap: 20px;">

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: bold; color: #374151;">Current Password</label>
            <input type="password" name="current_password"
                   style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: bold; color: #374151;">New Password</label>
            <input type="password" name="new_password"
                   style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: bold; color: #374151;">Confirm New Password</label>
            <input type="password" name="confirm_password"
                   style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">
        </div>

        <div style="text-align: center; margin-top: 10px;">
            <button type="submit"
                    style="background-color: #10b981; color: white; padding: 10px 20px; font-weight: bold; border: none; border-radius: 8px; cursor: pointer;">
                Change Password
            </button>
        </div>

    </form>
</div>
