html_content = """<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR Travels | Premium Travel Agency</title>

    <!-- SEO & Meta Tags -->
    <meta name="description" content="AR Travels - Premium travel agency offering curated packages, flight, hotel, bus, and train bookings. Experience unforgettable journeys with personalized assistance.">
    <meta name="keywords" content="travel agency, flight booking, hotel booking, holiday packages, AR Travels, Dubai packages, Maldives packages, domestic travel, international travel">
    <meta name="author" content="AR Travels">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.artravels.com/">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.artravels.com/">
    <meta property="og:title" content="AR Travels | Premium Travel Agency">
    <meta property="og:description" content="Explore amazing destinations, curated travel packages, and unforgettable journeys with AR Travels.">
    <meta property="og:image" content="https://www.artravels.com/assets/images/about-travel.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.artravels.com/">
    <meta property="twitter:title" content="AR Travels | Premium Travel Agency">
    <meta property="twitter:description" content="Explore amazing destinations, curated travel packages, and unforgettable journeys with AR Travels.">
    <meta property="twitter:image" content="https://www.artravels.com/assets/images/about-travel.jpg">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "TravelAgency",
      "name": "AR Travels",
      "image": "https://www.artravels.com/assets/images/logo.png",
      "@id": "https://www.artravels.com/",
      "url": "https://www.artravels.com/",
      "telephone": "+918866022341",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "New Delhi",
        "addressLocality": "New Delhi",
        "postalCode": "110001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.6139,
        "longitude": 77.2090
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
          "Sunday"
        ],
        "opens": "00:00",
        "closes": "23:59"
      }
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Icons (FontAwesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

    <!-- Loader -->
    <div id="loader" class="loader-wrapper">
        <div class="loader-content">
            <i class="fa-solid fa-plane-departure loader-icon"></i>
            <h2>AR TRAVELS</h2>
        </div>
    </div>

    <!-- Navigation -->
    <header id="header" class="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">
                <img src="assets/images/logo.png" alt="AR Travels Logo" onerror="this.outerHTML='<span class=\\'logo-text\\'>AR Travels</span>'">
            </a>

            <nav class="nav-links">
                <a href="#home" class="active">Home</a>
                <a href="#destinations">Destinations</a>
                <a href="#services">Services</a>
                <a href="#packages">Packages</a>
                <a href="#why-us">Why AR Travels</a>
                <a href="#reviews">Reviews</a>
                <a href="#contact">Contact</a>
            </nav>

            <div class="nav-actions">
                <button class="btn btn-primary" onclick="openEnquiryForm()">Plan Your Trip</button>
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay"></div>
    <div class="mobile-menu">
        <div class="mobile-menu-header">
            <img src="assets/images/logo.png" alt="AR Travels Logo" onerror="this.outerHTML='<span class=\\'logo-text\\'>AR Travels</span>'">
            <button class="close-menu"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <nav class="mobile-nav-links">
            <a href="#home">Home</a>
            <a href="#destinations">Destinations</a>
            <a href="#services">Services</a>
            <a href="#packages">Packages</a>
            <a href="#why-us">Why AR Travels</a>
            <a href="#reviews">Reviews</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="mobile-nav-footer">
            <button class="btn btn-primary full-width" onclick="openEnquiryForm()">Plan Your Trip</button>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-video-wrapper">
            <video autoplay muted loop playsinline id="heroVideo">
                <source src="assets/videos/hero.mp4" type="video/mp4">
            </video>
            <div class="hero-overlay"></div>
        </div>
        <div class="container hero-content">
            <h1 class="gsap-reveal">Explore More.<br>Experience More.</h1>
            <p class="gsap-reveal delay-1">Discover amazing destinations, curated travel packages and unforgettable journeys.</p>
            <div class="hero-buttons gsap-reveal delay-2">
                <a href="#packages" class="btn btn-primary">Explore Packages</a>
                <button class="btn btn-secondary" onclick="openEnquiryForm()">Plan Your Trip</button>
                <a href="https://wa.me/918866022341" target="_blank" class="btn btn-outline"><i class="fa-brands fa-whatsapp"></i> WhatsApp Us</a>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="introduction section-padding">
        <div class="container intro-container">
            <div class="intro-text">
                <h2 class="section-title gsap-fade-up">Your Journey Begins Here.</h2>
                <p class="gsap-fade-up delay-1">From flights and hotels to complete holiday packages, AR Travels helps you plan your journey with comfort, convenience and trusted assistance.</p>
            </div>
            <div class="intro-image gsap-fade-left">
                <img src="assets/images/about-travel.jpg" alt="Travel Planning" onerror="this.src='https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&q=80&w=800'">
            </div>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section id="destinations" class="destinations section-padding bg-light">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Popular Destinations</h2>
                <p>Explore our most loved travel spots</p>
                <div class="destination-filters" id="destinationFilters">
                    <button class="filter-btn active" data-filter="All">All</button>
                    <button class="filter-btn" data-filter="International">International</button>
                    <button class="filter-btn" data-filter="Domestic">Domestic</button>
                    <button class="filter-btn" data-filter="Beach">Beach</button>
                    <button class="filter-btn" data-filter="Mountains">Mountains</button>
                </div>
            </div>
            <div class="destinations-grid" id="destinationsGrid">
                <!-- Injected via JS -->
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section-padding">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Our Services</h2>
                <p>Everything you need for a perfect trip</p>
            </div>
            <div class="services-grid" id="servicesGrid">
                <!-- Injected via JS -->
            </div>
        </div>
    </section>

    <!-- Airplane Transition Section -->
    <section class="airplane-transition">
        <div class="transition-overlay"></div>
        <div class="container transition-content">
            <h2>Where will you go next?</h2>
        </div>
        <div class="plane-container" id="planeContainer">
            <img src="assets/images/plane.png" alt="Flying Airplane" id="flyingPlane">
            <div class="clouds-bg"></div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="packages section-padding bg-light">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Featured Travel Packages</h2>
                <p>Curated experiences for unforgettable memories</p>
            </div>
            <div class="packages-grid" id="packagesGrid">
                <!-- Injected via JS -->
            </div>
        </div>
    </section>

    <!-- Why Choose Us & How it Works -->
    <section id="why-us" class="why-us section-padding">
        <div class="container why-us-container">
            <div class="why-us-content gsap-fade-up">
                <h2 class="section-title">Why Choose AR Travels?</h2>
                <ul class="feature-list">
                    <li><i class="fa-solid fa-check-circle"></i> Reliable & Professional Service</li>
                    <li><i class="fa-solid fa-check-circle"></i> Personalized Travel Assistance</li>
                    <li><i class="fa-solid fa-check-circle"></i> Competitive Pricing</li>
                    <li><i class="fa-solid fa-check-circle"></i> Complete Travel Support</li>
                    <li><i class="fa-solid fa-check-circle"></i> Hassle-Free Booking</li>
                    <li><i class="fa-solid fa-check-circle"></i> Trusted Assistance Before & During Your Journey</li>
                </ul>
            </div>
            <div class="how-it-works gsap-fade-left">
                <h3>How It Works</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot">1</div>
                        <div class="timeline-text">Choose Your Service</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot">2</div>
                        <div class="timeline-text">Share Your Travel Details</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot">3</div>
                        <div class="timeline-text">We Find the Right Option</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot">4</div>
                        <div class="timeline-text">Confirm Your Booking</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot">5</div>
                        <div class="timeline-text">Enjoy Your Journey</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section bg-primary text-white">
        <div class="container">
            <div class="stats-grid" id="statsGrid">
                <!-- Injected via JS -->
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery section-padding bg-light">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Travel Gallery</h2>
                <p>Glimpses of beautiful destinations</p>
            </div>
            <div class="gallery-masonry">
                <div class="gallery-item"><img src="assets/images/gallery-01.jpg" alt="Gallery 1" onerror="this.src='https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&q=80&w=600'"></div>
                <div class="gallery-item"><img src="assets/images/gallery-02.jpg" alt="Gallery 2" onerror="this.src='https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80&w=600'"></div>
                <div class="gallery-item"><img src="assets/images/gallery-03.jpg" alt="Gallery 3" onerror="this.src='https://images.unsplash.com/photo-1506929562872-bb421503ef21?auto=format&fit=crop&q=80&w=600'"></div>
                <div class="gallery-item"><img src="assets/images/gallery-04.jpg" alt="Gallery 4" onerror="this.src='https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&q=80&w=600'"></div>
                <div class="gallery-item"><img src="assets/images/gallery-05.jpg" alt="Gallery 5" onerror="this.src='https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&q=80&w=600'"></div>
                <div class="gallery-item"><img src="assets/images/gallery-06.jpg" alt="Gallery 6" onerror="this.src='https://images.unsplash.com/photo-1473625247510-8ceb1760943f?auto=format&fit=crop&q=80&w=600'"></div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="reviews section-padding">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>What Our Travellers Say</h2>
            </div>
            <div class="swiper reviews-slider">
                <div class="swiper-wrapper" id="reviewsWrapper">
                    <!-- Injected via JS -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq section-padding bg-light">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="faq-accordion" id="faqAccordion">
                <!-- Injected via JS -->
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section section-padding text-center bg-primary text-white">
        <div class="container">
            <h2>Ready to start your journey?</h2>
            <p>Let us plan the perfect trip for you.</p>
            <button class="btn btn-light btn-lg mt-4" onclick="openEnquiryForm()">Plan Your Trip Now</button>
        </div>
    </section>

    <!-- Contact & Footer -->
    <footer id="contact" class="footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <img src="assets/images/logo.png" alt="AR Travels Logo" class="footer-logo" onerror="this.outerHTML='<h3 class=\\'footer-logo-text\\'>AR Travels</h3>'">
                <p>Your trusted partner for comfortable, convenient, and memorable travel experiences.</p>
                <div class="social-links" id="footerSocials">
                    <!-- Injected via JS -->
                </div>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#destinations">Destinations</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#packages">Packages</a></li>
                    <li><a href="#reviews">Reviews</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Services</h4>
                <ul>
                    <li><a href="#" onclick="openServiceForm('flight')">Flight Booking</a></li>
                    <li><a href="#" onclick="openServiceForm('hotel')">Hotel Booking</a></li>
                    <li><a href="#" onclick="openServiceForm('bus')">Bus Booking</a></li>
                    <li><a href="#" onclick="openServiceForm('train')">Train Booking</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Contact Us</h4>
                <ul id="footerContactInfo">
                    <!-- Injected via JS -->
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; <span id="currentYear"></span> AR Travels. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Buttons -->
    <div class="fab-container">
        <a href="tel:+918866022341" class="fab call-fab" id="fabCall">
            <i class="fa-solid fa-phone"></i>
        </a>
        <a href="https://wa.me/918866022341" target="_blank" class="fab whatsapp-fab">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <!-- Mobile Bottom Bar -->
    <div class="mobile-bottom-bar">
        <a href="https://wa.me/918866022341" target="_blank" class="bottom-action"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
        <a href="tel:+918866022341" class="bottom-action" id="bottomCall"><i class="fa-solid fa-phone"></i> Call</a>
        <button class="bottom-action primary" onclick="openEnquiryForm()"><i class="fa-solid fa-paper-plane"></i> Plan Trip</button>
    </div>

    <!-- MODALS -->

    <!-- Flight Booking Modal -->
    <div id="flightFormModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Flight Booking</h3>
                <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form id="flightForm" onsubmit="handleFormSubmit(event, 'flight')">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Trip Type *</label>
                            <select name="tripType" required onchange="toggleReturnDate(this, 'flightReturnDate')">
                                <option value="One Way">One Way</option>
                                <option value="Round Trip">Round Trip</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <select name="flightClass">
                                <option value="Economy">Economy</option>
                                <option value="Premium Economy">Premium Economy</option>
                                <option value="Business">Business</option>
                                <option value="First">First</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>From (City/Airport) *</label>
                            <input type="text" name="from" required placeholder="e.g. Delhi (DEL)">
                        </div>
                        <div class="form-group">
                            <label>To (City/Airport) *</label>
                            <input type="text" name="to" required placeholder="e.g. Dubai (DXB)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Departure Date *</label>
                            <input type="date" name="departureDate" required min="">
                        </div>
                        <div class="form-group" id="flightReturnDate" style="display: none;">
                            <label>Return Date *</label>
                            <input type="date" name="returnDate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Adults (12+) *</label>
                            <input type="number" name="adults" min="1" value="1" required>
                        </div>
                        <div class="form-group">
                            <label>Children (2-11)</label>
                            <input type="number" name="children" min="0" value="0">
                        </div>
                        <div class="form-group">
                            <label>Infants (0-2)</label>
                            <input type="number" name="infants" min="0" value="0">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Special Fare (Optional)</label>
                            <select name="specialFare">
                                <option value="None">None</option>
                                <option value="Student">Student</option>
                                <option value="Senior Citizen">Senior Citizen</option>
                                <option value="Defence">Defence</option>
                            </select>
                        </div>
                        <div class="form-group checkbox-group">
                            <label><input type="checkbox" name="nonStop"> Non-stop flights only</label>
                        </div>
                    </div>
                    <h4 class="form-section-title">Contact Details</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Passenger Name *</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number *</label>
                            <input type="tel" name="mobile" required pattern="[0-9]{10}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>WhatsApp Number *</label>
                            <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Special Requests</label>
                        <textarea name="requests" rows="2" placeholder="e.g. Window seat preferred..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary full-width">Review Details</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Hotel Booking Modal -->
    <div id="hotelFormModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Hotel Booking</h3>
                <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form id="hotelForm" onsubmit="handleFormSubmit(event, 'hotel')">
                    <div class="form-group">
                        <label>Destination / Nearby *</label>
                        <input type="text" name="destination" required placeholder="City or area">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Check-in Date *</label>
                            <input type="date" name="checkIn" required min="">
                        </div>
                        <div class="form-group">
                            <label>Check-out Date *</label>
                            <input type="date" name="checkOut" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Rooms *</label>
                            <input type="number" name="rooms" min="1" value="1" required>
                        </div>
                        <div class="form-group">
                            <label>Adults *</label>
                            <input type="number" name="adults" min="1" value="2" required>
                        </div>
                        <div class="form-group">
                            <label>Children</label>
                            <input type="number" name="children" min="0" value="0">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Hotel Preference *</label>
                            <select name="hotelPreference" required>
                                <option value="Standard">Standard</option>
                                <option value="Budget">Budget</option>
                                <option value="Premium">Premium</option>
                                <option value="Luxury">Luxury</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Meal Preference</label>
                            <select name="mealPreference">
                                <option value="Room Only">Room Only</option>
                                <option value="Breakfast Included">Breakfast Included</option>
                                <option value="Half Board (Breakfast + Dinner)">Half Board</option>
                                <option value="Full Board">Full Board</option>
                            </select>
                        </div>
                    </div>
                    <h4 class="form-section-title">Contact Details</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Guest Name *</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>WhatsApp Number *</label>
                            <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Special Requests (Optional)</label>
                        <textarea name="requests" rows="2" placeholder="Specific hotel name, twin beds, etc."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary full-width">Review Details</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bus Booking Modal -->
    <div id="busFormModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Bus Booking</h3>
                <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form id="busForm" onsubmit="handleFormSubmit(event, 'bus')">
                    <div class="form-row">
                        <div class="form-group">
                            <label>From *</label>
                            <input type="text" name="from" required>
                        </div>
                        <div class="form-group">
                            <label>To *</label>
                            <input type="text" name="to" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Date of Travel *</label>
                            <input type="date" name="travelDate" required min="">
                        </div>
                        <div class="form-group">
                            <label>Bus Preference *</label>
                            <select name="busPreference" required>
                                <option value="AC Sleeper">AC Sleeper</option>
                                <option value="AC Seater">AC Seater</option>
                                <option value="Non-AC Sleeper">Non-AC Sleeper</option>
                                <option value="Non-AC Seater">Non-AC Seater</option>
                                <option value="Volvo / Premium">Volvo / Premium</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Total Passengers *</label>
                            <input type="number" name="passengers" min="1" value="1" required>
                        </div>
                        <div class="form-group">
                            <label>Preferred Time</label>
                            <select name="time">
                                <option value="Any">Any</option>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening/Night">Evening/Night</option>
                            </select>
                        </div>
                    </div>
                    <h4 class="form-section-title">Contact Details</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Passenger Name *</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>WhatsApp Number *</label>
                            <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary full-width">Review Details</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Train Booking Modal -->
    <div id="trainFormModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Train Booking</h3>
                <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form id="trainForm" onsubmit="handleFormSubmit(event, 'train')">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Trip Type *</label>
                            <select name="tripType" required onchange="toggleReturnDate(this, 'trainReturnDate')">
                                <option value="One Way">One Way</option>
                                <option value="Round Trip">Round Trip</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Train Class *</label>
                            <select name="trainClass" required>
                                <option value="All">All Classes</option>
                                <option value="3A">3A (Third AC)</option>
                                <option value="2A">2A (Second AC)</option>
                                <option value="1A">1A (First AC)</option>
                                <option value="SL">Sleeper (SL)</option>
                                <option value="CC">AC Chair Car (CC)</option>
                                <option value="2S">Second Seater (2S)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>From (Station) *</label>
                            <input type="text" name="from" required>
                        </div>
                        <div class="form-group">
                            <label>To (Station) *</label>
                            <input type="text" name="to" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Journey Date *</label>
                            <input type="date" name="journeyDate" required min="">
                        </div>
                        <div class="form-group" id="trainReturnDate" style="display: none;">
                            <label>Return Date *</label>
                            <input type="date" name="returnDate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Adults *</label>
                            <input type="number" name="adults" min="1" value="1" required>
                        </div>
                        <div class="form-group">
                            <label>Children (0-11)</label>
                            <input type="number" name="children" min="0" value="0">
                        </div>
                    </div>
                    <h4 class="form-section-title">Contact Details</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Primary Passenger *</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>WhatsApp Number *</label>
                            <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                        </div>
                    </div>
                    <div class="form-group checkbox-group">
                        <label><input type="checkbox" name="lowerBerth"> Lower Berth Preference (Subject to availability)</label>
                    </div>
                    <button type="submit" class="btn btn-primary full-width">Review Details</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Package Detail Modal -->
    <div id="packageDetailModal" class="modal full-screen-modal">
        <div class="modal-content">
            <button class="close-modal floating-close"><i class="fa-solid fa-xmark"></i></button>
            <div id="packageDetailContent">
                <!-- Injected via JS -->
            </div>
        </div>
    </div>

    <!-- Package Enquiry Modal -->
    <div id="packageFormModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Book Package</h3>
                <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form id="packageForm" onsubmit="handleFormSubmit(event, 'package')">
                    <input type="hidden" name="packageName" id="pkgFormName">
                    <input type="hidden" name="packageId" id="pkgFormId">
                    <div class="selected-package-summary">
                        <h4 id="pkgFormTitle">Package Name</h4>
                        <p id="pkgFormDuration">Duration</p>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Travel Date *</label>
                            <input type="date" name="travelDate" required min="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Adults *</label>
                            <input type="number" name="adults" min="1" value="2" required>
                        </div>
                        <div class="form-group">
                            <label>Children</label>
                            <input type="number" name="children" min="0" value="0">
                        </div>
                    </div>
                    <h4 class="form-section-title">Contact Details</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Your Name *</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>WhatsApp Number *</label>
                            <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Special Requests / Customization (Optional)</label>
                        <textarea name="requests" rows="2" placeholder="Any specific requirements?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary full-width">Review Details</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Trip Enquiry Modal -->
    <div id="enquiryFormModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Plan Your Trip</h3>
                <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form id="enquiryForm" onsubmit="handleFormSubmit(event, 'enquiry')">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Starting City *</label>
                            <input type="text" name="from" required>
                        </div>
                        <div class="form-group">
                            <label>Destination (City/Country) *</label>
                            <input type="text" name="destination" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Planned Travel Date</label>
                            <input type="date" name="travelDate" min="">
                        </div>
                        <div class="form-group">
                            <label>Duration (Days)</label>
                            <input type="number" name="duration" min="1" value="5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Total Travellers *</label>
                            <input type="number" name="travellers" min="1" value="2" required>
                        </div>
                        <div class="form-group">
                            <label>Approx Budget (Per Person)</label>
                            <select name="budget">
                                <option value="Not Sure">Not Sure</option>
                                <option value="Economy (Under ₹20k)">Economy</option>
                                <option value="Standard (₹20k - ₹50k)">Standard</option>
                                <option value="Premium (₹50k - ₹1L)">Premium</option>
                                <option value="Luxury (₹1L+)">Luxury</option>
                            </select>
                        </div>
                    </div>
                    <h4 class="form-section-title">Contact Details</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Your Name *</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>WhatsApp Number *</label>
                            <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary full-width">Review Details</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Booking Summary Modal -->
    <div id="summaryModal" class="modal">
        <div class="modal-content summary-content">
            <div class="modal-header">
                <h3>Trip Summary</h3>
                <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="summary-card" id="summaryCardContent">
                    <!-- Injected via JS -->
                </div>
                <div class="summary-actions">
                    <button class="btn btn-outline" onclick="closeSummaryAndEdit()">Edit Details</button>
                    <button class="btn btn-whatsapp" id="confirmWhatsAppBtn"><i class="fa-brands fa-whatsapp"></i> Confirm & Continue</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast"></div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script src="assets/js/data.js"></script>
    <script src="assets/js/whatsapp.js"></script>
    <script src="assets/js/forms.js"></script>
    <script src="assets/js/destinations.js"></script>
    <script src="assets/js/packages.js"></script>
    <script src="assets/js/animations.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
"""
with open('/app/index.html', 'w') as f:
    f.write(html_content)
