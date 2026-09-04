document.addEventListener('DOMContentLoaded', () => {
    // Inject Dynamic Data

    // Phone numbers
    document.getElementById('fabCall').href = `tel:${businessInfo.phone}`;
    document.getElementById('bottomCall').href = `tel:${businessInfo.phone}`;

    // Services
    const servicesGrid = document.getElementById('servicesGrid');
    services.forEach(s => {
        servicesGrid.innerHTML += `
            <div class="service-card">
                <div class="service-img">
                    <img src="${s.image}" alt="${s.title}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&q=80&w=400'">
                </div>
                <div class="service-icon"><i class="fa-solid ${s.icon}"></i></div>
                <div class="service-content">
                    <h3>${s.title}</h3>
                    <p>${s.description}</p>
                    <button class="btn btn-outline" style="color: var(--color-primary); border-color: var(--color-primary); margin-top: auto;" onclick="openServiceForm('${s.id}')">${s.cta}</button>
                </div>
            </div>
        `;
    });

    // Stats
    const statsGrid = document.getElementById('statsGrid');
    statsGrid.innerHTML = `
        <div class="stat-item"><h3>${businessInfo.stats.travellers}</h3><p>Happy Travellers</p></div>
        <div class="stat-item"><h3>${businessInfo.stats.destinations}</h3><p>Destinations</p></div>
        <div class="stat-item"><h3>${businessInfo.stats.packages}</h3><p>Travel Packages</p></div>
        <div class="stat-item"><h3>${businessInfo.stats.support}</h3><p>Travel Assistance</p></div>
    `;

    // Reviews
    const reviewsWrapper = document.getElementById('reviewsWrapper');
    reviews.forEach(r => {
        // Create stars HTML
        let stars = '';
        for(let i=0; i<5; i++) {
            stars += i < r.rating ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }

        reviewsWrapper.innerHTML += `
            <div class="swiper-slide">
                <div class="review-card">
                    <div class="review-stars">${stars}</div>
                    <p class="review-text">"${r.review}"</p>
                    <div class="reviewer-info">
                        <img src="${r.photo}" alt="${r.name}" class="reviewer-img">
                        <div class="reviewer-details">
                            <h4>${r.name}</h4>
                            <p>Travelled to ${r.destination}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    // Initialize Swiper
    new Swiper('.reviews-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });

    // FAQs
    const faqAccordion = document.getElementById('faqAccordion');
    faqs.forEach((faq, index) => {
        faqAccordion.innerHTML += `
            <div class="faq-item">
                <div class="faq-question">
                    ${faq.question}
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>${faq.answer}</p>
                </div>
            </div>
        `;
    });

    // FAQ Toggle Logic
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');

            // Close all
            faqItems.forEach(i => i.classList.remove('active'));

            // Open clicked if it wasn't active
            if(!isActive) {
                item.classList.add('active');
            }
        });
    });

    // Footer Info
    document.getElementById('currentYear').textContent = new Date().getFullYear();
    document.getElementById('footerContactInfo').innerHTML = `
        <li><i class="fa-solid fa-phone"></i> ${businessInfo.phone}</li>
        <li><i class="fa-brands fa-whatsapp"></i> +${businessInfo.whatsapp}</li>
        <li><i class="fa-solid fa-envelope"></i> ${businessInfo.email}</li>
        <li><i class="fa-solid fa-location-dot"></i> ${businessInfo.address}</li>
    `;

    document.getElementById('footerSocials').innerHTML = `
        <a href="${businessInfo.socials.instagram}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <a href="${businessInfo.socials.facebook}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="${businessInfo.socials.youtube}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
    `;

    // Navbar Scroll Effect
    const header = document.getElementById('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Mobile Menu
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');
    const closeMenu = document.querySelector('.close-menu');
    const overlay = document.querySelector('.mobile-menu-overlay');
    const mobileLinks = document.querySelectorAll('.mobile-nav-links a');

    function toggleMenu() {
        mobileMenu.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    hamburger.addEventListener('click', toggleMenu);
    closeMenu.addEventListener('click', toggleMenu);
    overlay.addEventListener('click', toggleMenu);

    mobileLinks.forEach(link => {
        link.addEventListener('click', toggleMenu);
    });
});
