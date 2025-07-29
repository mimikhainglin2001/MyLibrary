<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Gateway To Knowledge</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: #0f172a;
            overflow-x: hidden;
            background: #ffffff;
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: 
                linear-gradient(135deg, 
                    rgba(30, 58, 138, 0.9) 0%, 
                    rgba(29, 78, 216, 0.85) 25%,
                    rgba(37, 99, 235, 0.8) 50%,
                    rgba(59, 130, 246, 0.85) 75%,
                    rgba(96, 165, 250, 0.9) 100%),
                url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=1200&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(59, 130, 246, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(147, 197, 253, 0.1) 0%, transparent 70%),
                linear-gradient(135deg, rgba(30, 58, 138, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
            animation: pulseGlow 6s ease-in-out infinite alternate;
            z-index: 1;
        }

        @keyframes pulseGlow {
            0% { opacity: 0.7; }
            100% { opacity: 1; }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            padding: 0 2rem;
            animation: heroSlideUp 1.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        @keyframes heroSlideUp {
            0% {
                opacity: 0;
                transform: translateY(60px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hero-content h1 {
            font-size: clamp(2.8rem, 6vw, 5rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 50%, #cbd5e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
            line-height: 1.1;
            text-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .hero-content p {
            font-size: clamp(1.15rem, 2.5vw, 1.4rem);
            margin-bottom: 3rem;
            opacity: 0.92;
            max-width: 650px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 300;
            line-height: 1.8;
            color: #e2e8f0;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 3rem;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 50%, #2563eb 100%);
            color: white;
            text-decoration: none;
            border-radius: 60px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: 
                0 20px 40px rgba(59, 130, 246, 0.4),
                0 8px 16px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.25), 
                transparent);
            transition: left 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 
                0 30px 60px rgba(59, 130, 246, 0.5),
                0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .cta-button:active {
            transform: translateY(-2px) scale(1.01);
        }

        /* Floating Elements */
        .hero::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: 
                radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%),
                radial-gradient(circle, rgba(59, 130, 246, 0.2) 20%, transparent 80%);
            border-radius: 50%;
            top: 15%;
            right: 10%;
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.05) 50%, transparent 70%),
                repeating-linear-gradient(
                    90deg,
                    transparent,
                    transparent 2px,
                    rgba(255, 255, 255, 0.03) 2px,
                    rgba(255, 255, 255, 0.03) 4px
                );
            pointer-events: none;
            animation: subtleShine 10s ease-in-out infinite;
        }

        @keyframes subtleShine {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 0.8; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Services Section */
        .services {
            padding: 8rem 2rem;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 50%, #f1f5f9 100%);
            position: relative;
        }

        .services::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, transparent, #3b82f6, transparent);
        }

        .services-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .services h2 {
            text-align: center;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #1e293b 0%, #475569 50%, #64748b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .services h2::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
            border-radius: 2px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 3rem;
            margin-top: 5rem;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.08),
                0 8px 25px rgba(0, 0, 0, 0.04);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.6);
            opacity: 0;
            transform: translateY(40px);
        }

        .service-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8, #2563eb);
            transform: scaleX(0);
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 
                0 40px 80px rgba(0, 0, 0, 0.12),
                0 20px 40px rgba(59, 130, 246, 0.2);
        }

        .service-image {
            height: 280px;
            background: linear-gradient(135deg, 
                #3b82f6 0%, 
                #1d4ed8 25%,
                #2563eb 50%,
                #60a5fa 75%,
                #93c5fd 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 70% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 60%),
                linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.1) 50%, transparent 60%);
            opacity: 0.7;
            transition: opacity 0.4s ease;
        }

        .service-card:hover .service-image::before {
            opacity: 1;
        }

        .service-image::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .service1::after {
            content: '📚';
            font-size: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service2::after {
            content: '📖';
            font-size: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service3::after {
            content: '📑';
            font-size: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Remove image-specific classes */

        .service-content {
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .service-content h3 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            color: #1e293b;
            position: relative;
            background: linear-gradient(135deg, #1e293b, #475569);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .service-content p {
            color: #64748b;
            line-height: 1.8;
            font-size: 1.05rem;
            font-weight: 400;
        }

        /* Mobile Optimizations */
        @media (max-width: 768px) {
            .hero {
                background-attachment: scroll;
                padding: 2rem 0;
            }
            
            .services {
                padding: 5rem 1.5rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
            
            .service-card {
                border-radius: 24px;
            }
            
            .service-image {
                height: 220px;
            }
            
            .service-content {
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .hero-content {
                padding: 0 1.5rem;
            }
            
            .cta-button {
                padding: 1rem 2.5rem;
                font-size: 1rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Large screens */
        @media (min-width: 1400px) {
            .services-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Performance and accessibility */
        @media (prefers-reduced-motion: reduce) {
            .hero-content,
            .service-card,
            .cta-button {
                animation: none;
                transition: none;
            }
            
            .service-card:hover {
                transform: none;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            body {
                background: #0f172a;
            }
            
            .services {
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            }
            
            .service-card {
                background: rgba(30, 41, 59, 0.8);
                border-color: rgba(71, 85, 105, 0.3);
            }
            
            .service-content {
                background: rgba(30, 41, 59, 0.9);
            }
            
            .service-content h3 {
                background: linear-gradient(135deg, #f1f5f9, #cbd5e0);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .service-content p {
                color: #94a3b8;
            }
        }
    </style>
</head>
<body>
    <?php require_once APPROOT . '/views/inc/header.php';?>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Your Gateway To Knowledge</h1>
            <p>Discover a world of learning and exploration through our comprehensive library services</p>
            <a href="<?php echo URLROOT;?>/pages/category" class="cta-button">Get Started</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="services-container">
            <h2>Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-image service1"></div>
                    <div class="service-content">
                        <h3>Silent Reading</h3>
                        <p>Our reading silent hi-read books sit in study, our library has special rooms for you to have a good start here.</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image service2"></div>
                    <div class="service-content">
                        <h3>Book Rentals</h3>
                        <p>We rent from reading all the library, we also provide facility to rent and borrow books for up to 14 days.</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image service3"></div>
                    <div class="service-content">
                        <h3>Categorized Book</h3>
                        <p>We have excellent collection of books categorized under multiple headings arranged very neatly etc for easy access.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Enhanced Intersection Observer with staggered animations
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate');
                    }, index * 150);
                }
            });
        }, observerOptions);

        // Observe service cards with enhanced animation
        document.querySelectorAll('.service-card').forEach((card, index) => {
            card.style.transitionDelay = `${index * 0.2}s`;
            observer.observe(card);
        });

        // Smooth scroll enhancement
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Advanced parallax with performance optimization
        let ticking = false;
        let scrollY = 0;

        function updateParallax() {
            const hero = document.querySelector('.hero');
            if (hero && window.innerWidth > 768) {
                const speed = scrollY * 0.3;
                hero.style.transform = `translateY(${speed}px)`;
            }
            ticking = false;
        }

        function onScroll() {
            scrollY = window.pageYOffset;
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }

        // Performance-aware parallax
        if (window.innerWidth > 768 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            window.addEventListener('scroll', onScroll, { passive: true });
        }

        // Enhanced CTA button interaction
        const ctaButton = document.querySelector('.cta-button');
        if (ctaButton) {
            ctaButton.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            ctaButton.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        }

        // Service card hover enhancements
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.zIndex = '10';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });
    </script>
</body>
</html>