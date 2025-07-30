 <?php require_once APPROOT . '/views/inc/header.php'; ?>

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

     <!-- Book Categories -->
     <section class="categories-section">
         <h2>Select a book Category</h2>

         <div class="books-grid">
             <!-- Row 1 -->
             <div class="book-category">
                 <div class="book-cover">
                     <a href="<?php echo URLROOT; ?>/pages/literarybook">
                         <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Literary Fiction">
                     </a>
                 </div>
                 <p style="font-weight: bold;"> Literary Fiction</p>
             </div>

             <div class="book-category">
                 <div class="book-cover myanmar-cover">
                     <a href="<?php echo URLROOT; ?>/pages/historicalbook">
                         <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Historical Fiction">
                     </a>
                     <div class="book-title">MYANMAR</div>
                 </div>
                 <p style="font-weight: bold;">Historical Fiction</p></a>
             </div>

             <div class="book-category">
                 <div class="book-cover education-cover">
                     <a href="<?php echo URLROOT; ?>/pages/educationBook">
                         <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Educational References">
                     </a>
                     <div class="book-title">THE POWER OF EDUCATION</div>
                 </div>
                 <p style="font-weight:bold;">Education/References Fiction</p></a>
             </div>

             <!-- Row 2 -->
             <div class="book-category">
                 <div class="book-cover romance-cover">
                     <a href="<?php echo URLROOT; ?>/pages/romancebook">
                         <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Romance">
                     </a>
                     <div class="book-title">AN OVERDUE MATCH</div>
                 </div>
                 <p style="font-weight: bold;">Romance Book</p></a>
             </div>

             <div class="book-category">
                 <div class="book-cover horror-cover">
                     <a href="<?php echo URLROOT; ?>/pages/horrorbook">
                         <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Horror">
                     </a>
                     <div class="book-title">WOMEN IN THE WALLS</div>
                 </div>
                 <p style="font-weight: bold;">Horror</p></a>
             </div>

             <div class="book-category">
                 <div class="book-cover cartoon-cover">
                     <a href="<?php echo URLROOT; ?>/pages/cartoonbook">
                         <img src="https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Cartoon">
                         </a>
                         <div class="book-title">MY FRIEND ROSIE</div>
                 </div>
                 <p style="font-weight: bold;">Cartoon</p></a>
             </div>
         </div>

         <!-- Navigation -->
         <div class="navigation">
             <a href="<?php echo URLROOT; ?>/pages/index" class="back-btn">← Back</a>
             <button class="see-more-btn">See More</button>
         </div>
     </section>
 </main>
 </body>

 </html>