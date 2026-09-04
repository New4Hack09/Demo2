// Form Handling and Modals

let currentFormData = null;
let currentFormType = '';

// Modal Controls
const modals = document.querySelectorAll('.modal');
const closeButtons = document.querySelectorAll('.close-modal');

closeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const modal = btn.closest('.modal');
        if(modal) modal.classList.remove('active');
    });
});

window.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal')) {
        e.target.classList.remove('active');
    }
});

function openModal(modalId) {
    // Close any open modals first
    modals.forEach(m => m.classList.remove('active'));

    const modal = document.getElementById(modalId);
    if(modal) modal.classList.add('active');
}

function openServiceForm(type) {
    openModal(`${type}FormModal`);
}

function openEnquiryForm() {
    openModal('enquiryFormModal');
}

function openPackageForm(packageId) {
    const pkg = packages.find(p => p.id === packageId);
    if(pkg) {
        document.getElementById('pkgFormName').value = pkg.title;
        document.getElementById('pkgFormId').value = pkg.id;
        document.getElementById('pkgFormTitle').innerText = pkg.title;
        document.getElementById('pkgFormDuration').innerText = pkg.duration;
        openModal('packageFormModal');
    }
}

// Form Helpers
function toggleReturnDate(selectElement, targetId) {
    const target = document.getElementById(targetId);
    if(selectElement.value === 'Round Trip') {
        target.style.display = 'block';
        target.querySelector('input').setAttribute('required', 'true');
    } else {
        target.style.display = 'none';
        target.querySelector('input').removeAttribute('required');
    }
}

// Date constraints
function setDateConstraints() {
    const today = new Date().toISOString().split('T')[0];
    const dateInputs = document.querySelectorAll('input[type="date"]');

    dateInputs.forEach(input => {
        if(input.name !== 'returnDate' && input.name !== 'checkOut') {
            input.setAttribute('min', today);
        }
    });

    // Specific logic for departure/return and checkin/checkout
    const flightDep = document.querySelector('#flightForm input[name="departureDate"]');
    const flightRet = document.querySelector('#flightForm input[name="returnDate"]');
    if(flightDep && flightRet) {
        flightDep.addEventListener('change', () => flightRet.setAttribute('min', flightDep.value));
    }

    const hotelIn = document.querySelector('#hotelForm input[name="checkIn"]');
    const hotelOut = document.querySelector('#hotelForm input[name="checkOut"]');
    if(hotelIn && hotelOut) {
        hotelIn.addEventListener('change', () => {
            const nextDay = new Date(hotelIn.value);
            nextDay.setDate(nextDay.getDate() + 1);
            hotelOut.setAttribute('min', nextDay.toISOString().split('T')[0]);
            if(!hotelOut.value || hotelOut.value <= hotelIn.value) {
                hotelOut.value = nextDay.toISOString().split('T')[0];
            }
        });
    }

    const trainDep = document.querySelector('#trainForm input[name="journeyDate"]');
    const trainRet = document.querySelector('#trainForm input[name="returnDate"]');
    if(trainDep && trainRet) {
        trainDep.addEventListener('change', () => trainRet.setAttribute('min', trainDep.value));
    }
}

// Form Submission & Summary
function handleFormSubmit(e, type) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    // Handle checkboxes
    if(type === 'flight') data.nonStop = form.querySelector('input[name="nonStop"]').checked;
    if(type === 'train') data.lowerBerth = form.querySelector('input[name="lowerBerth"]').checked;

    currentFormData = data;
    currentFormType = type;

    showSummary(data, type);
}

function showSummary(data, type) {
    const summaryContainer = document.getElementById('summaryCardContent');
    let html = '';

    if (type === 'flight') {
        html = `
            <div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Flight Booking</span></div>
            <div class="summary-row"><span class="summary-label">Journey</span><span class="summary-value">${data.from} → ${data.to}</span></div>
            <div class="summary-row"><span class="summary-label">Type</span><span class="summary-value">${data.tripType}</span></div>
            <div class="summary-row"><span class="summary-label">Departure</span><span class="summary-value">${data.departureDate}</span></div>
            ${data.tripType === 'Round Trip' ? `<div class="summary-row"><span class="summary-label">Return</span><span class="summary-value">${data.returnDate}</span></div>` : ''}
            <div class="summary-row"><span class="summary-label">Travellers</span><span class="summary-value">${data.adults} Adults ${data.children > 0 ? ', ' + data.children + ' Child' : ''}</span></div>
            <div class="summary-row"><span class="summary-label">Passenger</span><span class="summary-value">${data.name}</span></div>
        `;
    } else if (type === 'hotel') {
        html = `
            <div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Hotel Booking</span></div>
            <div class="summary-row"><span class="summary-label">Destination</span><span class="summary-value">${data.destination}</span></div>
            <div class="summary-row"><span class="summary-label">Dates</span><span class="summary-value">${data.checkIn} to ${data.checkOut}</span></div>
            <div class="summary-row"><span class="summary-label">Rooms/Guests</span><span class="summary-value">${data.rooms} Room(s), ${data.adults} Adults</span></div>
            <div class="summary-row"><span class="summary-label">Preference</span><span class="summary-value">${data.hotelPreference}</span></div>
            <div class="summary-row"><span class="summary-label">Guest</span><span class="summary-value">${data.name}</span></div>
        `;
    } else if (type === 'bus') {
        html = `
            <div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Bus Booking</span></div>
            <div class="summary-row"><span class="summary-label">Route</span><span class="summary-value">${data.from} → ${data.to}</span></div>
            <div class="summary-row"><span class="summary-label">Date</span><span class="summary-value">${data.travelDate}</span></div>
            <div class="summary-row"><span class="summary-label">Preference</span><span class="summary-value">${data.busPreference}</span></div>
            <div class="summary-row"><span class="summary-label">Passenger</span><span class="summary-value">${data.name}</span></div>
        `;
    } else if (type === 'train') {
         html = `
            <div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Train Booking</span></div>
            <div class="summary-row"><span class="summary-label">Route</span><span class="summary-value">${data.from} → ${data.to}</span></div>
            <div class="summary-row"><span class="summary-label">Date</span><span class="summary-value">${data.journeyDate}</span></div>
            <div class="summary-row"><span class="summary-label">Class</span><span class="summary-value">${data.trainClass}</span></div>
            <div class="summary-row"><span class="summary-label">Passenger</span><span class="summary-value">${data.name}</span></div>
        `;
    } else if (type === 'package') {
        html = `
            <div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Package Booking</span></div>
            <div class="summary-row"><span class="summary-label">Package</span><span class="summary-value">${data.packageName}</span></div>
            <div class="summary-row"><span class="summary-label">Date</span><span class="summary-value">${data.travelDate}</span></div>
            <div class="summary-row"><span class="summary-label">Travellers</span><span class="summary-value">${data.adults} Adults ${data.children > 0 ? ', ' + data.children + ' Child' : ''}</span></div>
            <div class="summary-row"><span class="summary-label">Guest</span><span class="summary-value">${data.name}</span></div>
        `;
    } else if (type === 'enquiry') {
        html = `
            <div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Trip Enquiry</span></div>
            <div class="summary-row"><span class="summary-label">Route</span><span class="summary-value">${data.from} → ${data.destination}</span></div>
            <div class="summary-row"><span class="summary-label">Travellers</span><span class="summary-value">${data.travellers}</span></div>
            <div class="summary-row"><span class="summary-label">Budget</span><span class="summary-value">${data.budget}</span></div>
            <div class="summary-row"><span class="summary-label">Guest</span><span class="summary-value">${data.name}</span></div>
        `;
    }

    summaryContainer.innerHTML = html;

    // Hide original form modal and show summary
    document.getElementById(`${type}FormModal`).classList.remove('active');
    openModal('summaryModal');
}

function closeSummaryAndEdit() {
    document.getElementById('summaryModal').classList.remove('active');
    if (currentFormType) {
        openModal(`${currentFormType}FormModal`);
    }
}

document.getElementById('confirmWhatsAppBtn').addEventListener('click', () => {
    if (!currentFormData || !currentFormType) return;

    let message = '';
    switch(currentFormType) {
        case 'flight': message = generateFlightMessage(currentFormData); break;
        case 'hotel': message = generateHotelMessage(currentFormData); break;
        case 'bus': message = generateBusMessage(currentFormData); break;
        case 'train': message = generateTrainMessage(currentFormData); break;
        case 'package': message = generatePackageMessage(currentFormData); break;
        case 'enquiry': message = generateEnquiryMessage(currentFormData); break;
    }

    document.getElementById('summaryModal').classList.remove('active');
    showToast("Opening WhatsApp...");

    setTimeout(() => {
        openWhatsApp(message);
    }, 1000);
});

function showToast(msg) {
    const toast = document.getElementById('toast');
    toast.innerText = msg;
    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

// Initialize
document.addEventListener('DOMContentLoaded', setDateConstraints);
