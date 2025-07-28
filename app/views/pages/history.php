<?php require_once APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="/librarycss/history.css?v=2">

<style>
    .book-cover {
        width: 100px;
        height: 120px;
        border-radius: 4px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        object-fit: fill;
        object-position: center;
    }
</style>

<main class="main-content">
    <div class="container">

        <!-- User Summary -->
        <div class="user-summary">
            <div class="summary-card">
                <div class="summary-item"><span class="summary-number">5</span><span class="summary-label">Currently Borrowed</span></div>
                <div class="summary-item"><span class="summary-number">23</span><span class="summary-label">Total Borrowed</span></div>
                <div class="summary-item"><span class="summary-number">18</span><span class="summary-label">Returned</span></div>
                <div class="summary-item"><span class="summary-number">2</span><span class="summary-label">Overdue</span></div>
            </div>
        </div>

        <!-- Filter and Search -->
        <div class="filter-section">
            <div class="search-box">
                <input type="text" placeholder="Search by book title or author..." id="searchInput">
                <button class="search-btn">🔍</button>
            </div>
            <div class="filter-options">
                <select id="statusFilter">
                    <option value="all">All Status</option>
                    <option value="borrowed">Currently Borrowed</option>
                    <option value="returned">Returned</option>
                    <option value="overdue">Overdue</option>
                </select>
                <select id="sortBy">
                    <option value="recent">Most Recent</option>
                    <option value="oldest">Oldest First</option>
                    <option value="title">Book Title</option>
                    <option value="author">Author</option>
                </select>
            </div>
        </div>

        <!-- Book History Table -->
        <div class="history-section">
            <div class="table-container">
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Book Details</th>
                            <th>Borrow Date</th>
                            <th>Due Date</th>
                            <th>Return Date</th>
                            <th>Renew Date</th>
                            <th>Renew Count</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['borrowedBooks'] as $book): ?>
                            <tr>
                                <td class="book-details">
                                    <div class="book-info">
                                        <img src="/<?= htmlspecialchars($book['image'] ?? 'default.png') ?>" class="book-cover" alt="Book Cover">
                                        <div class="book-text">
                                            <h4><?= htmlspecialchars($book['title'] ?? 'Unknown') ?></h4>
                                            <span class="book-id"><?= htmlspecialchars($book['isbn'] ?? '-') ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($book['borrow_date'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($book['due_date'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($book['return_date'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($book['renew_date'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($book['renew_count'] ?? '0') ?></td>
                                <td>
                                    <span class="status <?= htmlspecialchars($book['status'] ?? 'borrowed') ?>">
                                        <?= htmlspecialchars(ucfirst($book['status'] ?? 'Borrowed')) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if (($book['status'] ?? '') !== 'returned'): ?>
                                        <button class="action-btn renew"
                                            data-borrow-id="<?= htmlspecialchars($book['id']) ?>"
                                            data-book-id="<?= htmlspecialchars($book['book_id']) ?>"
                                            data-book-title="<?= htmlspecialchars($book['title']) ?>">
                                            Renew
                                        </button>
                                        <form method="POST" action="/borrowBook/return" class="return-form" style="display:inline;">
                                            <input type="hidden" name="borrow_id" value="<?= htmlspecialchars($book['id']) ?>">
                                            <button type="button" class="action-btn return"
                                                data-borrow-id="<?= htmlspecialchars($book['id']) ?>"
                                                data-book-id="<?= htmlspecialchars($book['book_id']) ?>"
                                                data-book-title="<?= htmlspecialchars($book['title'] ?? 'Unknown') ?>">
                                                Return
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <span class="action-btn disabled">Returned</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="navigation">
                <a href="<?php echo URLROOT; ?>/pages/category" class="back-btn">← Back</a>
            </div>
        </div>

    </div>
</main>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Search
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.history-table tbody tr');

            rows.forEach(row => {
                const bookTitle = row.querySelector('.book-text h4').textContent.toLowerCase();
                const author = row.querySelector('.book-text p')?.textContent.toLowerCase() || '';
                row.style.display = bookTitle.includes(searchTerm) || author.includes(searchTerm) ? '' : 'none';
            });
        });

        // Filter
        document.getElementById('statusFilter').addEventListener('change', function () {
            const filterValue = this.value;
            const rows = document.querySelectorAll('.history-table tbody tr');

            rows.forEach(row => {
                const status = row.querySelector('.status').textContent.toLowerCase();
                row.style.display = (filterValue === 'all' || status.includes(filterValue)) ? '' : 'none';
            });
        });

        // Confirm return
        document.querySelectorAll('.action-btn.return').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const borrowId = button.dataset.borrowId;
                const bookId = button.dataset.bookId;
                const bookTitle = button.dataset.bookTitle || 'this book';

                if (!borrowId || !bookId) {
                    alert('Missing borrow ID or book ID.');
                    return;
                }

                if (confirm(`Are you sure you want to return "${bookTitle}"?`)) {
                    const url = `/borrowBook/return?id=${encodeURIComponent(borrowId)}&book_id=${encodeURIComponent(bookId)}`;
                    window.location.href = url;
                }
            });
        });

        // Renew button
        document.querySelectorAll('.action-btn.renew').forEach(button => {
            button.addEventListener('click', () => {
                const borrowId = button.dataset.borrowId;
                const bookId = button.dataset.bookId;
                const bookTitle = button.dataset.bookTitle;

                if (!borrowId || !bookId) {
                    alert('Missing borrow ID or book ID.');
                    return;
                }

                if (confirm(`Are you sure you want to renew "${bookTitle}"?`)) {
                    const url = `/borrowBook/renew?id=${encodeURIComponent(borrowId)}&book_id=${encodeURIComponent(bookId)}`;
                    window.location.href = url;
                }
            });
        });
    });
</script>
</body>
</html>
