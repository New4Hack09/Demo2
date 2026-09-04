const businessInfo = {
    name: "AR Travels",
    phone: "+91 88660 22341",
    whatsapp: "918866022341",
    email: "info@artravels.com",
    address: "New Delhi, India",
    socials: {
        instagram: "#",
        facebook: "#",
        youtube: "#"
    },
    stats: {
        travellers: "500+",
        destinations: "50+",
        packages: "100+",
        support: "24/7"
    }
};

const destinations = [
    {
        id: "dubai",
        name: "Dubai",
        image: "assets/images/destinations/dubai.jpg",
        description: "Experience the luxury, shopping, and modern architecture of Dubai.",
        price: "₹35,000",
        category: "International"
    },
    {
        id: "maldives",
        name: "Maldives",
        image: "assets/images/destinations/maldives.jpg",
        description: "Relax in the crystal clear waters and white sandy beaches of the Maldives.",
        price: "₹55,000",
        category: "Beach"
    },
    {
        id: "singapore",
        name: "Singapore",
        image: "assets/images/destinations/singapore.jpg",
        description: "Explore the vibrant city-state known for its cleanliness and attractions.",
        price: "₹42,000",
        category: "International"
    },
    {
        id: "goa",
        name: "Goa",
        image: "assets/images/destinations/goa.jpg",
        description: "Enjoy the beautiful beaches, nightlife, and heritage of Goa.",
        price: "₹15,000",
        category: "Beach"
    },
    {
        id: "kashmir",
        name: "Kashmir",
        image: "assets/images/destinations/kashmir.jpg",
        description: "Discover the breathtaking valleys and serene lakes of Kashmir.",
        price: "₹25,000",
        category: "Mountains"
    },
    {
        id: "kerala",
        name: "Kerala",
        image: "assets/images/destinations/kerala.jpg",
        description: "Experience the tranquil backwaters and lush greenery of God's Own Country.",
        price: "₹22,000",
        category: "Domestic"
    },
    {
        id: "manali",
        name: "Manali",
        image: "assets/images/destinations/manali.jpg",
        description: "Adventure and peace await in the snowy peaks of Manali.",
        price: "₹18,000",
        category: "Mountains"
    },
    {
        id: "rajasthan",
        name: "Rajasthan",
        image: "assets/images/destinations/rajasthan.jpg",
        description: "Explore the royal palaces, forts, and desert culture of Rajasthan.",
        price: "₹20,000",
        category: "Domestic"
    }
];

const services = [
    {
        id: "flight",
        title: "Flight Booking",
        icon: "fa-plane",
        image: "assets/images/services/flight.jpg",
        description: "Find convenient flights for your next journey.",
        cta: "Book Your Flight",
        formId: "flightFormModal"
    },
    {
        id: "hotel",
        title: "Hotel Booking",
        icon: "fa-bed",
        image: "assets/images/services/hotel.jpg",
        description: "Choose comfortable stays at your destination.",
        cta: "Book Your Hotel",
        formId: "hotelFormModal"
    },
    {
        id: "bus",
        title: "Bus Booking",
        icon: "fa-bus",
        image: "assets/images/services/bus.jpg",
        description: "Travel comfortably with convenient bus options.",
        cta: "Book Your Bus",
        formId: "busFormModal"
    },
    {
        id: "train",
        title: "Train Booking",
        icon: "fa-train",
        image: "assets/images/services/train.jpg",
        description: "Plan your train journey with ease.",
        cta: "Book Your Train",
        formId: "trainFormModal"
    }
];

const packages = [
    {
        id: "dubai-escape",
        title: "Dubai Escape",
        destination: "Dubai",
        image: "assets/images/packages/dubai.jpg",
        duration: "5 Days / 4 Nights",
        price: "₹35,000",
        oldPrice: "₹42,000",
        discount: "15% OFF",
        highlights: ["Burj Khalifa", "Desert Safari", "Dhow Cruise"],
        itinerary: [
            { day: "Day 1", title: "Arrival", description: "Arrive at Dubai International Airport. Transfer to hotel." },
            { day: "Day 2", title: "City Tour & Burj Khalifa", description: "Half-day Dubai city tour followed by a visit to Burj Khalifa." },
            { day: "Day 3", title: "Desert Safari", description: "Evening desert safari with BBQ dinner and belly dance." },
            { day: "Day 4", title: "Dhow Cruise", description: "Enjoy a relaxing evening on a traditional Dhow Cruise with dinner." },
            { day: "Day 5", title: "Departure", description: "Transfer to airport for your onward journey." }
        ],
        inclusions: ["Hotel", "Airport Transfer", "Sightseeing", "Breakfast"],
        exclusions: ["Flights", "Visa", "Personal Expenses"]
    },
    {
        id: "maldives-retreat",
        title: "Maldives Retreat",
        destination: "Maldives",
        image: "assets/images/packages/maldives.jpg",
        duration: "4 Days / 3 Nights",
        price: "₹55,000",
        oldPrice: "₹65,000",
        discount: "15% OFF",
        highlights: ["Water Villa", "Snorkeling", "Spa"],
        itinerary: [
            { day: "Day 1", title: "Arrival", description: "Arrive at Male Airport. Speedboat transfer to resort." },
            { day: "Day 2", title: "Leisure & Water Sports", description: "Enjoy the beach, snorkeling, or relax at the spa." },
            { day: "Day 3", title: "Sunset Cruise", description: "Experience a magical sunset cruise in the evening." },
            { day: "Day 4", title: "Departure", description: "Transfer to Male Airport for your flight back home." }
        ],
        inclusions: ["Resort Stay", "Speedboat Transfer", "All Meals"],
        exclusions: ["Flights", "Water Sports Activities"]
    },
    {
        id: "kashmir-paradise",
        title: "Kashmir Paradise",
        destination: "Kashmir",
        image: "assets/images/packages/kashmir.jpg",
        duration: "6 Days / 5 Nights",
        price: "₹25,000",
        oldPrice: "₹30,000",
        discount: "16% OFF",
        highlights: ["Dal Lake", "Gulmarg", "Pahalgam"],
        itinerary: [
            { day: "Day 1", title: "Srinagar Arrival", description: "Arrive in Srinagar, transfer to Houseboat. Shikara ride." },
            { day: "Day 2", title: "Srinagar Local", description: "Visit Mughal Gardens, Shankaracharya Temple." },
            { day: "Day 3", title: "Gulmarg Excursion", description: "Full day trip to Gulmarg, enjoy Gondola ride." },
            { day: "Day 4", title: "Pahalgam Excursion", description: "Trip to Pahalgam, visit Betaab Valley." },
            { day: "Day 5", title: "Sonamarg Excursion", description: "Day trip to Sonamarg, the Meadow of Gold." },
            { day: "Day 6", title: "Departure", description: "Transfer to Srinagar airport." }
        ],
        inclusions: ["Hotel/Houseboat", "Transfers", "Breakfast & Dinner", "Shikara Ride"],
        exclusions: ["Flights", "Gondola Tickets", "Lunch"]
    }
];

const reviews = [
    {
        id: 1,
        name: "Rahul Sharma",
        photo: "https://i.pravatar.cc/150?img=11",
        rating: 5,
        review: "AR Travels made our Dubai trip incredibly smooth. Everything was perfectly arranged, from flights to the desert safari. Highly recommended!",
        destination: "Dubai"
    },
    {
        id: 2,
        name: "Priya Patel",
        photo: "https://i.pravatar.cc/150?img=5",
        rating: 5,
        review: "Booked our honeymoon to Maldives through them. The resort selection was excellent and the support team was always available on WhatsApp.",
        destination: "Maldives"
    },
    {
        id: 3,
        name: "Amit Kumar",
        photo: "https://i.pravatar.cc/150?img=12",
        rating: 4,
        review: "Great service for domestic flight bookings. Quick responses and good prices compared to other platforms.",
        destination: "Goa"
    }
];

const faqs = [
    {
        question: "How do I book a flight?",
        answer: "Simply navigate to our 'Services' section, select 'Flight Booking', fill in your details in the form, and click 'Continue to WhatsApp'. We will receive your request and share the best available options instantly."
    },
    {
        question: "Can you arrange hotel bookings?",
        answer: "Yes! We offer hotel bookings across all budgets. Use the Hotel Booking form to share your preferences, and we'll send you curated options."
    },
    {
        question: "Do you provide complete holiday packages?",
        answer: "Absolutely. We offer both pre-designed travel packages and customized itineraries tailored to your preferences."
    },
    {
        question: "Can I request a customized itinerary?",
        answer: "Yes, you can click on 'Plan Your Trip' and share your specific requirements. Our travel experts will craft a personalized itinerary just for you."
    },
    {
        question: "How do I contact AR Travels?",
        answer: "You can reach us instantly via WhatsApp at +91 88660 22341, call us, or use the contact form on our website."
    },
    {
        question: "Can you arrange domestic and international travel?",
        answer: "Yes, we handle both domestic trips within India and international travel arrangements globally."
    }
];
