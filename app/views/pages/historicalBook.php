 <?php require_once APPROOT . '/views/inc/header.php';?>
 <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Library books">
            </div>
            
            <div class="search-section">
                <h1>Find The Book You Love</h1>
                <div class="search-container">
                    <div class="search-box">
                        <input type="text" placeholder="Search" class="search-input">
                        <button class="search-button">Search</button>
                    </div>
                </div>
            </div>
        </section>

         <!-- Book Listing Section -->
        <section class="book-listing">
            <h2>Historical Book Listed</h2>
            
            <div class="books-grid">
                <!-- Row 1 -->
                <?php foreach ($data['historicalBooks'] as $book): ?>
    <div class="book-item">
        <div class="book-cover orange-cover1">
            <img src="/<?= htmlspecialchars($book['image']) ?>" 
                 class="book-img" />
           
        </div>
        <div class="book-info">
            <span><?= htmlspecialchars($book['title']) ?></span>
            <p class="author">Author: <?= htmlspecialchars($book['author_name']) ?></p>
            <p class="author">ISBN: <?= htmlspecialchars($book['isbn']) ?></p>
            <p class="author">Total Quantity: <?= htmlspecialchars($book['total_quantity']) ?></p>
            <span><?= htmlspecialchars($book['status_description'])?></span>

            <div class="rating">
                <span class="stars">★★★★☆</span>
                <span class="rating-text">4.5</span>
            </div>
            <button class="borrow-btn"
                    data-book="<?= htmlspecialchars($book['title']) ?>"
                    data-author="<?= htmlspecialchars($book['author_name']) ?>">
                BORROW
            </button>
        </div>
    </div>
<?php endforeach; ?>
              <!-- More books can be added here -->
            <!-- Navigation -->
            <div class="navigation">
                <button class="back-btn">← Back</button>
                <button class="see-more-btn">See More</button>
            </div>
            </div>
        </section>
    </main>
    <!-- Confirmation Modal -->
<div id="confirmationModal" class="modal-overlay">
        <div class="modal">
            <h3>Confirm Borrowing</h3>
            <p id="confirmationMessage">Are you sure you want to borrow this book?</p>
            <div class="modal-buttons">
                <button class="confirm-btn" id="confirmBtn">Confirm</button>
                <button class="cancel-btn" id="cancelBtn">Cancel</button>
            </div>
        </div>
    </div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Modern Library System Loading...');

            let currentBook = '';
            let currentAuthor = '';

            const modal = document.getElementById('confirmationModal');
            const confirmationMessage = document.getElementById('confirmationMessage');
            const confirmBtn = document.getElementById('confirmBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const borrowBtns = document.querySelectorAll('.borrow-btn');
            const searchInput = document.querySelector('.search-input');
            const searchButton = document.querySelector('.search-button');

            if (!modal || !confirmationMessage || !confirmBtn || !cancelBtn) {
                console.error('Modal elements missing!');
                return;
            }

            // Initialize
            modal.style.display = 'none';

            // Show notification function
            function showNotification(message, type = 'success') {
                const notification = document.createElement('div');
                notification.className = 'notification';
                notification.textContent = message;
                
                if (type === 'error') {
                    notification.style.background = 'linear-gradient(135deg, #ef4444, #dc2626)';
                }
                
                document.body.appendChild(notification);
                
                setTimeout(() => notification.classList.add('show'), 100);
                
                setTimeout(() => {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 400);
                }, 3000);
            }

            // Borrow buttons
            borrowBtns.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const bookTitle = this.getAttribute('data-book');
                    const author = this.getAttribute('data-author');
                    
                    if (bookTitle && author) {
                        showConfirmation(bookTitle, author);
                    } else {
                        showNotification('Book information missing!', 'error');
                    }
                });
            });

            // Modal events
            confirmBtn.addEventListener('click', e => {
                e.preventDefault();
                confirmBorrow();
            });

            cancelBtn.addEventListener('click', e => {
                e.preventDefault();
                hideConfirmation();
            });

            modal.addEventListener('click', e => {
                if (e.target === modal) {
                    hideConfirmation();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && modal.classList.contains('show')) {
                    hideConfirmation();
                }
            });

            // Search functionality
            function performSearch() {
                const searchTerm = searchInput.value.trim();
                if (!searchTerm) {
                    showNotification('Please enter a search term', 'error');
                    return;
                }

                const bookItems = document.querySelectorAll('.book-item');
                let foundCount = 0;

                bookItems.forEach(item => {
                    const title = item.querySelector('span').textContent.toLowerCase();
                    const author = item.querySelector('.author').textContent.toLowerCase();
                    const searchLower = searchTerm.toLowerCase();

                    if (title.includes(searchLower) || author.includes(searchLower)) {
                        item.style.display = 'block';
                        item.style.animation = 'fadeIn 0.5s ease';
                        foundCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (foundCount === 0) {
                    showNotification(`No books found for "${searchTerm}"`, 'error');
                    bookItems.forEach(item => {
                        item.style.display = 'block';
                    });
                } else {
                    showNotification(`Found ${foundCount} books matching "${searchTerm}"`);
                }
            }

            searchButton.addEventListener('click', performSearch);
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    performSearch();
                }
            });

            function showConfirmation(bookTitle, author) {
                currentBook = bookTitle;
                currentAuthor = author;
                confirmationMessage.textContent = `Are you sure you want to borrow "${bookTitle}" by ${author}?`;
                
                modal.style.display = 'flex';
                setTimeout(() => {
                    modal.classList.add('show');
                    confirmBtn.focus();
                }, 10);
            }

            function hideConfirmation() {
                modal.classList.remove('show');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }

            function confirmBorrow() {
                const borrowBtn = document.querySelector(`[data-book="${currentBook}"][data-author="${currentAuthor}"]`);
                
                if (borrowBtn) {
                    // Add loading state
                    const originalText = borrowBtn.innerHTML;
                    borrowBtn.innerHTML = '<span class="loading"></span> Processing...';
                    borrowBtn.disabled = true;

                    setTimeout(() => {
                        borrowBtn.innerHTML = '✓ Borrowed';
                        borrowBtn.classList.add('borrowed');
                        borrowBtn.disabled = true;
                        
                        showNotification(`Successfully borrowed "${currentBook}" by ${currentAuthor}!`);

                        // Reset after 5 seconds
                        setTimeout(() => {
                            borrowBtn.innerHTML = originalText;
                            borrowBtn.classList.remove('borrowed');
                            borrowBtn.disabled = false;
                        }, 5000);
                    }, 1500);
                }

                hideConfirmation();
                currentBook = '';
                currentAuthor = '';
            }

            // Add fade-in animation keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            `;
            document.head.appendChild(style);

            console.log('Modern Library System Ready!');
        });
    </script>
</body>
</html>