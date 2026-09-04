let currentFormData = null;
let currentFormType = '';

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
    modals.forEach(m => m.classList.remove('active'));
    const modal = document.getElementById(modalId);
    if(modal) modal.classList.add('active');
}

function openServiceForm(type) { openModal(`${type}FormModal`); }
function openEnquiryForm() { openModal('enquiryFormModal'); }

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

function setDateConstraints() {
    const today = new Date().toISOString().split('T')[0];
    const dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(input => {
        if(input.name !== 'returnDate' && input.name !== 'checkOut') input.setAttribute('min', today);
    });
}

function handleFormSubmit(e, type) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

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
        html = `<div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Flight Booking</span></div>
            <div class="summary-row"><span class="summary-label">Journey</span><span class="summary-value">${data.from} → ${data.to}</span></div>
            <div class="summary-row"><span class="summary-label">Passenger</span><span class="summary-value">${data.name}</span></div>`;
    } else if (type === 'hotel') {
        html = `<div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Hotel Booking</span></div>
            <div class="summary-row"><span class="summary-label">Destination</span><span class="summary-value">${data.destination}</span></div>
            <div class="summary-row"><span class="summary-label">Guest</span><span class="summary-value">${data.name}</span></div>`;
    } else if (type === 'bus') {
        html = `<div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Bus Booking</span></div>
            <div class="summary-row"><span class="summary-label">Route</span><span class="summary-value">${data.from} → ${data.to}</span></div>
            <div class="summary-row"><span class="summary-label">Passenger</span><span class="summary-value">${data.name}</span></div>`;
    } else if (type === 'train') {
         html = `<div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Train Booking</span></div>
            <div class="summary-row"><span class="summary-label">Route</span><span class="summary-value">${data.from} → ${data.to}</span></div>
            <div class="summary-row"><span class="summary-label">Passenger</span><span class="summary-value">${data.name}</span></div>`;
    } else if (type === 'package') {
        html = `<div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Package Booking</span></div>
            <div class="summary-row"><span class="summary-label">Package</span><span class="summary-value">${data.packageName}</span></div>
            <div class="summary-row"><span class="summary-label">Guest</span><span class="summary-value">${data.name}</span></div>`;
    } else if (type === 'enquiry') {
        html = `<div class="summary-row"><span class="summary-label">Service</span><span class="summary-value">Trip Enquiry</span></div>
            <div class="summary-row"><span class="summary-label">Route</span><span class="summary-value">${data.from} → ${data.destination}</span></div>
            <div class="summary-row"><span class="summary-label">Guest</span><span class="summary-value">${data.name}</span></div>`;
    }

    summaryContainer.innerHTML = html;
    document.getElementById(`${type}FormModal`).classList.remove('active');
    openModal('summaryModal');
}

function closeSummaryAndEdit() {
    document.getElementById('summaryModal').classList.remove('active');
    if (currentFormType) openModal(`${currentFormType}FormModal`);
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
    setTimeout(() => { openWhatsApp(message); }, 1000);
});

function showToast(msg) {
    const toast = document.getElementById('toast');
    toast.innerText = msg;
    toast.classList.add('show');
    setTimeout(() => { toast.classList.remove('show'); }, 3000);
}

document.addEventListener('DOMContentLoaded', setDateConstraints);
