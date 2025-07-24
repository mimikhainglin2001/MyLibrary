<?php require_once APPROOT . '/views/inc/header.php';?>
<main class="main-content">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="address-section">
                        <h2>Contact Address</h2>
                        <div class="address-item">
                            <div class="location-icon">📍</div>
                            <div class="address-text">
                                <p>University Of Computer</p>
                                <p>Studies Meiktila</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-details">
                        <h2>Contact</h2>
                        <div class="contact-item">
                            <div class="phone-icon">📞</div>
                            <p>(+95)9967297362</p>
                        </div>
                        <div class="contact-item">
                            <div class="email-icon">✉️</div>
                            <p>ucsmtla20@edu.com</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-section">
                    <h2>Contact Information</h2>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>
                        
                        <button type="submit" class="send-btn">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
