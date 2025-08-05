<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR3authorization/lQfrg1Bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Inter, sans-serif;
            font-weight: 16px;
            min-height: 100vh;
            padding: 20px;
            background: #DBEAFE;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
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

        .header {
            background: #1e3a8a;
            color: white;
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="books" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect width="20" height="20" fill="none"/><path d="M2 2h16v16H2z" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23books)"/></svg>') repeat;
            opacity: 0.1;
        }

        .header h2 {
            font-size: 1.8rem;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        .header .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .form-container {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-input:focus {
            outline: none;
            border-color: #4CAF50;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-display {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 16px;
            border: 2px dashed #e1e5e9;
            border-radius: 10px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-input-display:hover {
            border-color: #4CAF50;
            background-color: #f0f8f0;
        }

        .file-input-display i {
            margin-right: 8px;
            color: #666;
        }

        .quantity-wrapper {
            display: flex;
            align-items: center;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        .quantity-btn {
            background: #f8f9fa;
            border: none;
            padding: 12px 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #666;
        }

        .quantity-btn:hover {
            background: #1e3a8a;
            color: white;
        }

        .quantity-input {
            border: none;
            padding: 12px 16px;
            text-align: center;
            flex: 1;
            font-size: 1rem;
            background: white;
        }

        .quantity-input:focus {
            outline: none;
        }

        .submit-btn {
            width: 100%;
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(76, 175, 80, 0.3);
        }

        .back-btn {
            width: 100%;
            background: white;
            color: #666;
            border: 2px solid #e1e5e9;
            padding: 12px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .back-btn:hover {
            background: #f8f9fa;
            border-color: #ccc;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .container {
                margin: 10px auto;
                border-radius: 15px;
            }

            .header {
                padding: 20px 15px;
            }

            .header h2 {
                font-size: 1.5rem;
            }

            .header .icon {
                font-size: 2rem;
            }

            .form-container {
                padding: 20px;
            }

            .form-group {
                margin-bottom: 16px;
            }

            .form-input,
            .submit-btn,
            .back-btn {
                padding: 10px 12px;
            }

            .quantity-btn {
                padding: 10px 12px;
            }

            .quantity-input {
                padding: 10px 12px;
            }
        }

        @media (max-width: 480px) {
            .header h2 {
                font-size: 1.3rem;
            }

            .form-container {
                padding: 16px;
            }

            .form-input {
                font-size: 0.95rem;
            }
        }

        /* Loading animation for form submission */
        .loading {
            position: relative;
            color: transparent !important;
        }

        .loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid transparent;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="icon">
                <i class="fas fa-book-open"></i>
            </div>
            <h2>Add New Book</h2>
        </div>

        <div class="form-container">
            <form id="addBookForm" method="POST" action="<?php echo URLROOT; ?>/book/registerBook" enctype="multipart/form-data">
                <?php require APPROOT . '/views/components/auth_message.php'; ?>

                <!-- Message placeholder -->
                <div id="messageContainer"></div>

                <div class="form-group">
                    <label for="chooseImage">Book Cover Image</label>
                    <div class="file-input-wrapper">
                        <input type="file" name="image" id="chooseImage" class="file-input" accept="image/*">
                        <div class="file-input-display">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Choose book cover image</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" name="title" id="title" class="form-input" placeholder="Enter book title" required>
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-input" placeholder="Enter author name" required>
                </div>

                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-input" placeholder="Enter ISBN number" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-input" required>
                        <option value="">Select a category</option>
                        <option value="Literary Book">Literary Book</option>
                        <option value="Historical Book">Historical Book</option>
                        <option value="Education/References Book">Education/References Book</option>
                        <option value="Romance Book">Romance Book</option>
                        <option value="Horror Book">Horror Book</option>
                        <option value="Cartoon Book">Cartoon Book</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantityInput">Quantity</label>
                    <div class="quantity-wrapper">
                        <button type="button" id="decrementQuantity" class="quantity-btn">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" name="total_quantity" id="quantityInput" value="1" min="1" class="quantity-input" readonly>
                        <button type="button" id="incrementQuantity" class="quantity-btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" name="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-plus-circle"></i>
                    Add Book
                </button>

                <button type="button" class="back-btn" onclick="window.location.href='<?php echo URLROOT; ?>/admin/adminDashboard'">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </button>

            </form>
        </div>
    </div>

    <script>
        // Quantity controls
        const decrementBtn = document.getElementById('decrementQuantity');
        const incrementBtn = document.getElementById('incrementQuantity');
        const quantityInput = document.getElementById('quantityInput');

        decrementBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        incrementBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        // File input display
        const fileInput = document.getElementById('chooseImage');
        const fileDisplay = document.querySelector('.file-input-display span');

        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                fileDisplay.textContent = e.target.files[0].name;
                fileDisplay.parentElement.style.borderColor = '#4CAF50';
                fileDisplay.parentElement.style.backgroundColor = '#f0f8f0';
            } else {
                fileDisplay.textContent = 'Choose book cover image';
                fileDisplay.parentElement.style.borderColor = '#e1e5e9';
                fileDisplay.parentElement.style.backgroundColor = '#f8f9fa';
            }
        });

        // Form submission with loading state
        const form = document.getElementById('addBookForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', (e) => {
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        });

        // Back button function
        // function goBack() {
        //     if (confirm('Are you sure you want to go back? Any unsaved changes will be lost.')) {
        //         window.history.back();
        //     }
        // }

        // Add some basic form validation
        form.addEventListener('submit', (e) => {
            const title = document.getElementById('title').value.trim();
            const author = document.getElementById('author').value.trim();
            const isbn = document.getElementById('isbn').value.trim();
            const category = document.getElementById('category').value;

            if (!title || !author || !isbn || !category) {
                e.preventDefault();
                showMessage('Please fill in all required fields.', 'error');
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                return;
            }
        });

        // Show message function
        function showMessage(text, type) {
            const messageContainer = document.getElementById('messageContainer');
            messageContainer.innerHTML = `<div class="message ${type}">${text}</div>`;

            // Auto-hide after 5 seconds
            setTimeout(() => {
                messageContainer.innerHTML = '';
            }, 5000);
        }

        // Add smooth animations for form interactions
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>

</html>