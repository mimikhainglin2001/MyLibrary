 <?php require_once APPROOT . '/views/inc/header.php'; ?>
 <!-- Main Content -->
 <style>
     .book-item {
         border-radius: 0;
     }

     .book-cover {
         border-radius: 0;
     }

     .borrow-btn {
         border-radius: 5px;
     }

     .modal-overlay {
         display: none;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.5);
         justify-content: center;
         align-items: center;
         z-index: 9999;
     }

     .modal {
         background: white;
         padding: 20px;
         border-radius: 8px;
         text-align: center;
     }

     .modal-buttons button {
         margin-top: 10px;
         padding: 8px 20px;
         cursor: pointer;
     }

     .modal.show {
         display: flex !important;
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
             <?php foreach ($data['historicalBooks'] as $index => $book): ?>
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

             <!-- More books can be added here -->
             <!-- Navigation -->
             <div class="navigation">
                 <a href="<?php echo URLROOT; ?>/pages/category" class="back-btn">← Back</a>
                 <button class="see-more-btn">See More</button>
             </div>
         </div>
     </section>
 </main>
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

 <div id="notAvailableModal" class="modal-overlay">
     <div class="modal">
         <h3>Not Available</h3>
         <p>This book is currently not available for borrowing.</p>
         <div class="modal-buttons">
             <button class="cancel-btn" onclick="hideNotAvailableModal()">Close</button>
         </div>
     </div>
 </div>



 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const borrowBtns = document.querySelectorAll('.borrow-btn');
         const confirmModal = document.getElementById('confirmationModal');
         const notAvailableModal = document.getElementById('notAvailableModal');
         const confirmationMessage = document.getElementById('confirmationMessage');
         const confirmBtn = document.getElementById('confirmBtn');
         const cancelBtn = document.getElementById('cancelBtn');

         let currentBookId = '';

         borrowBtns.forEach(btn => {
             btn.addEventListener('click', function() {
                 const available = parseInt(this.dataset.available);
                 const total = parseInt(this.dataset.total);
                 const title = this.dataset.book;
                 const author = this.dataset.author;
                 const id = this.dataset.id;

                 if (available <= 0 || total <= 0) {
                     showNotAvailableModal();
                 } else {
                     currentBookId = id;
                     confirmationMessage.textContent = `Are you sure you want to borrow "${title}" by ${author}?`;
                     showConfirmationModal();
                 }
             });
         });

         confirmBtn.addEventListener('click', function() {
             if (currentBookId) {
                 window.location.href = `/borrowBook/borrow?id=${encodeURIComponent(currentBookId)}`;
             }
         });

         cancelBtn.addEventListener('click', hideConfirmationModal);

         function showConfirmationModal() {
             confirmModal.style.display = 'flex';
         }

         function hideConfirmationModal() {
             confirmModal.style.display = 'none';
         }

         function showNotAvailableModal() {
             notAvailableModal.style.display = 'flex';
         }

         window.hideNotAvailableModal = function() {
             notAvailableModal.style.display = 'none';
         };
     });
     borrowBtns.forEach(btn => {
         btn.addEventListener('click', function(e) {
             e.preventDefault();

             const bookTitle = this.getAttribute('data-book');
             const author = this.getAttribute('data-author');
             const bookId = this.getAttribute('data-id');
             const available = parseInt(this.getAttribute('data-available'));
             const total = parseInt(this.getAttribute('data-total'));

             if (available === 0 || total === 0) {
                 showNotAvailableModal();
             } else {
                 showConfirmation(bookTitle, author, bookId);
             }
         });
     });

     function showNotAvailableModal() {
         const notAvailableModal = document.getElementById('notAvailableModal');
         notAvailableModal.style.display = 'flex';
         setTimeout(() => notAvailableModal.classList.add('show'), 10);
     }

     function hideNotAvailableModal() {
         const notAvailableModal = document.getElementById('notAvailableModal');
         notAvailableModal.classList.remove('show');
         setTimeout(() => notAvailableModal.style.display = 'none', 300);
     }

     const seeMoreBtn = document.querySelector('.see-more-btn');
     seeMoreBtn.addEventListener('click', () => {
         document.querySelectorAll('.hidden-book').forEach(book => {
             book.classList.remove('hidden-book');
         });
         seeMoreBtn.style.display = 'none'; // hide button after expanding
     });
     document.addEventListener('DOMContentLoaded', function() {
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
             btn.addEventListener('click', function(e) {
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

         document.addEventListener('keydown', function(e) {
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
                 window.location.href = `/borrowBook/borrow?id=${encodeURIComponent(currentBookId)}`;
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