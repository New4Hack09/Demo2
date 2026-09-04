# AR Travels

Premium frontend-only travel agency website.

## Features
- Fully responsive design (Mobile First)
- GSAP Scroll animations including a scroll-triggered flying plane
- Service booking forms with validation and summary
- Dynamic WhatsApp message generation (URL encoded)
- Centralized data management (`assets/js/data.js`)
- No backend required

## Deployment
This is a static website. Simply upload all files to any static hosting provider (e.g., Netlify, Vercel, GitHub Pages, AWS S3).

## Data Configuration
All dynamic content is stored in `assets/js/data.js`. You can edit this file to update:
- Business Info (Phone, WhatsApp, Email, Socials)
- Destinations
- Services
- Packages
- Reviews
- FAQs

## Image Placeholder Map
Replace the placeholder files with your actual images at the paths below. The website will automatically use them without needing HTML changes.

`assets/images/logo.png`
→ Navbar + Footer + Mobile Menu

`assets/videos/hero.mp4`
→ Main Hero background video

`assets/images/plane.png`
→ Scroll-triggered airplane animation

`assets/images/about-travel.jpg`
→ Introduction section image

`assets/images/destinations/dubai.jpg`
→ Dubai destination card

`assets/images/destinations/maldives.jpg`
→ Maldives destination card

`assets/images/destinations/singapore.jpg`
→ Singapore destination card

`assets/images/destinations/goa.jpg`
→ Goa destination card

`assets/images/destinations/kashmir.jpg`
→ Kashmir destination card

`assets/images/destinations/kerala.jpg`
→ Kerala destination card

`assets/images/destinations/manali.jpg`
→ Manali destination card

`assets/images/destinations/rajasthan.jpg`
→ Rajasthan destination card

`assets/images/services/flight.jpg`
→ Flight booking service card

`assets/images/services/hotel.jpg`
→ Hotel booking service card

`assets/images/services/bus.jpg`
→ Bus booking service card

`assets/images/services/train.jpg`
→ Train booking service card

`assets/images/packages/dubai.jpg`
→ Dubai Package card and modal

`assets/images/packages/maldives.jpg`
→ Maldives Package card and modal

`assets/images/packages/kashmir.jpg`
→ Kashmir Package card and modal

`assets/images/gallery-01.jpg` to `gallery-06.jpg`
→ Gallery masonry grid images

*Note: The system has built-in fallbacks (using Unsplash placeholders) if specific local images fail to load.*
