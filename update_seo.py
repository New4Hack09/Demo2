import re

with open('index.html', 'r') as f:
    content = f.read()

# Add SEO tags in <head>
seo_tags = """    <!-- SEO & Meta Tags -->
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
      },
      "sameAs": [
        "https://www.facebook.com/artravels",
        "https://www.instagram.com/artravels"
      ]
    }
    </script>"""

# Replace the existing description tag with the full SEO block
content = re.sub(r'<meta name="description" content="[^"]*">', seo_tags, content)

with open('index.html', 'w') as f:
    f.write(content)
print("SEO updated")
