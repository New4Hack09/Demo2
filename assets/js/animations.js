document.addEventListener('DOMContentLoaded', () => {
    // Register GSAP plugins
    gsap.registerPlugin(ScrollTrigger);

    // Hide loader
    setTimeout(() => {
        const loader = document.getElementById('loader');
        loader.style.opacity = '0';
        setTimeout(() => loader.style.display = 'none', 500);

        // Initial hero animations
        gsap.from(".gsap-reveal", {
            y: 50,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            ease: "power3.out"
        });
    }, 1000);

    // Scroll Animations
    const fadeUpElements = document.querySelectorAll('.gsap-fade-up');
    fadeUpElements.forEach(el => {
        gsap.from(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%",
                toggleActions: "play none none reverse"
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            ease: "power2.out"
        });
    });

    const fadeLeftElements = document.querySelectorAll('.gsap-fade-left');
    fadeLeftElements.forEach(el => {
        gsap.from(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%",
                toggleActions: "play none none reverse"
            },
            x: 50,
            opacity: 0,
            duration: 0.8,
            ease: "power2.out"
        });
    });

    // Services stagger
    gsap.from(".service-card", {
        scrollTrigger: {
            trigger: ".services-grid",
            start: "top 80%"
        },
        y: 50,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        ease: "power2.out"
    });

    // Plane Flying Animation
    const plane = document.getElementById('flyingPlane');

    // Determine screen width for animation distance
    const screenWidth = window.innerWidth;

    gsap.to(plane, {
        scrollTrigger: {
            trigger: ".airplane-transition",
            start: "top 70%",
            end: "bottom top",
            scrub: 1, // Smooth scrubbing
            // toggleActions: "play none none reverse" // Alternative if scrub isn't wanted
        },
        x: screenWidth + 300, // Move across screen + buffer
        y: -100, // Slight upward movement
        rotation: -5, // Slight tilt
        scale: 1.2,
        ease: "power1.inOut"
    });
});
