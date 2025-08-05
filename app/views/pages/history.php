<?php require_once APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/librarycss/history.css?v=2">
</head>
<style>
    .action-btn {
        display: inline-block;
        padding: 8px 14px;
        margin: 2px;
        font-size: 14px;
        font-weight: 500;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.25s ease, box-shadow 0.25s ease;
        text-align: center;
        text-decoration: none;
        color: #fff;
    }

    .action-btn.renew {
        background-color: #17a2b8;
    }

    .action-btn.return {
        background-color: yellowgreen;
        color: black;
    }

    .action-btn:hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        opacity: 0.9;
    }

    .action-btn.disabled {
        background-color: #ccc;
        color: #777;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* Styles for the status badges */
    .status {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: bold;
        color: #fff; /* Default text color for statuses */
    }

    .status.borrowed {
        background-color: lightblue; /* Blue for borrowed */
    }

    .status.returned {
        background-color: oldlace; /* Green for returned */
    }

    .status.overdue {
        background-color: #dc3545; /* Red for overdue */
    }

    .status.reserved {
        background-color: yellow; /* Orange/Yellow for reserved, or choose another color */
        color: #333; /* Adjust text color for better contrast if needed */
    }
</style>

<body>
<main class="main-content">
      <span>    <?php require APPROOT.'/views/components/auth_message.php'; ?>
</span>
    <div class="container">

        <?php
        $overdueCount = 0;
        $currentlyBorrowed = 0;
        $totalBorrowed = 0;
        $returned = 0;
        $reservedCount = 0; // Initialize reserved count

        foreach($data['borrowedBooks'] as $book){
            if($book['status'] === 'overdue') $overdueCount++;
            if($book['status'] === 'borrowed') $currentlyBorrowed++;
            if($book['status'] === 'returned') $returned++;
            if(in_array($book['status'], ['borrowed' , 'returned', 'overdue'])) $totalBorrowed++;
        }

        // Count reserved books
        foreach($data['reservedBooks'] as $book){
            $reservedCount++;
        }
        ?>
        <?php if ($overdueCount > 0): ?>
            <div class="alert alert-warning">
                ⚠️ You have <?= $overdueCount ?> overdue book<?= $overdueCount > 1 ? 's' : '' ?>.
            </div>
        <?php endif; ?>

        <div class="user-summary">
            <div class="summary-card">
                <div class="summary-item">
                    <span class="summary-number"><?= $currentlyBorrowed ?></span>
                    <span class="summary-label">Currently Borrowed</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number"><?= $totalBorrowed ?></span>
                    <span class="summary-label">Total Borrowed</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number"><?= $returned ?></span>
                    <span class="summary-label">Returned</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number"><?= $overdueCount ?></span>
                    <span class="summary-label">Overdue</span>
                </div>
                <div class="summary-item">
                    <span class="summary-number"><?= $reservedCount ?></span>
                    <span class="summary-label">Reserved</span>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <div class="search-box">
                <input type="text" placeholder="Search..." id="searchInput">
            </div>
            <div class="filter-options">
                <select id="statusFilter">
                    <option value="all">All Status</option>
                    <option value="borrowed">Currently Borrowed</option>
                    <option value="returned">Returned</option>
                    <option value="overdue">Overdue</option>
                    <option value="reserved">Reserved</option>
                </select>
            </div>
        </div>

        <div class="history-section">
            <div class="table-container">
                <table class="history-table">
                    <thead>
                    <tr>
                        <th>Book</th>
                        <th>Borrow Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Renew Date</th>
                        <th>Renew Count</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['borrowedBooks'] as $book): ?>
                        <tr class="<?= $book['status'] === 'overdue' ? 'overdue-row' : '' ?>">
                            <td>
                                <img src="/<?= ltrim($book['image'] ?? 'images/default.png', '/') ?>" width="70">
                                <div>
                                    <strong><?= htmlspecialchars($book['title']) ?></strong><br>
                                    ISBN: <?= htmlspecialchars($book['isbn']) ?>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($book['borrow_date']) ?></td>
                            <td><?= htmlspecialchars($book['due_date']) ?></td>
                            <td><?= htmlspecialchars($book['return_date'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($book['renew_date'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($book['renew_count'] ?? '0') ?></td>
                            <td><span class="status <?= $book['status'] ?>"><?= ucfirst($book['status']) ?></span></td>
                            <td>
                                <?php if ($book['status'] !== 'returned'): ?>
                                    <button class="action-btn renew">
                                        <a href="/borrowBook/renew?id=<?= $book['id'] ?>&book_id=<?= $book['book_id'] ?>" style="text-decoration: none; color: inherit;">Renew</a>
                                    </button>
                                    <button class="action-btn return">
                                        <a href="/borrowBook/return?id=<?= $book['id'] ?>&book_id=<?= $book['book_id'] ?>" style="text-decoration: none; color: inherit;">Return</a>
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php foreach ($data['reservedBooks'] as $book): ?>
                        <tr>
                            <td>
                                <img src="/<?= ltrim($book['book_image'] ?? 'images/default.png', '/') ?>" width="70">
                                <div>
                                    <strong><?= htmlspecialchars($book['book_title']) ?></strong><br>
                                    ISBN: <?= htmlspecialchars($book['book_isbn']) ?>
                                </div>
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td><span class="status reserved">Reserved</span></td>
                            <td>
                                <button class="action-btn return">
                                    <a href="/BorrowBook/cancel?id=<?= $book['id'] ?>" style="text-decoration: none; color: inherit;">Cancel Reservation</a>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="navigation">
            <a href="<?= URLROOT ?>/pages/category" class="back-btn">&larr; Back</a>
        </div>

    </div>
</main>

<script>
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');

    let debounceTimeout;

    function filterRows() {
        const searchValue = searchInput.value.toLowerCase();
        const statusValue = statusFilter.value;

        document.querySelectorAll('.history-table tbody tr').forEach(row => {
            const title = row.querySelector('td div strong')?.textContent.toLowerCase() || '';
            const statusSpan = row.querySelector('.status');
            const status = statusSpan ? statusSpan.textContent.toLowerCase() : '';

            const matchesSearch = title.includes(searchValue);
            const matchesStatus = (statusValue === 'all') || (status === statusValue);

            row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
        });
    }

    function debounceFilter() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(filterRows, 300); // 300ms delay
    }

    searchInput.addEventListener('input', debounceFilter);
    statusFilter.addEventListener('change', filterRows);
</script>

</body>
</html>