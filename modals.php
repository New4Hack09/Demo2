<!-- Modals Partial -->
<!-- Flight Booking Modal -->
<div id="flightFormModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Flight Booking</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="flightForm" onsubmit="handleFormSubmit(event, 'flight')">
                <div class="form-row">
                    <div class="form-group">
                        <label>Trip Type *</label>
                        <select name="tripType" required onchange="toggleReturnDate(this, 'flightReturnDate')">
                            <option value="One Way">One Way</option>
                            <option value="Round Trip">Round Trip</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>From *</label>
                        <input type="text" name="from" required>
                    </div>
                    <div class="form-group">
                        <label>To *</label>
                        <input type="text" name="to" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Departure Date *</label><input type="date" name="departureDate" required></div>
                    <div class="form-group" id="flightReturnDate" style="display:none;"><label>Return Date *</label><input type="date" name="returnDate"></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Adults *</label><input type="number" name="adults" min="1" value="1" required></div>
                    <div class="form-group"><label>Children</label><input type="number" name="children" min="0" value="0"></div>
                </div>
                <h4 class="form-section-title">Contact</h4>
                <div class="form-row">
                    <div class="form-group"><label>Name *</label><input type="text" name="name" required></div>
                    <div class="form-group"><label>WhatsApp *</label><input type="tel" name="whatsapp" required pattern="[0-9]{10}"></div>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Hotel Booking Modal -->
<div id="hotelFormModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Hotel Booking</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="hotelForm" onsubmit="handleFormSubmit(event, 'hotel')">
                <div class="form-group"><label>Destination *</label><input type="text" name="destination" required></div>
                <div class="form-row">
                    <div class="form-group"><label>Check-in *</label><input type="date" name="checkIn" required></div>
                    <div class="form-group"><label>Check-out *</label><input type="date" name="checkOut" required></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Name *</label><input type="text" name="name" required></div>
                    <div class="form-group"><label>WhatsApp *</label><input type="tel" name="whatsapp" required pattern="[0-9]{10}"></div>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Trip Enquiry Modal -->
<div id="enquiryFormModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Plan Your Trip</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="enquiryForm" onsubmit="handleFormSubmit(event, 'enquiry')">
                <div class="form-row">
                    <div class="form-group"><label>Starting City *</label><input type="text" name="from" required></div>
                    <div class="form-group"><label>Destination *</label><input type="text" name="destination" required></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Name *</label><input type="text" name="name" required></div>
                    <div class="form-group"><label>WhatsApp *</label><input type="tel" name="whatsapp" required pattern="[0-9]{10}"></div>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Package Modal -->
<div id="packageFormModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Book Package</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="packageForm" onsubmit="handleFormSubmit(event, 'package')">
                <input type="hidden" name="packageName" id="pkgFormName">
                <input type="hidden" name="packageId" id="pkgFormId">
                <div class="form-group"><label>Travel Date *</label><input type="date" name="travelDate" required></div>
                <div class="form-row">
                    <div class="form-group"><label>Name *</label><input type="text" name="name" required></div>
                    <div class="form-group"><label>WhatsApp *</label><input type="tel" name="whatsapp" required pattern="[0-9]{10}"></div>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Package Details Modal -->
<div id="packageDetailModal" class="modal full-screen-modal">
    <div class="modal-content">
        <button class="close-modal floating-close"><i class="fa-solid fa-xmark"></i></button>
        <div id="packageDetailContent"></div>
    </div>
</div>

<!-- Summary Modal -->
<div id="summaryModal" class="modal">
    <div class="modal-content summary-content">
        <div class="modal-header">
            <h3>Trip Summary</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <div class="summary-card" id="summaryCardContent"></div>
            <div class="summary-actions">
                <button class="btn btn-outline" onclick="closeSummaryAndEdit()">Edit Details</button>
                <button class="btn btn-whatsapp" id="confirmWhatsAppBtn"><i class="fa-brands fa-whatsapp"></i> Confirm & Continue</button>
            </div>
        </div>
    </div>
</div>

<div id="toast" class="toast"></div>
