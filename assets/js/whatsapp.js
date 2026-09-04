// WhatsApp Message Generators

function encodeForWhatsApp(text) {
    return encodeURIComponent(text);
}

function openWhatsApp(message) {
    const waNumber = businessInfo.whatsapp;
    const url = `https://wa.me/${waNumber}?text=${encodeForWhatsApp(message)}`;
    window.open(url, '_blank');
}

function generateFlightMessage(data) {
    let msg = `*AR TRAVELS — FLIGHT BOOKING REQUEST*\n\n`;

    msg += `*Customer Details*\n`;
    msg += `Name: ${data.name}\n`;
    msg += `Mobile: ${data.mobile}\n`;
    msg += `WhatsApp: ${data.whatsapp}\n`;
    if(data.email) msg += `Email: ${data.email}\n`;
    msg += `\n`;

    msg += `*Journey Details*\n`;
    msg += `Trip Type: ${data.tripType}\n`;
    msg += `From: ${data.from}\n`;
    msg += `To: ${data.to}\n`;
    msg += `Departure: ${data.departureDate}\n`;
    if (data.tripType === 'Round Trip') {
        msg += `Return: ${data.returnDate}\n`;
    }
    msg += `\n`;

    msg += `*Travellers*\n`;
    msg += `Adults: ${data.adults}\n`;
    msg += `Children: ${data.children}\n`;
    msg += `Infants: ${data.infants}\n`;
    msg += `\n`;

    msg += `*Preferences*\n`;
    msg += `Class: ${data.flightClass}\n`;
    if(data.specialFare !== 'None') msg += `Special Fare: ${data.specialFare}\n`;
    if(data.nonStop) msg += `Non-stop flights only: Yes\n`;

    if(data.requests) {
        msg += `\nSpecial Request: ${data.requests}\n`;
    }

    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generateHotelMessage(data) {
    let msg = `*AR TRAVELS — HOTEL BOOKING REQUEST*\n\n`;

    msg += `*Customer Details*\n`;
    msg += `Name: ${data.name}\n`;
    msg += `WhatsApp: ${data.whatsapp}\n`;
    msg += `\n`;

    msg += `*Booking Details*\n`;
    msg += `Destination: ${data.destination}\n`;
    msg += `Check-in: ${data.checkIn}\n`;
    msg += `Check-out: ${data.checkOut}\n`;
    msg += `Rooms: ${data.rooms}\n`;
    msg += `Adults: ${data.adults}\n`;
    msg += `Children: ${data.children}\n`;
    msg += `\n`;

    msg += `*Preferences*\n`;
    msg += `Hotel Type: ${data.hotelPreference}\n`;
    msg += `Meal Plan: ${data.mealPreference}\n`;

    if(data.requests) {
        msg += `\nSpecial Request: ${data.requests}\n`;
    }

    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generateBusMessage(data) {
    let msg = `*AR TRAVELS — BUS BOOKING REQUEST*\n\n`;

    msg += `*Customer Details*\n`;
    msg += `Name: ${data.name}\n`;
    msg += `WhatsApp: ${data.whatsapp}\n`;
    msg += `\n`;

    msg += `*Journey Details*\n`;
    msg += `From: ${data.from}\n`;
    msg += `To: ${data.to}\n`;
    msg += `Date: ${data.travelDate}\n`;
    msg += `Passengers: ${data.passengers}\n`;
    msg += `\n`;

    msg += `*Preferences*\n`;
    msg += `Bus Type: ${data.busPreference}\n`;
    msg += `Preferred Time: ${data.time}\n`;

    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generateTrainMessage(data) {
    let msg = `*AR TRAVELS — TRAIN BOOKING REQUEST*\n\n`;

    msg += `*Customer Details*\n`;
    msg += `Name: ${data.name}\n`;
    msg += `WhatsApp: ${data.whatsapp}\n`;
    msg += `\n`;

    msg += `*Journey Details*\n`;
    msg += `Trip Type: ${data.tripType}\n`;
    msg += `From: ${data.from}\n`;
    msg += `To: ${data.to}\n`;
    msg += `Date: ${data.journeyDate}\n`;
    if (data.tripType === 'Round Trip') {
        msg += `Return: ${data.returnDate}\n`;
    }
    msg += `\n`;

    msg += `*Travellers*\n`;
    msg += `Adults: ${data.adults}\n`;
    msg += `Children: ${data.children}\n`;
    msg += `\n`;

    msg += `*Preferences*\n`;
    msg += `Class: ${data.trainClass}\n`;
    if(data.lowerBerth) msg += `Preference: Lower Berth Requested\n`;

    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generatePackageMessage(data) {
    let msg = `*AR TRAVELS — PACKAGE BOOKING REQUEST*\n\n`;

    msg += `*Package Details*\n`;
    msg += `Package: ${data.packageName}\n`;
    msg += `Travel Date: ${data.travelDate}\n`;
    msg += `Travellers: ${data.adults} Adults`;
    if(data.children > 0) msg += `, ${data.children} Children`;
    msg += `\n\n`;

    msg += `*Customer Details*\n`;
    msg += `Name: ${data.name}\n`;
    msg += `WhatsApp: ${data.whatsapp}\n`;

    if(data.requests) {
        msg += `\nSpecial Request: ${data.requests}\n`;
    }

    msg += `\nPlease share availability and final pricing.\nThank you.`;
    return msg;
}

function generateEnquiryMessage(data) {
    let msg = `*AR TRAVELS — TRIP ENQUIRY*\n\n`;

    msg += `*Customer Details*\n`;
    msg += `Name: ${data.name}\n`;
    msg += `WhatsApp: ${data.whatsapp}\n`;
    msg += `\n`;

    msg += `*Trip Details*\n`;
    msg += `From: ${data.from}\n`;
    msg += `Destination: ${data.destination}\n`;
    if(data.travelDate) msg += `Planned Date: ${data.travelDate}\n`;
    msg += `Duration: ${data.duration} Days\n`;
    msg += `Travellers: ${data.travellers}\n`;
    msg += `Budget: ${data.budget}\n`;

    msg += `\nPlease assist me in planning this trip.\nThank you.`;
    return msg;
}
