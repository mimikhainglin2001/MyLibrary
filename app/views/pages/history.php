<?php require_once APPROOT.'/views/inc/header.php';?>
<link rel="stylesheet" href="/librarycss/history.css?v=2">

        
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
                            <tr>
                                <td class="book-details">
                                    <div class="book-info">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA0MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjUwIiBmaWxsPSIjNGE5MGUyIi8+CjxyZWN0IHg9IjUiIHk9IjUiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIgZmlsbD0id2hpdGUiLz4KPHN2Zz4K" alt="Book Cover" class="book-cover">
                                        <div class="book-text">
                                            <h4>Introduction to Algorithms</h4>
                                            <p>Thomas H. Cormen</p>
                                            <span class="book-id">ID: CS-2024-001</span>
                                        </div>
                                    </div>
                                </td>
                                <td>2024-07-01</td>
                                <td>2024-07-15</td>
                                <td>-</td>
                                <td><span class="status overdue">Overdue</span></td>
                                <td>
                                    <button class="action-btn renew">Renew</button>
                                    <button class="action-btn return">Return</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="book-details">
                                    <div class="book-info">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA0MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjUwIiBmaWxsPSIjMjhhNzQ1Ii8+CjxyZWN0IHg9IjUiIHk9IjUiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIgZmlsbD0id2hpdGUiLz4KPHN2Zz4K" alt="Book Cover" class="book-cover">
                                        <div class="book-text">
                                            <h4>Clean Code</h4>
                                            <p>Robert C. Martin</p>
                                            <span class="book-id">ID: CS-2024-015</span>
                                        </div>
                                    </div>
                                </td>
                                <td>2024-07-10</td>
                                <td>2024-07-24</td>
                                <td>-</td>
                                <td><span class="status borrowed">Borrowed</span></td>
                                <td>
                                    <button class="action-btn renew">Renew</button>
                                    <button class="action-btn return">Return</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="book-details">
                                    <div class="book-info">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA0MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjUwIiBmaWxsPSIjZGM0ZDZiIi8+CjxyZWN0IHg9IjUiIHk9IjUiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIgZmlsbD0id2hpdGUiLz4KPHN2Zz4K" alt="Book Cover" class="book-cover">
                                        <div class="book-text">
                                            <h4>Design Patterns</h4>
                                            <p>Gang of Four</p>
                                            <span class="book-id">ID: CS-2024-032</span>
                                        </div>
                                    </div>
                                </td>
                                <td>2024-06-20</td>
                                <td>2024-07-04</td>
                                <td>2024-07-02</td>
                                <td><span class="status returned">Returned</span></td>
                                <td>
                                    <button class="action-btn review">Review</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="book-details">
                                    <div class="book-info">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA0MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjUwIiBmaWxsPSIjZjU5ZTBiIi8+CjxyZWN0IHg9IjUiIHk9IjUiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIgZmlsbD0id2hpdGUiLz4KPHN2Zz4K" alt="Book Cover" class="book-cover">
                                        <div class="book-text">
                                            <h4>JavaScript: The Good Parts</h4>
                                            <p>Douglas Crockford</p>
                                            <span class="book-id">ID: CS-2024-021</span>
                                        </div>
                                    </div>
                                </td>
                                <td>2024-07-12</td>
                                <td>2024-07-26</td>
                                <td>-</td>
                                <td><span class="status borrowed">Borrowed</span></td>
                                <td>
                                    <button class="action-btn renew">Renew</button>
                                    <button class="action-btn return">Return</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="book-details">
                                    <div class="book-info">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA0MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjUwIiBmaWxsPSIjOGI1Y2Y2Ii8+CjxyZWN0IHg9IjUiIHk9IjUiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIgZmlsbD0id2hpdGUiLz4KPHN2Zz4K" alt="Book Cover" class="book-cover">
                                        <div class="book-text">
                                            <h4>Data Structures and Algorithms</h4>
                                            <p>Michael T. Goodrich</p>
                                            <span class="book-id">ID: CS-2024-008</span>
                                        </div>
                                    </div>
                                </td>
                                <td>2024-06-15</td>
                                <td>2024-06-29</td>
                                <td>2024-06-28</td>
                                <td><span class="status returned">Returned</span></td>
                                <td>
                                    <button class="action-btn review">Review</button>
                                </td>
                            </tr>
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
                
                switch(action) {
                    case 'renew':
                        alert(`Renewing "${bookTitle}"`);
                        break;
                    case 'return':
                        if(confirm(`Are you sure you want to return "${bookTitle}"?`)) {
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