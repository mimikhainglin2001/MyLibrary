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
            <h2>Horror Book Listed</h2>
            
            <div class="books-grid">
                <!-- Row 1 -->
                <div class="book-item">
                    <div class="book-cover orange-cover">
                        <div class="book-title">The Namesake</div>
                        <div class="book-author">Jhumpa Lahiri</div>
                    </div>
                    <div class="book-info">
                        <h3>The Namesake</h3>
                        <p class="author">Jhumpa Lahiri</p>
                        <div class="rating">
                            <span class="stars">★★★★☆</span>
                            <span class="rating-text">4.5</span>
                        </div>
                        <p class="availability">Available Book Quantity: 3</p>
                        <button class="borrow-btn">BORROW</button>
                    </div>
                </div>

                <div class="book-item">
                    <div class="book-cover green-cover">
                        <div class="heart-icon">❤️</div>
                        <div class="book-title">A New Earth</div>
                        <div class="book-author">Eckhart Tolle</div>
                    </div>
                    <div class="book-info">
                        <h3>A New Earth</h3>
                        <p class="author">Eckhart Tolle</p>
                        <div class="rating">
                            <span class="stars">★★★★★</span>
                            <span class="rating-text">5.0</span>
                        </div>
                        <p class="availability">Available Book Quantity: 2</p>
                        <button class="borrow-btn">BORROW</button>
                    </div>
                </div>

                <div class="book-item">
                    <div class="book-cover dark-cover">
                        <div class="book-title">Harry Potter</div>
                        <div class="book-subtitle">and the Chamber of Secrets</div>
                    </div>
                    <div class="book-info">
                        <h3>Harry Potter and the Chamber of Secrets</h3>
                        <p class="author">J.K. Rowling</p>
                        <div class="rating">
                            <span class="stars">★★★★★</span>
                            <span class="rating-text">4.8</span>
                        </div>
                        <p class="availability">Available Book Quantity: 5</p>
                        <button class="borrow-btn">BORROW</button>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="book-item">
                    <div class="book-cover vintage-cover">
                        <div class="book-title">The Handmaid's Tale</div>
                        <div class="book-author">Margaret Atwood</div>
                    </div>
                    <div class="book-info">
                        <h3>The Handmaid's Tale</h3>
                        <p class="author">Margaret Atwood</p>
                        <div class="rating">
                            <span class="stars">★★★★☆</span>
                            <span class="rating-text">4.2</span>
                        </div>
                        <p class="availability">Available Book Quantity: 4</p>
                        <button class="borrow-btn">BORROW</button>
                    </div>
                </div>

                <div class="book-item">
                    <div class="book-cover portrait-cover">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Portrait">
                        <div class="book-title">The Portrait</div>
                    </div>
                    <div class="book-info">
                        <h3>The Portrait</h3>
                        <p class="author">Oscar Wilde</p>
                        <div class="rating">
                            <span class="stars">★★★★☆</span>
                            <span class="rating-text">4.3</span>
                        </div>
                        <p class="availability">Available Book Quantity: 6</p>
                        <button class="borrow-btn">BORROW</button>
                    </div>
                </div>

                <div class="book-item">
                    <div class="book-cover red-cover">
                        <div class="book-title">The Circle</div>
                        <div class="book-author">Dave Eggers</div>
                    </div>
                    <div class="book-info">
                        <h3>The Circle</h3>
                        <p class="author">Dave Eggers</p>
                        <div class="rating">
                            <span class="stars">★★★★☆</span>
                            <span class="rating-text">4.1</span>
                        </div>
                        <p class="availability">Available Book Quantity: 2</p>
                        <button class="borrow-btn">BORROW</button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="navigation">
                <button class="back-btn">← Back</button>
                <button class="see-more-btn">See More</button>
            </div>
        </section>
    </main>
</body>
</html>