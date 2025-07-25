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
                <div class="summary-item">
                    <span class="summary-number">5</span>
                    <span class="summary-label">Currently Borrowed</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">23</span>
                    <span class="summary-label">Total Borrowed</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">18</span>
                    <span class="summary-label">Returned</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number">2</span>
                    <span class="summary-label">Overdue</span>
                </div>
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['borrowedBooks'] as $book): ?>
                            <tr>
                                <td class="book-details">
                                    <div class="book-info">
                                        <img src="/<?= htmlspecialchars($book['book_image']) ?>" class="book-cover">                                        <div class="book-text">
                                        <h4><?= htmlspecialchars($book['book_title']) ?></h4>
                                        <span class="book-id"><?= htmlspecialchars($book['isbn']) ?></span>
                                    </div>
            </div>
            </td>
            <td><?= htmlspecialchars($book['borrow_date'])?></td>
            <td><?= htmlspecialchars($book['due_date'])?></td>

            <td>-</td>
            <td><span class="status overdue">Overdue</span></td>
            <td>
                <button class="action-btn renew">Renew</button>
                <button class="action-btn return">Return</button>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        </div>
    </div>
    </div>
</main>

<script>
    // Simple search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('.history-table tbody tr');

        rows.forEach(row => {
            const bookTitle = row.querySelector('.book-text h4').textContent.toLowerCase();
            const author = row.querySelector('.book-text p').textContent.toLowerCase();

            if (bookTitle.includes(searchTerm) || author.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Status filter functionality
    document.getElementById('statusFilter').addEventListener('change', function() {
        const filterValue = this.value;
        const rows = document.querySelectorAll('.history-table tbody tr');

        rows.forEach(row => {
            const status = row.querySelector('.status').textContent.toLowerCase();

            if (filterValue === 'all' || status.includes(filterValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Action button handlers
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.textContent.toLowerCase();
            const bookTitle = this.closest('tr').querySelector('.book-text h4').textContent;

            switch (action) {
                case 'renew':
                    alert(`Renewing "${bookTitle}"`);
                    break;
                case 'return':
                    if (confirm(`Are you sure you want to return "${bookTitle}"?`)) {
                        alert(`"${bookTitle}" has been returned successfully!`);
                    }
                    break;
                case 'review':
                    alert(`Opening review form for "${bookTitle}"`);
                    break;
            }
        });
    });
</script>
</body>

</html>