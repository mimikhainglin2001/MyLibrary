<?php require_once APPROOT.'/views/inc/nav.php' ?>

    <main>
        <section class="category-hero-section">
            <div class="category-hero-image-container">
                <img src="https://via.placeholder.com/600x400/F8F8F8/808080?text=Books+For+Category+Page" alt="Books for category hero" class="actual-hero-image">
            </div>
            <div class="category-hero-content">
                <h2>Find The Book You Love</h2>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button>Search</button>
                </div>
            </div>
        </section>

        <section class="book-listing-section">
            <h2>Select a book Category</h2>
            <div class="category-grid">
                <div class="category-card" >
                    <img src="https://via.placeholder.com/200x180/D3D3D3/808080?text=Literary+Fiction" alt="Literary Fiction">
                    <h3><a href="<?php echo URLROOT;?>/pages/literaryBook">Literary Fiction</a></h3>
                </div>
                <div class="category-card">
                    <img src="https://via.placeholder.com/200x180/D3D3D3/808080?text=Historical+Fiction" alt="Historical Fiction">
                    <h3><a href="<?php echo URLROOT;?>/pages/historicalBook">Historical Fiction</a></h3>
                </div>
                <div class="category-card">
                    <img src="https://via.placeholder.com/200x180/D3D3D3/808080?text=Education%2F+References" alt="Education/ References">
                    <h3><a href="<?php echo URLROOT;?>/pages/educationBook">Education/References</a></h3>
                </div>
                <div class="category-card">
                    <img src="https://via.placeholder.com/200x180/D3D3D3/808080?text=Romance" alt="Romance">
                    <h3><a href="<?php echo URLROOT;?>/pages/romanceBook">Romance Book</a></h3>
                </div>
                <div class="category-card">
                    <img src="https://via.placeholder.com/200x180/D3D3D3/808080?text=Horror" alt="Horror">
                   <h3><a href="<?php echo URLROOT;?>/pages/horrorBook">Horror Book</a></h3>
                </div>
                <div class="category-card">
                    <img src="https://via.placeholder.com/200x180/D3D3D3/808080?text=Cartoon" alt="Cartoon">
                    <h3><a href="<?php echo URLROOT;?>/pages/cartoonBook">Cartoon Book</a></h3>
                </div>
            </div>
        </section>

        <div class="navigation-buttons">
            <button class="back-btn"><i class="fas fa-undo"></i> Back</button>
            <button class="see-more-btn">See More</button>
        </div>
    </main>

</body>
</html>