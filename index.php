<?php
require_once 'config.php';

// Fetch Settings
$stmt = $conn->query("SELECT setting_key, setting_value FROM settings");
$settings = [];
while ($row = $stmt->fetch()) {
    $settings[$row['setting_key']] = $row['setting_value'];
}

// Fetch Destinations
$destinations = $conn->query("SELECT * FROM destinations ORDER BY id DESC")->fetchAll();

// Fetch Packages with their images
$packages_query = $conn->query("SELECT p.*,
    (SELECT image_path FROM package_images WHERE package_id = p.id AND is_main = 1 LIMIT 1) as main_image
    FROM packages p ORDER BY id DESC");
$packages = $packages_query->fetchAll();

// Fetch Gallery
$gallery = $conn->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();

// Fetch Reviews
$reviews = $conn->query("SELECT * FROM reviews ORDER BY id DESC")->fetchAll();

// Pass business info to JS
$businessInfoJS = json_encode([
    'name' => $settings['business_name'] ?? 'AR Travels',
    'phone' => $settings['phone'] ?? '',
    'whatsapp' => $settings['whatsapp'] ?? '',
    'email' => $settings['email'] ?? '',
    'address' => $settings['address'] ?? '',
    'socials' => [
        'instagram' => $settings['instagram'] ?? '#',
        'facebook' => $settings['facebook'] ?? '#',
        'youtube' => $settings['youtube'] ?? '#'
    ]
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($settings['business_name'] ?? 'AR Travels') ?> | Premium Travel Agency</title>

    <!-- SEO & Meta Tags -->
    <meta name="description" content="AR Travels - Premium travel agency offering curated packages, flight, hotel, bus, and train bookings. Experience unforgettable journeys with personalized assistance.">
    <meta name="robots" content="index, follow">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Icons & Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <h2><?= htmlspecialchars($settings['business_name'] ?? 'AR TRAVELS') ?></h2>
        </div>
    </div>

    <!-- Marquee -->
    <?php if(!empty($settings['marquee_text'])): ?>
    <div class="marquee-container">
        <div class="marquee-text" style="animation-duration: <?= htmlspecialchars($settings['marquee_speed'] ?? '15') ?>s;">
            <?= htmlspecialchars($settings['marquee_text']) ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Navigation -->
    <header id="header" class="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">
                <span class="logo-text"><?= htmlspecialchars($settings['business_name'] ?? 'AR Travels') ?></span>
            </a>

            <nav class="nav-links">
                <a href="#home" class="active">Home</a>
                <a href="#destinations">Destinations</a>
                <a href="#services">Services</a>
                <a href="#packages">Packages</a>
                <a href="#why-us">Why AR Travels</a>
                <a href="#reviews">Reviews</a>
            </nav>

            <div class="nav-actions">
                <button class="btn btn-primary" onclick="openEnquiryForm()">Plan Your Trip</button>
                <div class="hamburger">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay"></div>
    <div class="mobile-menu">
        <div class="mobile-menu-header">
            <span class="logo-text text-dark"><?= htmlspecialchars($settings['business_name'] ?? 'AR Travels') ?></span>
            <button class="close-menu"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <nav class="mobile-nav-links">
            <a href="#home">Home</a>
            <a href="#destinations">Destinations</a>
            <a href="#services">Services</a>
            <a href="#packages">Packages</a>
            <a href="#why-us">Why AR Travels</a>
            <a href="#reviews">Reviews</a>
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
            </div>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section id="destinations" class="destinations section-padding bg-light">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Popular Destinations</h2>
            </div>
            <div class="destinations-grid">
                <?php foreach($destinations as $dest): ?>
                <div class="dest-card" onclick="openEnquiryFormWithDest('<?= htmlspecialchars(addslashes($dest['name'])) ?>')">
                    <div class="dest-img">
                        <img src="<?= htmlspecialchars($dest['image']) ?>" alt="<?= htmlspecialchars($dest['name']) ?>">
                        <div class="dest-overlay"><h3><?= htmlspecialchars($dest['name']) ?></h3></div>
                    </div>
                    <div class="dest-info">
                        <p><?= htmlspecialchars($dest['description']) ?></p>
                        <div class="dest-price">Starting from <span><?= htmlspecialchars($dest['price']) ?></span></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section-padding">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Our Services</h2>
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
            </div>
            <div class="packages-grid">
                <?php foreach($packages as $pkg): ?>
                <div class="package-card">
                    <div class="pkg-img">
                        <img src="<?= htmlspecialchars($pkg['main_image'] ?? 'assets/images/placeholder.jpg') ?>">
                        <?php if($pkg['discount']): ?><div class="pkg-badge"><?= htmlspecialchars($pkg['discount']) ?></div><?php endif; ?>
                    </div>
                    <div class="pkg-content">
                        <div class="pkg-dest"><?= htmlspecialchars($pkg['destination']) ?></div>
                        <h3><?= htmlspecialchars($pkg['title']) ?></h3>
                        <div class="pkg-duration"><i class="fa-regular fa-clock"></i> <?= htmlspecialchars($pkg['duration']) ?></div>
                        <div class="pkg-price-row">
                            <div>
                                <?php if($pkg['old_price']): ?><div class="old-price"><?= htmlspecialchars($pkg['old_price']) ?></div><?php endif; ?>
                                <div class="new-price"><?= htmlspecialchars($pkg['price']) ?></div>
                            </div>
                        </div>
                        <div class="pkg-actions">
                            <button class="btn btn-outline" style="color:var(--color-primary); border-color:var(--color-primary);" onclick="viewPackage(<?= $pkg['id'] ?>)">Details</button>
                            <button class="btn btn-primary" onclick="bookPackage(<?= $pkg['id'] ?>, '<?= htmlspecialchars(addslashes($pkg['title'])) ?>', '<?= htmlspecialchars(addslashes($pkg['duration'])) ?>')">Book</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Airplane 2 Transition -->
    <section class="airplane-transition-2" style="position: relative; height: 300px; background: var(--color-bg); overflow: hidden;">
        <div class="plane-container" id="planeContainer2" style="position: absolute; top: 50%; right: -150px; transform: translateY(-50%); z-index: 3; width: 150px;">
            <img src="assets/images/plan2.png" alt="Flying Airplane 2" id="flyingPlane2">
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery section-padding bg-light">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>Travel Gallery</h2>
            </div>

            <div class="swiper gallery-slider">
                <div class="swiper-wrapper">
                    <?php foreach($gallery as $img): ?>
                    <div class="swiper-slide">
                        <div style="position: relative; border-radius: 8px; overflow: hidden;">
                            <img src="<?= htmlspecialchars($img['image_path']) ?>" style="width: 100%; height: 300px; object-fit: cover;">
                            <?php if($img['title']): ?>
                            <div style="position: absolute; bottom: 0; width: 100%; background: rgba(0,0,0,0.6); color: white; padding: 10px; text-align: center;">
                                <?= htmlspecialchars($img['title']) ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Train Transition -->
    <section class="train-transition" style="position: relative; height: 200px; background: #e0e0e0; overflow: hidden;">
        <div class="container transition-content" style="padding-top:20px;">
            <h2 style="color:var(--color-primary);">Journey across lands</h2>
        </div>
        <div style="position: absolute; bottom: 10px; left: -250px; z-index: 3;" id="movingTrain">
            <img src="assets/images/train.png" alt="Train" style="width: 250px;">
        </div>
        <div style="position: absolute; bottom: 0; width: 100%; height: 10px; background: #333;"></div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="reviews section-padding">
        <div class="container">
            <div class="section-header text-center gsap-fade-up">
                <h2>What Our Travellers Say</h2>
            </div>
            <div class="swiper reviews-slider">
                <div class="swiper-wrapper">
                    <?php foreach($reviews as $r): ?>
                    <div class="swiper-slide">
                        <div class="review-card">
                            <div class="review-stars">
                                <?php for($i=0; $i<5; $i++): ?>
                                    <i class="fa-<?= $i < $r['rating'] ? 'solid' : 'regular' ?> fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="review-text">"<?= htmlspecialchars($r['review']) ?>"</p>
                            <div class="reviewer-info">
                                <img src="<?= htmlspecialchars($r['photo']) ?>" class="reviewer-img">
                                <div class="reviewer-details">
                                    <h4><?= htmlspecialchars($r['name']) ?></h4>
                                    <p>Travelled to <?= htmlspecialchars($r['destination']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <footer id="contact" class="footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <h3 class="footer-logo-text"><?= htmlspecialchars($settings['business_name'] ?? 'AR Travels') ?></h3>
                <div class="social-links" id="footerSocials"></div>
            </div>
            <div class="footer-contact">
                <h4>Contact Us</h4>
                <ul id="footerContactInfo"></ul>
            </div>
        </div>
    </footer>

    <div class="mobile-bottom-bar">
        <a href="#" id="bottomWa" class="bottom-action"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
        <a href="#" id="bottomCall" class="bottom-action"><i class="fa-solid fa-phone"></i> Call</a>
        <button class="bottom-action primary" onclick="openEnquiryForm()"><i class="fa-solid fa-paper-plane"></i> Plan Trip</button>
    </div>

    <!-- Forms HTML (Same structure as before) -->
    <?php require_once 'modals.php'; ?>

    <!-- Scripts -->
    <script>
        const businessInfo = <?= $businessInfoJS ?>;
        const packagesData = <?= json_encode($packages) ?>;

        function openEnquiryFormWithDest(destName) {
            document.getElementById('enquiryForm').querySelector('input[name="destination"]').value = destName;
            openEnquiryForm();
        }

        function bookPackage(id, title, duration) {
            document.getElementById('pkgFormName').value = title;
            document.getElementById('pkgFormId').value = id;
            document.getElementById('pkgFormTitle').innerText = title;
            document.getElementById('pkgFormDuration').innerText = duration;
            openModal('packageFormModal');
        }

        function viewPackage(id) {
            const pkg = packagesData.find(p => p.id == id);
            if(!pkg) return;
            const content = document.getElementById('packageDetailContent');

            // Build details
            let inc = JSON.parse(pkg.inclusions || '[]');
            let exc = JSON.parse(pkg.exclusions || '[]');
            let iti = JSON.parse(pkg.itinerary || '[]');

            let incHtml = '<ul>'; inc.forEach(i => incHtml += `<li><i class="fa-solid fa-check text-success"></i> ${i}</li>`); incHtml += '</ul>';
            let excHtml = '<ul>'; exc.forEach(i => excHtml += `<li><i class="fa-solid fa-xmark text-danger"></i> ${i}</li>`); excHtml += '</ul>';
            let itiHtml = ''; iti.forEach(i => itiHtml += `<div class="day-item"><div class="day-title">${i.day}: ${i.title}</div><p>${i.description}</p></div>`);

            content.innerHTML = `
                <div class="pkg-detail-body">
                    <h2>${pkg.title}</h2>
                    <p>${pkg.duration} | ${pkg.destination}</p>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top:20px;">
                        <div><h3>Inclusions</h3>${incHtml}</div>
                        <div><h3>Exclusions</h3>${excHtml}</div>
                    </div>
                    <div class="mt-4"><h3>Itinerary</h3>${itiHtml}</div>
                </div>
            `;
            openModal('packageDetailModal');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const waLink = "https://wa.me/" + businessInfo.whatsapp;
            const callLink = "tel:" + businessInfo.phone;

            document.getElementById('bottomWa').href = waLink;
            document.getElementById('bottomCall').href = callLink;

            document.getElementById('footerContactInfo').innerHTML = `
                <li><i class="fa-solid fa-phone"></i> ${businessInfo.phone}</li>
                <li><i class="fa-brands fa-whatsapp"></i> +${businessInfo.whatsapp}</li>
                <li><i class="fa-solid fa-envelope"></i> ${businessInfo.email}</li>
                <li><i class="fa-solid fa-location-dot"></i> ${businessInfo.address}</li>
            `;

            // Init Gallery Swiper
            new Swiper('.gallery-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: { delay: 3000, disableOnInteraction: false },
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Using static files for remaining unchanged logic -->
    <script src="assets/js/whatsapp.js"></script>
    <script src="assets/js/forms.js"></script>
    <script src="assets/js/animations.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
