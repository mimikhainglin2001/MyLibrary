 <?php require_once APPROOT . '/views/inc/header.php';?>
 <!-- Main Content -->
   <style>
    .book-item{
        border-radius: 0;
    }.book-cover{
        border-radius: 0;
    }
    .borrow-btn{
        border-radius: 5px;
    }
  </style>
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
                 <?php foreach($data['historicalBooks'] as $book ):?>
                <div class="book-item">
                    
                   
                        <img src="/<?= htmlspecialchars($book['image'])?>" class="book-img">

                    <div class="book-info">
                        <span><?= htmlspecialchars($book['title']) ?></span>
                        <p class="author">Author: <?= htmlspecialchars($book['author_name'])?></p>
                        <p class="author">ISBN: <?= htmlspecialchars($book['isbn'])?></p>
                        <p class="author">Total Quantity: <?= htmlspecialchars($book['total_quantity'])?></p>
                        <span><?= htmlspecialchars($book['status_description'])?></span>
                        <div class="rating">
                            <span class="stars">★★★★☆</span>
                            <span class="rating-text">4.5</span>
                        </div>
                        <button class="borrow-btn"
                    data-book="<?= htmlspecialchars($book['title']) ?>"
                    data-author="<?= htmlspecialchars($book['author_name']) ?>"
                    data-isbn="<?= htmlspecialchars($book['isbn'])?>"
                    data-id="<?= htmlspecialchars($book['id'])?>">
                BORROW
            </button>
                    </div>
                </div>
                <?php endforeach;?>

                <!-- More books can be added here -->
            <!-- Navigation -->
            <div class="navigation">
                 <a href="<?php echo URLROOT; ?>/pages/category" class="back-btn">← Back</a>
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
    let currentBook = '';
    let currentAuthor = '';
    let currentBookId = '';

    const modal = document.getElementById('confirmationModal');
    const confirmationMessage = document.getElementById('confirmationMessage');
    const confirmBtn = document.getElementById('confirmBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const borrowBtns = document.querySelectorAll('.borrow-btn');
    const searchInput = document.querySelector('.search-input');
    const searchButton = document.querySelector('.search-button');

    modal.style.display = 'none';

    borrowBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const bookTitle = this.getAttribute('data-book');
            const author = this.getAttribute('data-author');
            const bookId = this.getAttribute('data-id');

            if (bookTitle && author && bookId) {
                showConfirmation(bookTitle, author, bookId);
            }
        });
    });

    confirmBtn.addEventListener('click', e => {
        e.preventDefault();
        confirmBorrow();
    });

    cancelBtn.addEventListener('click', e => {
        e.preventDefault();
        hideConfirmation();
    });

    modal.addEventListener('click', e => {
        if (e.target === modal) hideConfirmation();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') hideConfirmation();
    });

    function showConfirmation(bookTitle, author, bookId) {
        currentBook = bookTitle;
        currentAuthor = author;
        currentBookId = bookId;
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
        if (currentBookId) {
            window.location.href = `/auth/borrow?id=${encodeURIComponent(currentBookId)}`;
        } else {
            alert('Book ID is missing.');
        }

        hideConfirmation();
        currentBook = '';
        currentAuthor = '';
        currentBookId = '';
    }

    function performSearch() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const bookItems = document.querySelectorAll('.book-item');
        let found = 0;

        bookItems.forEach(item => {
            const title = item.querySelector('span').textContent.toLowerCase();
            const author = item.querySelector('.author').textContent.toLowerCase();
            if (title.includes(searchTerm) || author.includes(searchTerm)) {
                item.style.display = 'block';
                found++;
            } else {
                item.style.display = 'none';
            }
        });

        if (found === 0) alert(`No books found for "${searchTerm}"`);
    }

    searchButton.addEventListener('click', performSearch);
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') performSearch();
    });
});
</script>
</body>
</html>