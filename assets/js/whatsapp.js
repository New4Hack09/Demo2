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
    msg += `*Customer Details*\nName: ${data.name}\nMobile: ${data.mobile}\nWhatsApp: ${data.whatsapp}\n`;
    if(data.email) msg += `Email: ${data.email}\n`;
    msg += `\n*Journey Details*\nTrip Type: ${data.tripType}\nFrom: ${data.from}\nTo: ${data.to}\nDeparture: ${data.departureDate}\n`;
    if (data.tripType === 'Round Trip') msg += `Return: ${data.returnDate}\n`;
    msg += `\n*Travellers*\nAdults: ${data.adults}\nChildren: ${data.children}\nInfants: ${data.infants}\n\n*Preferences*\nClass: ${data.flightClass}\n`;
    if(data.specialFare !== 'None') msg += `Special Fare: ${data.specialFare}\n`;
    if(data.nonStop) msg += `Non-stop flights only: Yes\n`;
    if(data.requests) msg += `\nSpecial Request: ${data.requests}\n`;
    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generateHotelMessage(data) {
    let msg = `*AR TRAVELS — HOTEL BOOKING REQUEST*\n\n*Customer Details*\nName: ${data.name}\nWhatsApp: ${data.whatsapp}\n\n*Booking Details*\nDestination: ${data.destination}\nCheck-in: ${data.checkIn}\nCheck-out: ${data.checkOut}\nRooms: ${data.rooms}\nAdults: ${data.adults}\nChildren: ${data.children}\n\n*Preferences*\nHotel Type: ${data.hotelPreference}\nMeal Plan: ${data.mealPreference}\n`;
    if(data.requests) msg += `\nSpecial Request: ${data.requests}\n`;
    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generateBusMessage(data) {
    let msg = `*AR TRAVELS — BUS BOOKING REQUEST*\n\n*Customer Details*\nName: ${data.name}\nWhatsApp: ${data.whatsapp}\n\n*Journey Details*\nFrom: ${data.from}\nTo: ${data.to}\nDate: ${data.travelDate}\nPassengers: ${data.passengers}\n\n*Preferences*\nBus Type: ${data.busPreference}\nPreferred Time: ${data.time}\n`;
    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generateTrainMessage(data) {
    let msg = `*AR TRAVELS — TRAIN BOOKING REQUEST*\n\n*Customer Details*\nName: ${data.name}\nWhatsApp: ${data.whatsapp}\n\n*Journey Details*\nTrip Type: ${data.tripType}\nFrom: ${data.from}\nTo: ${data.to}\nDate: ${data.journeyDate}\n`;
    if (data.tripType === 'Round Trip') msg += `Return: ${data.returnDate}\n`;
    msg += `\n*Travellers*\nAdults: ${data.adults}\nChildren: ${data.children}\n\n*Preferences*\nClass: ${data.trainClass}\n`;
    if(data.lowerBerth) msg += `Preference: Lower Berth Requested\n`;
    msg += `\nPlease assist with available options and pricing.\nThank you.`;
    return msg;
}

function generatePackageMessage(data) {
    let msg = `*AR TRAVELS — PACKAGE BOOKING REQUEST*\n\n*Package Details*\nPackage: ${data.packageName}\nTravel Date: ${data.travelDate}\nTravellers: ${data.adults} Adults`;
    if(data.children > 0) msg += `, ${data.children} Children`;
    msg += `\n\n*Customer Details*\nName: ${data.name}\nWhatsApp: ${data.whatsapp}\n`;
    if(data.requests) msg += `\nSpecial Request: ${data.requests}\n`;
    msg += `\nPlease share availability and final pricing.\nThank you.`;
    return msg;
}

function generateEnquiryMessage(data) {
    let msg = `*AR TRAVELS — TRIP ENQUIRY*\n\n*Customer Details*\nName: ${data.name}\nWhatsApp: ${data.whatsapp}\n\n*Trip Details*\nFrom: ${data.from}\nDestination: ${data.destination}\n`;
    if(data.travelDate) msg += `Planned Date: ${data.travelDate}\n`;
    msg += `Duration: ${data.duration} Days\nTravellers: ${data.travellers}\nBudget: ${data.budget}\n`;
    msg += `\nPlease assist me in planning this trip.\nThank you.`;
    return msg;
}
