document.addEventListener('DOMContentLoaded', () => {
    if(typeof gsap === 'undefined') return;
    gsap.registerPlugin(ScrollTrigger);

    setTimeout(() => {
        const loader = document.getElementById('loader');
        if(loader) {
            loader.style.opacity = '0';
            setTimeout(() => loader.style.display = 'none', 500);
        }
        gsap.from(".gsap-reveal", { y: 50, opacity: 0, duration: 1, stagger: 0.2, ease: "power3.out" });
    }, 1000);

    const fadeUpElements = document.querySelectorAll('.gsap-fade-up');
    fadeUpElements.forEach(el => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: "top 85%", toggleActions: "play none none reverse" },
            y: 50, opacity: 0, duration: 0.8, ease: "power2.out"
        });
    });

    const fadeLeftElements = document.querySelectorAll('.gsap-fade-left');
    fadeLeftElements.forEach(el => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: "top 85%", toggleActions: "play none none reverse" },
            x: 50, opacity: 0, duration: 0.8, ease: "power2.out"
        });
    });

    gsap.from(".service-card", {
        scrollTrigger: { trigger: ".services-grid", start: "top 80%" },
        y: 50, opacity: 0, duration: 0.6, stagger: 0.1, ease: "power2.out"
    });

    const plane = document.getElementById('flyingPlane');
    if(plane) {
        const screenWidth = window.innerWidth;
        gsap.to(plane, {
            scrollTrigger: { trigger: ".airplane-transition", start: "top 70%", end: "bottom top", scrub: 1 },
            x: screenWidth + 300, y: -100, rotation: -5, scale: 1.2, ease: "power1.inOut"
        });
    }
});
