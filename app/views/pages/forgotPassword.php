<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password — MySite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-soft: 0 8px 32px rgba(31, 38, 135, 0.15);
            --shadow-hover: 0 15px 35px rgba(31, 38, 135, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .forgot-container {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow-soft);
            padding: 3rem;
            width: 100%;
            max-width: 480px;
            position: relative;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-section {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .lock-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 90px;
            height: 90px;
            background: var(--success-gradient);
            border-radius: 22px;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 25px rgba(56, 239, 125, 0.3);
            animation: float 3s ease-in-out infinite;
            position: relative;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        .lock-icon::before {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }

        .lock-icon i {
            font-size: 2.5rem;
            color: white;
            z-index: 2;
            position: relative;
        }

        .main-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.75rem;
            letter-spacing: -0.025em;
        }

        .subtitle {
            color: #64748b;
            font-size: 1.1rem;
            font-weight: 400;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .description {
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.5;
            max-width: 360px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 1.25rem 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-size: 1.1rem;
            color: #1e293b;
            background: #ffffff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            position: relative;
        }

        .form-input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .form-input:focus {
            outline: none;
            border-color: #11998e;
            box-shadow: 0 0 0 4px rgba(17, 153, 142, 0.1);
            transform: translateY(-2px);
        }

        .form-input:valid {
            border-color: #10b981;
        }

        .input-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.1rem;
            z-index: 10;
            transition: color 0.3s ease;
        }

        .form-input:focus + .input-icon {
            color: #11998e;
        }

        .form-input-with-icon {
            padding-left: 3.25rem;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .submit-btn {
            flex: 1;
            background: var(--success-gradient);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 0.45rem 2rem;
            border: none;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(17, 153, 142, 0.4);
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(17, 153, 142, 0.5);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .cancel-btn {
            flex: 1;
            background: #f8fafc;
            color: #64748b;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 0.45rem 2rem;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .cancel-btn:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.15);
            color: #475569;
        }

        .cancel-btn:active {
            transform: translateY(-1px);
        }

        .register-link {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
            position: relative;
        }

        .register-link::before {
            content: 'OR';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0 1rem;
        }

        .register-link p {
            color: #64748b;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .register-link a {
            color: #11998e;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            margin-left: 0.25rem;
            transition: all 0.2s ease;
            position: relative;
        }

        .register-link a:hover {
            color: #0f766e;
            transform: translateY(-1px);
        }

        .register-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--success-gradient);
            transition: width 0.3s ease;
        }

        .register-link a:hover::after {
            width: 100%;
        }

        .security-note {
            background: linear-gradient(135deg, rgba(17, 153, 142, 0.05), rgba(56, 239, 125, 0.05));
            border: 1px solid rgba(17, 153, 142, 0.1);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .security-icon {
            width: 40px;
            height: 40px;
            background: var(--success-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .security-text {
            color: #475569;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .forgot-container {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .main-title {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .lock-icon {
                width: 80px;
                height: 80px;
                margin-bottom: 1rem;
            }

            .lock-icon i {
                font-size: 2rem;
            }

            .form-input {
                padding: 1rem 1.25rem;
                font-size: 1rem;
            }

            .input-icon {
                left: 1rem;
            }

            .form-input-with-icon {
                padding-left: 2.75rem;
            }

            .button-group {
                flex-direction: column;
                gap: 0.75rem;
            }

            .submit-btn, .cancel-btn {
                padding: 1rem 1.5rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .forgot-container {
                padding: 1.5rem 1rem;
            }

            .main-title {
                font-size: 1.75rem;
            }

            .security-note {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
        }

        /* Animation for form validation */
        .form-input.error {
            border-color: #ef4444;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Loading state for submit button */
        .submit-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .submit-btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <div class="hero-section">
            <div class="lock-icon">
                <i class="fas fa-lock"></i>
            </div>
            <h1 class="main-title">Forgot Password?</h1>
            <p class="subtitle">Reset Your Password With Email</p>
            
        </div>

     

        <form class="space-y-6" method="POST" action="<?php echo URLROOT; ?>/auth/forgotPassword" id="forgotForm">
            <?php require APPROOT.'/views/components/auth_message.php'; ?>
            
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Enter your email address" required class="form-input form-input-with-icon" />
                <i class="fas fa-envelope input-icon"></i>
            </div>

            <div class="button-group">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane" style="margin-right: 0.5rem;"></i>
                    Send Reset Link
                </button>
                <a href="<?php echo URLROOT; ?>/pages/login" class="cancel-btn">
                    <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>
                    Back to Login
                </a>
            </div>
        </form>

        <div class="register-link">
            <p>Don't have an account?</p>
            <a href="<?php echo URLROOT; ?>/pages/register">Create New Account</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const form = document.getElementById('forgotForm');
            const emailInput = document.getElementById('email');
            
            emailInput.addEventListener('blur', function() {
                if (!this.checkValidity()) {
                    this.classList.add('error');
                } else {
                    this.classList.remove('error');
                }
            });

            emailInput.addEventListener('input', function() {
                if (this.classList.contains('error') && this.checkValidity()) {
                    this.classList.remove('error');
                }
            });

            // Submit button loading state
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('.submit-btn');
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 0.5rem;"></i>Sending...';
            });

            // Enhanced input focus animation
            emailInput.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            emailInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>
</html>