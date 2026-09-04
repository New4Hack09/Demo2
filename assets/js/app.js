document.addEventListener('DOMContentLoaded', () => {
    const callBtns = [document.getElementById('fabCall'), document.getElementById('bottomCall')];
    callBtns.forEach(btn => { if(btn) btn.href = `tel:${businessInfo.phone}`; });

    const servicesGrid = document.getElementById('servicesGrid');
    if(servicesGrid) {
        services.forEach(s => {
            servicesGrid.innerHTML += `<div class="service-card"><div class="service-img"><img src="${s.image}" alt="${s.title}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&q=80&w=400'"></div><div class="service-icon"><i class="fa-solid ${s.icon}"></i></div><div class="service-content"><h3>${s.title}</h3><p>${s.description}</p><button class="btn btn-outline" style="color: var(--color-primary); border-color: var(--color-primary); margin-top: auto;" onclick="openServiceForm('${s.id}')">${s.cta}</button></div></div>`;
        });
    }

    const statsGrid = document.getElementById('statsGrid');
    if(statsGrid) {
        statsGrid.innerHTML = `<div class="stat-item"><h3>${businessInfo.stats.travellers}</h3><p>Happy Travellers</p></div><div class="stat-item"><h3>${businessInfo.stats.destinations}</h3><p>Destinations</p></div><div class="stat-item"><h3>${businessInfo.stats.packages}</h3><p>Travel Packages</p></div><div class="stat-item"><h3>${businessInfo.stats.support}</h3><p>Travel Assistance</p></div>`;
    }

    const reviewsWrapper = document.getElementById('reviewsWrapper');
    if(reviewsWrapper) {
        reviews.forEach(r => {
            let stars = '';
            for(let i=0; i<5; i++) stars += i < r.rating ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
            reviewsWrapper.innerHTML += `<div class="swiper-slide"><div class="review-card"><div class="review-stars">${stars}</div><p class="review-text">"${r.review}"</p><div class="reviewer-info"><img src="${r.photo}" alt="${r.name}" class="reviewer-img"><div class="reviewer-details"><h4>${r.name}</h4><p>Travelled to ${r.destination}</p></div></div></div></div>`;
        });
        if(typeof Swiper !== 'undefined') {
            new Swiper('.reviews-slider', {
                slidesPerView: 1, spaceBetween: 30, loop: true, autoplay: { delay: 4000, disableOnInteraction: false },
                pagination: { el: '.swiper-pagination', clickable: true },
                breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
            });
        }
    }

    const faqAccordion = document.getElementById('faqAccordion');
    if(faqAccordion) {
        faqs.forEach((faq, index) => {
            faqAccordion.innerHTML += `<div class="faq-item"><div class="faq-question">${faq.question} <i class="fa-solid fa-chevron-down"></i></div><div class="faq-answer"><p>${faq.answer}</p></div></div>`;
        });
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(i => i.classList.remove('active'));
                if(!isActive) item.classList.add('active');
            });
        });
    }

    const currentYear = document.getElementById('currentYear');
    if(currentYear) currentYear.textContent = new Date().getFullYear();

    const footerContactInfo = document.getElementById('footerContactInfo');
    if(footerContactInfo) {
        footerContactInfo.innerHTML = `<li><i class="fa-solid fa-phone"></i> ${businessInfo.phone}</li><li><i class="fa-brands fa-whatsapp"></i> +${businessInfo.whatsapp}</li><li><i class="fa-solid fa-envelope"></i> ${businessInfo.email}</li><li><i class="fa-solid fa-location-dot"></i> ${businessInfo.address}</li>`;
    }

    const footerSocials = document.getElementById('footerSocials');
    if(footerSocials) {
        footerSocials.innerHTML = `<a href="${businessInfo.socials.instagram}" target="_blank"><i class="fa-brands fa-instagram"></i></a><a href="${businessInfo.socials.facebook}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a><a href="${businessInfo.socials.youtube}" target="_blank"><i class="fa-brands fa-youtube"></i></a>`;
    }

    const header = document.getElementById('header');
    if(header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) header.classList.add('scrolled');
            else header.classList.remove('scrolled');
        });
    }

    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');
    const closeMenu = document.querySelector('.close-menu');
    const overlay = document.querySelector('.mobile-menu-overlay');
    const mobileLinks = document.querySelectorAll('.mobile-nav-links a');

    function toggleMenu() {
        if(mobileMenu) mobileMenu.classList.toggle('active');
        if(overlay) overlay.classList.toggle('active');
    }

    if(hamburger) hamburger.addEventListener('click', toggleMenu);
    if(closeMenu) closeMenu.addEventListener('click', toggleMenu);
    if(overlay) overlay.addEventListener('click', toggleMenu);
    mobileLinks.forEach(link => link.addEventListener('click', toggleMenu));
});
