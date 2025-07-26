<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Central Library</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/librarycss/welcome.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@300;400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-background">
                <div class="floating-particles"></div>
            </div>
            <div class="hero-content">
                <h1 class="hero-title">Welcome to Our Library</h1>
                <p class="hero-description">Where knowledge meets curiosity and stories come alive. Discover, learn, and explore in our sanctuary of books and digital resources.</p>
                <div class="hero-actions">
                    <a href="<?php echo URLROOT;?>/pages/login"><button class="btn btn-primary">Get Knowledge</button></a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="book-stack">
                    <div class="book book-1"></div>
                    <div class="book book-2"></div>
                    <div class="book book-3"></div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services">
            <div class="container">
                <h2 class="section-title">Our Services</h2>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">📚</div>
                        <h3>Book Collection</h3>
                        <p>Over 50,000 books across all genres, from classic literature to contemporary bestsellers and academic resources.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">💻</div>
                        <h3>Digital Resources</h3>
                        <p>Access e-books, audiobooks, online databases, and digital archives from anywhere with your library card.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">👥</div>
                        <h3>Study Spaces</h3>
                        <p>Quiet reading areas, group study rooms, and collaborative workspaces designed for productive learning.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🎓</div>
                        <h3>Research Help</h3>
                        <p>Professional librarians ready to assist with research projects, citations, and finding the right resources.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">📅</div>
                        <h3>Events & Programs</h3>
                        <p>Book clubs, author readings, workshops, and community events for all ages and interests.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">👶</div>
                        <h3>Children's Section</h3>
                        <p>Dedicated space for young readers with picture books, storytimes, and educational activities.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Info Section -->
        <section class="quick-info">
            <div class="container">
                <div class="info-grid">
                    <div class="info-card">
                        <h3>Library Hours</h3>
                        <div class="hours-list">
                            <div class="hours-item">
                                <span>Monday - Thursday</span>
                                <span>9:00 AM - 9:00 PM</span>
                            </div>
                            <div class="hours-item">
                                <span>Friday - Saturday</span>
                                <span>9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="hours-item">
                                <span>Sunday</span>
                                <span>12:00 PM - 5:00 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="info-card">
                        <h3>Getting Started</h3>
                        <ul class="getting-started-list">
                            <li>Visit us with a valid ID</li>
                            <li>Fill out the registration form</li>
                            <li>Receive your library card instantly</li>
                            <li>Start borrowing up to 10 items</li>
                            <li>Access digital resources online</li>
                        </ul>
                    </div>
                    <div class="info-card">
                        <h3>Contact Information</h3>
                        <div class="contact-details">
                            <p><strong>Address:</strong><br>123 Knowledge Street<br>Learning City, LC 12345</p>
                            <p><strong>Phone:</strong><br>(555) 123-BOOK</p>
                            <p><strong>Email:</strong><br>info@centrallibrary.org</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="cta">
            <div class="container">
                <div class="cta-content">
                    <h2>Ready to Begin Your Journey?</h2>
                    <p>Join thousands of readers, researchers, and learners who call our library home.</p>
                    <div class="cta-buttons">
                        <button class="btn btn-light">Visit Today</button>
                        <button class="btn btn-outline">Browse Online Catalog</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Add floating particles animation
        function createParticles() {
            const particlesContainer = document.querySelector('.floating-particles');
            const particleCount = 20;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 10 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles when page loads
        document.addEventListener('DOMContentLoaded', createParticles);

        // Add smooth hover effects to service cards
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>