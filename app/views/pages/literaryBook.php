<?php require_once APPROOT . '/views/inc/header.php'; ?>

<!-- Already Borrowed Modal -->
<?php if (isset($_SESSION['modal']) && $_SESSION['modal'] === 'already_borrowed') : ?>
    <div id="alreadyBorrowedModal" class="modal-overlay" style="display: flex; position: fixed; top:0; left:0; width:100vw; height:100vh; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000;">
        <div class="modal" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 15px rgba(0,0,0,0.3); max-width: 400px; text-align: center;">
            <h3>You have already borrowed this book.</h3>
            <div class="modal-buttons" style="margin-top: 20px;">
                <button onclick="hideAlreadyBorrowedModal()" style="padding: 10px 20px; font-size: 16px;">OK</button>
            </div>
        </div>
    </div>
    <script>
        function hideAlreadyBorrowedModal() {
            document.getElementById('alreadyBorrowedModal').style.display = 'none';
        }
    </script>
    <?php unset($_SESSION['modal']); ?>
<?php endif; ?>

<style>
    .book-item { border-radius: 0; }
    .book-cover { border-radius: 0; }
    .borrow-btn { border-radius: 5px; }
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.5);
        justify-content: center; align-items: center;
        z-index: 9999;
    }
    .modal {
        background: white; padding: 20px; border-radius: 8px;
        text-align: center;
    }
    .modal-buttons button {
        margin-top: 10px; padding: 8px 20px; cursor: pointer;
    }
    .modal.show { display: flex !important; }
</style>

<main class="main-content">
    <section class="hero-section">
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Library books">
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

    <section class="book-listing">
        <h2>Literary Book Listed</h2>

        <div class="books-grid">
            <?php foreach ($data['literaryBooks'] as $index => $book): ?>
                <div class="book-item <?= $index >= 6 ? 'hidden-book' : '' ?>">
                    <img src="/<?= htmlspecialchars($book['image']) ?>" class="book-img" />
                    <div class="book-info">
                        <span><?= htmlspecialchars($book['title']) ?></span>
                        <p class="author">Author: <?= htmlspecialchars($book['author_name']) ?></p>
                        <p class="author">ISBN: <?= htmlspecialchars($book['isbn']) ?></p>
                        <p class="author">Total Quantity: <?= htmlspecialchars($book['total_quantity']) ?></p>
                        <p class="author">Available Quantity: <?= htmlspecialchars($book['available_quantity'] ?? '0') ?></p>
                        <span><?= htmlspecialchars($book['status_description']) ?></span>

                        <div class="rating">
                            <span class="stars">★★★★☆</span>
                            <span class="rating-text">4.5</span>
                        </div>
                        <button class="borrow-btn"
                                data-book="<?= htmlspecialchars($book['title']) ?>"
                                data-author="<?= htmlspecialchars($book['author_name']) ?>"
                                data-id="<?= htmlspecialchars($book['id']) ?>"
                                data-available="<?= (int)($book['available_quantity'] ?? 0) ?>"
                                data-total="<?= (int)($book['total_quantity'] ?? 0) ?>">
                            BORROW
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="navigation">
                <a href="<?php echo URLROOT; ?>/pages/category" class="back-btn">← Back</a>
                <button class="see-more-btn">See More</button>
            </div>
        </div>
    </section>
</main>

<!-- Confirm Borrow Modal -->
<div id="confirmationModal" class="modal-overlay">
    <div class="modal">
        <h3>Confirm Borrowing</h3>
        <p id="confirmationMessage"></p>
        <div class="modal-buttons">
            <button id="confirmBtn" class="confirm-btn">Confirm</button>
            <button id="cancelBtn" class="cancel-btn">Cancel</button>
        </div>
    </div>
</div>

<!-- Not Available Modal with Reserve button -->
<div id="notAvailableModal" class="modal-overlay">
    <div class="modal">
        <h3>Not Available</h3>
        <p>This book is currently not available for borrowing.</p>
        <div class="modal-buttons">
            <button id="reserveBtn" class="reserve-btn">Reserve</button>
            <button class="cancel-btn" onclick="hideNotAvailableModal()">Close</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const borrowBtns = document.querySelectorAll('.borrow-btn');
        const confirmModal = document.getElementById('confirmationModal');
        const notAvailableModal = document.getElementById('notAvailableModal');
        const confirmationMessage = document.getElementById('confirmationMessage');
        const confirmBtn = document.getElementById('confirmBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const reserveBtn = document.getElementById('reserveBtn');

        let currentBookId = '';

        borrowBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const available = parseInt(this.dataset.available);
                const total = parseInt(this.dataset.total);
                const title = this.dataset.book;
                const author = this.dataset.author;
                const id = this.dataset.id;

                currentBookId = id;

                if (available <= 0 || total <= 0) {
                    showNotAvailableModal();
                } else {
                    confirmationMessage.textContent = `Are you sure you want to borrow "${title}" by ${author}?`;
                    showConfirmationModal();
                }
            });
        });

        confirmBtn.addEventListener('click', function () {
            if (currentBookId) {
                window.location.href = `/borrowBook/borrow?id=${encodeURIComponent(currentBookId)}`;
            }
        });

        cancelBtn.addEventListener('click', hideConfirmationModal);

        reserveBtn.addEventListener('click', function () {
            if (!currentBookId) return;

            fetch(`/reserveBook/reserve`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ bookId: currentBookId })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message || 'Reservation request processed.');
                hideNotAvailableModal();
            })
            .catch(err => {
                alert('Failed to reserve book.');
                hideNotAvailableModal();
            });
        });

        function showConfirmationModal() {
            confirmModal.style.display = 'flex';
        }

        function hideConfirmationModal() {
            confirmModal.style.display = 'none';
        }

        function showNotAvailableModal() {
            notAvailableModal.style.display = 'flex';
        }

        window.hideNotAvailableModal = function () {
            notAvailableModal.style.display = 'none';
        };

        const seeMoreBtn = document.querySelector('.see-more-btn');
        seeMoreBtn.addEventListener('click', () => {
            document.querySelectorAll('.hidden-book').forEach(book => {
                book.classList.remove('hidden-book');
            });
            seeMoreBtn.style.display = 'none';
        });

        const searchInput = document.querySelector('.search-input');
        const searchButton = document.querySelector('.search-button');

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
        searchInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') performSearch();
        });
    });
</script>

</body>
</html>
