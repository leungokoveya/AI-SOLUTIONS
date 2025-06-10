<!DOCTYPE html>

<html lang="en">
    <style>  
      /* Global Styles */
:root {
    --primary-color: #2563eb;
    --primary-dark: #1d4ed8;
    --secondary-color: #10b981;
    --dark-color: #1e293b;
    --light-color: #f8fafc;
    --gray-color: #94a3b8;
    --dark-gray: #334155;
    --light-gray: #e2e8f0;
    --white: #ffffff;
    --black: #000000;
    --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --transition: all 0.3s ease;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    line-height: 1.6;
    color: var(--dark-color);
    background-color: var(--light-color);
    overflow-x: hidden;
}

.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
    line-height: 1.2;
}

a {
    text-decoration: none;
    color: inherit;
}

img {
    max-width: 100%;
    height: auto;
}

ul {
    list-style: none;
}

.section-subtitle {
    color: var(--gray-color);
    margin-bottom: 2rem;
    text-align: center;
}

/* Buttons */
.cta-button, .secondary-button, .submit-button, .event-button {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    border-radius: 0.375rem;
    font-weight: 600;
    text-align: center;
    transition: var(--transition);
}

.cta-button {
    background-color: var(--primary-color);
    color: var(--white);
}

.cta-button:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
}

.secondary-button {
    background-color: transparent;
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
}

.secondary-button:hover {
    background-color: rgba(37, 99, 235, 0.1);
    transform: translateY(-2px);
}

.submit-button {
    background-color: var(--primary-color);
    color: var(--white);
    border: none;
    width: 100%;
    font-size: 1rem;
    cursor: pointer;
}

.submit-button:hover {
    background-color: var(--primary-dark);
}

.event-button {
    background-color: transparent;
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
}

.event-button:hover {
    background-color: var(--primary-color);
    color: var(--white);
}

/* Navigation */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: var(--white);
    box-shadow: var(--box-shadow);
    z-index: 1000;
    padding: 1rem 0;
}

.navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 2rem;
}

.nav-links a {
    font-weight: 500;
    transition: var(--transition);
}

.nav-links a:hover {
    color: var(--primary-color);
}

.hamburger {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.5rem;
}

.hamburger span {
    display: block;
    width: 25px;
    height: 2px;
    background-color: var(--dark-color);
    margin: 5px 0;
    transition: var(--transition);
}

.mobile-menu {
    position: fixed;
    top: 70px;
    left: 0;
    width: 100%;
    background-color: var(--white);
    box-shadow: var(--box-shadow);
    padding: 1rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    transform: translateY(-150%);
    transition: var(--transition);
    z-index: 999;
}

.mobile-menu.active {
    transform: translateY(0);
}

/* Hero Section */
.hero {
    padding: 8rem 0 4rem;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
}

.hero .container {
    display: flex;
    align-items: center;
    gap: 3rem;
}

.hero-content {
    flex: 1;
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    color: var(--dark-color);
}

.hero p {
    font-size: 1.25rem;
    margin-bottom: 2rem;
    color: var(--dark-gray);
}

.hero-buttons {
    display: flex;
    gap: 1rem;
}

.hero-image {
    flex: 1;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: var(--box-shadow);
}

.hero-image img {
    width: 100%;
    height: auto;
    display: block;
}

/* Services Section */
.services {
    padding: 5rem 0;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.service-card {
    background-color: var(--white);
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    text-align: center;
}

.service-card:hover {
    transform: translateY(-5px);
}

.service-icon {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
}

.service-card h3 {
    margin-bottom: 1rem;
}

/* Solutions Section */
.solutions {
    padding: 5rem 0;
    background-color: #f8fafc;
}

.tab-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.tab-button {
    padding: 0.75rem 1.5rem;
    background-color: transparent;
    border: 1px solid var(--light-gray);
    border-radius: 0.375rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.tab-button:hover {
    background-color: var(--light-gray);
}

.tab-button.active {
    background-color: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

.tab-content {
    display: none;
    background-color: var(--white);
    border-radius: 0.5rem;
    box-shadow: var(--box-shadow);
    padding: 2rem;
}

.tab-content.active {
    display: flex;
    gap: 2rem;
    align-items: center;
}

.tab-text {
    flex: 1;
}

.tab-text h3 {
    margin-bottom: 1rem;
}

.tab-text ul {
    margin: 1.5rem 0;
}

.tab-text ul li {
    margin-bottom: 0.5rem;
    position: relative;
    padding-left: 1.5rem;
}

.tab-text ul li::before {
    content: "•";
    color: var(--primary-color);
    position: absolute;
    left: 0;
}

.tab-image {
    flex: 1;
    border-radius: 0.5rem;
    overflow: hidden;
}

.tab-image img {
    width: 100%;
    height: auto;
    display: block;
}

/* Demo Section */
.demo {
    padding: 5rem 0;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: var(--white);
}

.demo h2 {
    color: var(--white);
    margin-bottom: 1rem;
    text-align: center;
}

.demo p {
    text-align: center;
    margin-bottom: 3rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.demo-form {
    background-color: var(--white);
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: var(--box-shadow);
    max-width: 800px;
    margin: 0 auto;
}

.form-row {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.form-group {
    flex: 1;
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--dark-color);
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid var(--light-gray);
    border-radius: 0.375rem;
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
}

.interest-options {
    display: flex;
    gap: 1rem;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
    color: var(--dark-color);
    cursor: pointer;
}

.checkbox-label input {
    width: auto;
}

/* Events Section */
.events {
    padding: 5rem 0;
}

.events-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.event-card {
    display: flex;
    background-color: var(--white);
    border-radius: 0.5rem;
    box-shadow: var(--box-shadow);
    overflow: hidden;
    transition: var(--transition);
}

.event-card:hover {
    transform: translateY(-5px);
}

.event-date {
    background-color: var(--primary-color);
    color: var(--white);
    padding: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-width: 80px;
}

.event-date .day {
    font-size: 1.5rem;
    font-weight: 700;
}

.event-date .month {
    font-size: 0.875rem;
    text-transform: uppercase;
}

.event-details {
    padding: 1.5rem;
    flex: 1;
}

.event-details h3 {
    margin-bottom: 0.5rem;
}

.event-time {
    color: var(--gray-color);
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.event-description {
    margin-bottom: 1rem;
    font-size: 0.9375rem;
}

/* About Section */
.about {
    padding: 5rem 0;
    background-color: #f8fafc;
}

.about .container {
    display: flex;
    align-items: center;
    gap: 3rem;
}

.about-content {
    flex: 1;
}

.about h2 {
    margin-bottom: 1.5rem;
}

.about p {
    margin-bottom: 1.5rem;
}

.stats {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
    display: block;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--gray-color);
}

.about-image {
    flex: 1;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: var(--box-shadow);
}

.about-image img {
    width: 100%;
    height: auto;
    display: block;
}

/* Footer */
.footer {
    background-color: var(--dark-color);
    color: var(--light-color);
    padding: 4rem 0 0;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.footer-col h3 {
    color: var(--white);
    margin-bottom: 1.5rem;
    font-size: 1.125rem;
}

.footer-col p {
    margin-bottom: 1rem;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}

.social-links a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transition: var(--transition);
}

.social-links a:hover {
    background-color: var(--primary-color);
}

.footer-col ul li {
    margin-bottom: 0.75rem;
}

.footer-col ul li i {
    margin-right: 0.5rem;
    color: var(--primary-color);
    width: 20px;
    text-align: center;
}

.newsletter-form {
    display: flex;
    margin-top: 1rem;
}

.newsletter-form input {
    flex: 1;
    padding: 0.75rem;
    border: none;
    border-radius: 0.375rem 0 0 0.375rem;
    font-size: 1rem;
}

.newsletter-form button {
    background-color: var(--primary-color);
    color: var(--white);
    border: none;
    padding: 0 1rem;
    border-radius: 0 0.375rem 0.375rem 0;
    cursor: pointer;
    transition: var(--transition);
}

.newsletter-form button:hover {
    background-color: var(--primary-dark);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-links {
    display: flex;
    gap: 1.5rem;
}

.footer-links a {
    transition: var(--transition);
}

.footer-links a:hover {
    color: var(--primary-color);
}

/* Responsive Styles */
@media (max-width: 1024px) {
    .hero h1 {
        font-size: 2.5rem;
    }
    
    .tab-content.active {
        flex-direction: column;
    }
    
    .tab-image {
        order: -1;
        margin-bottom: 2rem;
    }
}

@media (max-width: 768px) {
    .nav-links {
        display: none;
    }
    
    .hamburger {
        display: block;
    }
    
    .hero .container {
        flex-direction: column;
    }
    
    .hero-content {
        order: 2;
        text-align: center;
    }
    
    .hero-buttons {
        justify-content: center;
    }
    
    .hero-image {
        order: 1;
        margin-bottom: 2rem;
    }
    
    .form-row {
        flex-direction: column;
        gap: 0;
    }
    
    .about .container {
        flex-direction: column;
    }
    
    .about-image {
        order: -1;
        margin-bottom: 2rem;
    }
}

@media (max-width: 480px) {
    .hero h1 {
        font-size: 2rem;
    }
    
    .hero p {
        font-size: 1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
    }
    
    .stats {
        flex-direction: column;
        gap: 1rem;
    }
}  
        
        </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Solutions | Digital Employee Experience Solutions</title>
    <meta name="description" content="AI-powered solutions for digital employee experience. Virtual assistants and rapid prototyping for your business.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">AI-Solutions</a>
            <div class="nav-links">
                <a href="#services">Services</a>
                <a href="#solutions">Solutions</a>
                <a href="#about">About</a>
                <a href="logout.php">LOGOUT</a>
                <a href="#demo" class="cta-button">Request Demo</a>
            </div>
            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <a href="#services">Services</a>
        <a href="#solutions">Solutions</a>
        <a href="#about">About</a>
        <a href="#demo" class="cta-button">Request Demo</a>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Transform Your Digital Employee Experience</h1>
                <p>AI-powered solutions that accelerate innovation and improve workplace productivity</p>
                <div class="hero-buttons">
                    <a href="#demo" class="cta-button">Schedule Demo</a>
                    <a href="#solutions" class="secondary-button">Learn More</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="AI technology">
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2>Our AI-Powered Services</h2>
            <p class="section-subtitle">Innovative solutions designed to enhance your digital workplace</p>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>Virtual Assistant</h3>
                    <p>An intelligent AI assistant that helps employees find information quickly and automate routine tasks.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Rapid Prototyping</h3>
                    <p>Accelerate your innovation with our affordable AI-based prototyping solutions.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Experience Analytics</h3>
                    <p>Gain insights into your digital employee experience and identify areas for improvement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section id="solutions" class="solutions">
        <div class="container">
            <h2>Industry Solutions</h2>
            <p class="section-subtitle">Tailored AI solutions for your specific industry needs</p>
            
            <div class="solutions-tabs">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="healthcare">Healthcare</button>
                    
                </div>
                
                <div class="tab-content active" id="healthcare">
                    <div class="tab-text">
                        <h3>Healthcare AI Solutions</h3>
                        <p>Our AI-powered virtual assistants help healthcare professionals access patient information quickly, reduce administrative burdens, and improve care coordination.</p>
                        <ul>
                            <li>Automated patient record retrieval</li>
                            <li>Clinical decision support</li>
                            <li>Staff scheduling optimization</li>
                        </ul>
                    </div>
                    <div class="tab-image">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Healthcare AI">
                    </div>
                </div>
                
                <div class="tab-content" id="finance">
                    <div class="tab-text">
                        <h3>Financial Services AI</h3>
                        <p>Transform your financial operations with AI that automates routine tasks, detects anomalies, and provides intelligent insights.</p>
                        <ul>
                            <li>Automated document processing</li>
                            <li>Fraud detection systems</li>
                            <li>Customer service chatbots</li>
                        </ul>
                    </div>
                    <div class="tab-image">
                        <img src="https://images.unsplash.com/photo-1553729459-efe14ef6055d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Finance AI">
                    </div>
                </div>
                
                <div class="tab-content" id="manufacturing">
                    <div class="tab-text">
                        <h3>Manufacturing AI</h3>
                        <p>Optimize your manufacturing processes with AI that predicts maintenance needs, improves quality control, and enhances supply chain visibility.</p>
                        <ul>
                            <li>Predictive maintenance</li>
                            <li>Quality control automation</li>
                            <li>Supply chain optimization</li>
                        </ul>
                    </div>
                    <div class="tab-image">
                        <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Manufacturing AI">
                    </div>
                </div>
                
                <div class="tab-content" id="education">
                    <div class="tab-text">
                        <h3>Education AI</h3>
                        <p>Enhance learning experiences with AI that personalizes education, automates administrative tasks, and provides intelligent tutoring.</p>
                        <ul>
                            <li>Personalized learning paths</li>
                            <li>Automated grading systems</li>
                            <li>Virtual teaching assistants</li>
                        </ul>
                    </div>
                    <div class="tab-image">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Education AI">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Section -->
    <section id="demo" class="demo">
        <div class="container">
            <div class="demo-content">
                <h2>Ready to Transform Your Workplace?</h2>
                <p>Schedule a personalized demo to see how our AI solutions can benefit your organization.</p>
                
                <form id="demoRequestForm" class="demo-form" action="submit_demo.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullName">Full Name*</label>
                            <input type="text" id="fullName" name="fullName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" id="company" name="company">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="country">Country*</label>
                            <select id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="UK">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="AU">Australia</option>
                                <option value="DE">Germany</option>
                                <option value="FR">France</option>
                                <option value="IN">India</option>
                                <option value="JP">Japan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>I'm interested in*</label>
                            <div class="interest-options">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="interest" value="virtual-assistant"> Virtual Assistant
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="interest" value="prototyping"> Prototyping
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Additional Information</label>
                        <textarea id="message" name="message" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="joinEvents" value="yes"> Join our mailing list for event invitations and updates
                        </label>
                    </div>
                    
                    <button type="submit" class="submit-button">Request Demo</button>
                </form>
            </div>
        </div>
    </section>
    
    
    <section class="p-6 bg-gray-100" id="inquiry">
    <h2 class="text-2xl font-semibold mb-4">Submit an Inquiry</h2>
    
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo '<p class="text-green-600">Your inquiry was submitted successfully!</p>';
    } elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
        echo '<p class="text-red-600">There was an error submitting your inquiry. Please try again.</p>';
    }
    ?>

    <form method="POST" action="submit_inquiry.php" class="bg-white p-6 rounded shadow max-w-lg">
        <input type="text" name="name" placeholder="Your Name" required class="w-full border p-2 rounded mb-3">
        <input type="email" name="email" placeholder="Your Email" required class="w-full border p-2 rounded mb-3">
        <input type="text" name="subject" placeholder="Subject" required class="w-full border p-2 rounded mb-3">
        <textarea name="message" placeholder="Your Message" required class="w-full border p-2 rounded mb-3"></textarea>

        <label for="interest">Area of Interest</label>
        <select name="interest_type" required class="w-full border p-2 rounded mb-3">
            <option value="virtual-assistant">Virtual Assistant</option>
            <option value="prototyping">Prototyping</option>
            <option value="both">Both</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit Inquiry</button>
    </form>
</section>

    

    <!-- Events Section -->
    <section class="events">
        <div class="container">
            <h2>Upcoming Events</h2>
            <p class="section-subtitle">Join us to learn more about our AI solutions</p>
            
            <div class="events-grid">
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">15</span>
                        <span class="month">Jun</span>
                    </div>
                    <div class="event-details">
                        <h3>AI in Healthcare Webinar</h3>
                        <p class="event-time"><i class="far fa-clock"></i> 2:00 PM - 3:30 PM (GMT)</p>
                        <p class="event-description">Discover how our AI solutions are transforming healthcare organizations.</p>
                        <a href="#demo" class="event-button">Register Now</a>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">22</span>
                        <span class="month">Jun</span>
                    </div>
                    <div class="event-details">
                        <h3>Virtual Product Demo</h3>
                        <p class="event-time"><i class="far fa-clock"></i> 10:00 AM - 11:00 AM (GMT)</p>
                        <p class="event-description">See our AI virtual assistant in action with live demonstrations.</p>
                        <a href="#demo" class="event-button">Register Now</a>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">05</span>
                        <span class="month">Jul</span>
                    </div>
                    <div class="event-details">
                        <h3>AI Innovation Summit</h3>
                        <p class="event-time"><i class="far fa-clock"></i> 9:00 AM - 5:00 PM (GMT)</p>
                        <p class="event-description">Join industry leaders discussing the future of AI in the workplace.</p>
                        <a href="#demo" class="event-button">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-content">
                <h2>About AI-Solutions</h2>
                <p>Founded in Sunderland, AI-Solutions is at the forefront of digital employee experience innovation. Our mission is to help organizations leverage AI to create more productive, engaging, and efficient workplaces.</p>
                <p>What sets us apart is our unique combination of AI-powered virtual assistance and rapid prototyping capabilities, delivered at an affordable price point that makes advanced technology accessible to businesses of all sizes.</p>
                <div class="stats">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Clients Worldwide</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Support</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Satisfaction Guarantee</span>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="AI-Solutions team">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>AI-Solutions</h3>
                    <p>Innovating the future of digital employee experience through AI-powered solutions.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#solutions">Solutions</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#demo">Request Demo</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Sunderland, UK</li>
                        <li><i class="fas fa-phone"></i> +44 123 456 7890</li>
                        <li><i class="fas fa-envelope"></i> info@ai-solutions.com</li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for the latest updates.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 AI-Solutions. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
