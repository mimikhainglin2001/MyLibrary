<?php require_once APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="/librarycss/history.css?v=2">
<style>
    .modal {
        position: fixed;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.3s ease;
    }

    .modal.show {
        display: flex;
    }

    .modal-dialog {
        background: white;
        padding: 20px;
        width: 90%;
        max-width: 400px;
        border-radius: 8px;
        /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); */
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header,
    .modal-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        font-weight: bold;
    }

    .modal-body {
        margin: 15px 0;
    }

    .close {
        background: none;
        border: none;
        font-size: 22px;
        cursor: pointer;
    }

    .confirm-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
    }

    .cancel-btn {
        background-color: #ccc;
        color: #333;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
    }
</style>

<main class="main-content">
    <div class="container">
        <?php
        $overdueCount = 0;
        foreach ($data['borrowedBooks'] as $book) {
            if ($book['status'] === 'overdue') {
                $overdueCount++;
            }
        }
        ?>

        <?php if ($overdueCount > 0): ?>
            <div class="alert alert-warning">
                ⚠️ You have <?= $overdueCount ?> overdue book<?= $overdueCount > 1 ? 's' : '' ?>. Please return or renew them as soon as possible.
            </div>
        <?php endif; ?>

        <div class="user-summary">
            <div class="summary-card">
                <div class="summary-item"><span class="summary-number"><?= $data['summary']['currentlyBorrowed'] ?? 0 ?></span><span class="summary-label">Currently Borrowed</span></div>
                <div class="summary-item"><span class="summary-number"><?= $data['summary']['totalBorrowed'] ?? 0 ?></span><span class="summary-label">Total Borrowed</span></div>
                <div class="summary-item"><span class="summary-number"><?= $data['summary']['returned'] ?? 0 ?></span><span class="summary-label">Returned</span></div>
                <div class="summary-item"><span class="summary-number"><?= $data['summary']['overdue'] ?? 0 ?></span><span class="summary-label">Overdue</span></div>
            </div>
        </div>

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
                            <tr class="<?= $book['status'] === 'overdue' ? 'overdue-row' : '' ?>">
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
                                        <button class="action-btn return"
                                            data-borrow-id="<?= htmlspecialchars($book['id']) ?>"
                                            data-book-id="<?= htmlspecialchars($book['book_id']) ?>"
                                            data-book-title="<?= htmlspecialchars($book['title']) ?>">
                                            Return
                                        </button>
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

<!-- Modal -->
<div class="modal" id="confirmModal">
    <div class="modal-dialog">
        <div class="modal-header">
            <span class="modal-title" id="confirmModalTitle">Confirm</span>
            <button class="close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body" id="confirmModalBody">
            Are you sure?
        </div>
        <div class="modal-footer">
            <button class="cancel-btn" onclick="closeModal()">Cancel</button>
            <button class="confirm-btn" id="confirmYesBtn">Yes</button>
        </div>
    </div>
</div>

<script>
    function openModal(title, message, onConfirm) {
        const modal = document.getElementById('confirmModal');
        modal.style.display = 'flex';
        requestAnimationFrame(() => modal.classList.add('show'));
        document.getElementById('confirmModalTitle').textContent = title;
        document.getElementById('confirmModalBody').textContent = message;

        const yesBtn = document.getElementById('confirmYesBtn');
        const newYesBtn = yesBtn.cloneNode(true); // Reset listeners
        yesBtn.parentNode.replaceChild(newYesBtn, yesBtn);

        newYesBtn.addEventListener('click', () => {
            onConfirm();
            closeModal();
        });
    }

    function closeModal() {
        const modal = document.getElementById('confirmModal');
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 200);
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Search
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            document.querySelectorAll('.history-table tbody tr').forEach(row => {
                const title = row.querySelector('.book-text h4').textContent.toLowerCase();
                row.style.display = title.includes(searchTerm) ? '' : 'none';
            });
        });

        // Filter
        document.getElementById('statusFilter').addEventListener('change', function () {
            const filter = this.value;
            document.querySelectorAll('.history-table tbody tr').forEach(row => {
                const status = row.querySelector('.status').textContent.toLowerCase();
                row.style.display = (filter === 'all' || status.includes(filter)) ? '' : 'none';
            });
        });

        // Renew/Return
        document.querySelectorAll('.action-btn.return').forEach(button => {
            button.addEventListener('click', () => {
                const bookTitle = button.dataset.bookTitle;
                const borrowId = button.dataset.borrowId;
                const bookId = button.dataset.bookId;
                openModal(`Return "${bookTitle}"?`, `Confirm return of "${bookTitle}"?`, () => {
                    window.location.href = `/borrowBook/return?id=${borrowId}&book_id=${bookId}`;
                });
            });
        });

        document.querySelectorAll('.action-btn.renew').forEach(button => {
            button.addEventListener('click', () => {
                const bookTitle = button.dataset.bookTitle;
                const borrowId = button.dataset.borrowId;
                const bookId = button.dataset.bookId;
                openModal(`Renew "${bookTitle}"?`, `Confirm renewal of "${bookTitle}"?`, () => {
                    window.location.href = `/borrowBook/renew?id=${borrowId}&book_id=${bookId}`;
                });
            });
        });
    });
</script>
</body>
</html>
