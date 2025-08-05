<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $email = $_SESSION['post_email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP — MySite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --info-gradient: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

        .otp-container {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow-soft);
            padding: 3rem;
            width: 100%;
            max-width: 500px;
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

        .security-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100px;
            background: var(--success-gradient);
            border-radius: 25px;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 25px rgba(56, 239, 125, 0.3);
            animation: float 3s ease-in-out infinite;
            position: relative;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        .security-icon::before {
            content: '';
            position: absolute;
            top: -8px;
            right: -8px;
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.2); }
        }

        .security-icon i {
            font-size: 2.75rem;
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

        .email-display {
            background: linear-gradient(135deg, rgba(17, 153, 142, 0.1), rgba(56, 239, 125, 0.1));
            border: 1px solid rgba(17, 153, 142, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .email-icon {
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

        .email-info {
            flex: 1;
        }

        .email-label {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .email-address {
            font-size: 1rem;
            color: #1e293b;
            font-weight: 600;
            word-break: break-all;
        }

        .otp-section {
            margin-bottom: 2.5rem;
        }

        .otp-label {
            text-align: center;
            color: #475569;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .otp-inputs {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .otp-input {
            width: 60px;
            height: 60px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            background: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
        }

        .otp-input:focus {
            border-color: #11998e;
            box-shadow: 0 0 0 4px rgba(17, 153, 142, 0.1);
            transform: translateY(-2px);
        }

        .otp-input:valid {
            border-color: #10b981;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(56, 239, 125, 0.05));
        }

        .otp-input.error {
            border-color: #ef4444;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .submit-btn {
            width: 100%;
            background: var(--success-gradient);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 1.25rem 2rem;
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

        .resend-btn {
            width: 100%;
            background: var(--info-gradient);
            color: white;
            font-weight: 600;
            font-size: 1rem;
            padding: 1rem 2rem;
            border: none;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
            position: relative;
            overflow: hidden;
        }

        .resend-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .resend-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        }

        .resend-btn:hover::before {
            left: 100%;
        }

        .resend-btn:active {
            transform: translateY(-1px);
        }

        .timer-section {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .timer-text {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .timer-display {
            font-size: 1.25rem;
            font-weight: 700;
            color: #11998e;
        }

        .timer-display.expired {
            color: #ef4444;
        }

        .help-section {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.25rem;
            text-align: center;
        }

        .help-icon {
            width: 35px;
            height: 35px;
            background: var(--info-gradient);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            margin-bottom: 0.75rem;
        }

        .help-text {
            color: #475569;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .otp-container {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .main-title {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .security-icon {
                width: 80px;
                height: 80px;
                margin-bottom: 1rem;
            }

            .security-icon i {
                font-size: 2.25rem;
            }

            .otp-inputs {
                gap: 0.5rem;
            }

            .otp-input {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }

            .submit-btn, .resend-btn {
                padding: 1rem 1.5rem;
                font-size: 1rem;
            }

            .email-display {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .otp-container {
                padding: 1.5rem 1rem;
            }

            .main-title {
                font-size: 1.75rem;
            }

            .otp-inputs {
                gap: 0.375rem;
            }

            .otp-input {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
        }

        /* Loading states */
        .submit-btn.loading, .resend-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .submit-btn.loading::after, .resend-btn.loading::after {
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
    <div class="otp-container">
        <div class="hero-section">
            <div class="security-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1 class="main-title">Verify Your Identity</h1>
            <p class="subtitle">Enter the 6-digit verification code</p>
        </div>

        <div class="email-display">
            <div class="email-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="email-info">
                <div class="email-label">Code sent to:</div>
                <div class="email-address"><?php echo $_SESSION['post_email'] ?? 'your email'; ?></div>
            </div>
        </div>

        <div class="otp-section">
            <div class="otp-label">Enter verification code</div>
            
            <form method="post" action="<?php echo URLROOT; ?>/auth/verify_otp" id="otpForm">
                <div class="otp-inputs">
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp1" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp2" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp3" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp4" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp5" required>
                    <input type="text" maxlength="1" class="otp-input" name="otp[]" id="otp6" required>
                </div>

                <div class="button-group">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                        Verify Code
                    </button>
                </div>
            </form>

            <div class="timer-section">
                <div class="timer-text">Code expires in:</div>
                <div class="timer-display" id="timer">05:00</div>
            </div>

            <form method="post" action="<?php echo URLROOT; ?>/auth/resendOtp" id="resendForm">
                <button type="submit" class="resend-btn" id="resendBtn">
                    <i class="fas fa-redo-alt" style="margin-right: 0.5rem;"></i>
                    Resend Code
                </button>
            </form>
        </div>

        <div class="help-section">
            <div class="help-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="help-text">
                <strong>Didn't receive the code?</strong><br>
                Check your spam folder or click "Resend Code" to get a new verification code.
            </div>
        </div>
    </div>

    <script>
        // OTP input handling
        const otpInputs = document.querySelectorAll('.otp-input');
        const otpForm = document.getElementById('otpForm');
        const resendForm = document.getElementById('resendForm');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                // Allow only numbers
                input.value = input.value.replace(/[^0-9]/g, '');

                // Remove error state when user starts typing
                input.classList.remove('error');

                // Auto-focus next input
                if (input.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }

                // Auto-submit when all fields are filled
                if (index === otpInputs.length - 1 && input.value.length === 1) {
                    const allFilled = Array.from(otpInputs).every(inp => inp.value.length === 1);
                    if (allFilled) {
                        setTimeout(() => {
                            otpForm.querySelector('.submit-btn').click();
                        }, 300);
                    }
                }
            });

            input.addEventListener('keydown', (e) => {
                // Handle backspace
                if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    otpInputs[index - 1].focus();
                }

                // Handle paste
                if (e.key === 'Enter') {
                    e.preventDefault();
                    otpForm.querySelector('.submit-btn').click();
                }
            });

            // Handle paste event
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
                
                if (pastedData.length === 6) {
                    otpInputs.forEach((inp, idx) => {
                        if (idx < pastedData.length) {
                            inp.value = pastedData[idx];
                        }
                    });
                    otpInputs[5].focus();
                }
            });
        });

        // Timer functionality
        let timeLeft = 300; // 5 minutes in seconds
        const timerDisplay = document.getElementById('timer');
        const resendBtn = document.getElementById('resendBtn');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            if (timeLeft <= 0) {
                timerDisplay.textContent = 'Expired';
                timerDisplay.classList.add('expired');
                resendBtn.style.opacity = '1';
                resendBtn.disabled = false;
                clearInterval(timerInterval);
            } else if (timeLeft <= 60) {
                timerDisplay.classList.add('expired');
            }

            timeLeft--;
        }

        const timerInterval = setInterval(updateTimer, 1000);
        updateTimer();

        // Form submission handling
        otpForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.submit-btn');
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 0.5rem;"></i>Verifying...';
        });

        resendForm.addEventListener('submit', function(e) {
            const resendBtn = this.querySelector('.resend-btn');
            resendBtn.classList.add('loading');
            resendBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 0.5rem;"></i>Sending...';
            
            // Reset timer
            timeLeft = 300;
            timerDisplay.classList.remove('expired');
        });

        // Add error state for invalid OTP (you can trigger this from PHP)
        function showOTPError() {
            otpInputs.forEach(input => {
                input.classList.add('error');
                input.value = '';
            });
            otpInputs[0].focus();
        }

        // Focus first input on page load
        window.addEventListener('load', () => {
            otpInputs[0].focus();
        });
    </script>
</body>
</html>