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
                    <div class="form-group">
                        <label>Class</label>
                        <select name="flightClass">
                            <option value="Economy">Economy</option>
                            <option value="Premium Economy">Premium Economy</option>
                            <option value="Business">Business</option>
                            <option value="First">First</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>From (City/Airport) *</label>
                        <input type="text" name="from" required placeholder="e.g. Delhi (DEL)">
                    </div>
                    <div class="form-group">
                        <label>To (City/Airport) *</label>
                        <input type="text" name="to" required placeholder="e.g. Dubai (DXB)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Departure Date *</label>
                        <input type="date" name="departureDate" required min="">
                    </div>
                    <div class="form-group" id="flightReturnDate" style="display: none;">
                        <label>Return Date *</label>
                        <input type="date" name="returnDate">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Adults (12+) *</label>
                        <input type="number" name="adults" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <label>Children (2-11)</label>
                        <input type="number" name="children" min="0" value="0">
                    </div>
                    <div class="form-group">
                        <label>Infants (0-2)</label>
                        <input type="number" name="infants" min="0" value="0">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Special Fare (Optional)</label>
                        <select name="specialFare">
                            <option value="None">None</option>
                            <option value="Student">Student</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="Defence">Defence</option>
                        </select>
                    </div>
                    <div class="form-group checkbox-group">
                        <label><input type="checkbox" name="nonStop"> Non-stop flights only</label>
                    </div>
                </div>
                <h4 class="form-section-title">Contact Details</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Passenger Name *</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number *</label>
                        <input type="tel" name="mobile" required pattern="[0-9]{10}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>WhatsApp Number *</label>
                        <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label>Special Requests</label>
                    <textarea name="requests" rows="2" placeholder="e.g. Window seat preferred..."></textarea>
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
                <div class="form-group">
                    <label>Destination / Nearby *</label>
                    <input type="text" name="destination" required placeholder="City or area">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Check-in Date *</label>
                        <input type="date" name="checkIn" required min="">
                    </div>
                    <div class="form-group">
                        <label>Check-out Date *</label>
                        <input type="date" name="checkOut" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Rooms *</label>
                        <input type="number" name="rooms" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <label>Adults *</label>
                        <input type="number" name="adults" min="1" value="2" required>
                    </div>
                    <div class="form-group">
                        <label>Children</label>
                        <input type="number" name="children" min="0" value="0">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Hotel Preference *</label>
                        <select name="hotelPreference" required>
                            <option value="Standard">Standard</option>
                            <option value="Budget">Budget</option>
                            <option value="Premium">Premium</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Meal Preference</label>
                        <select name="mealPreference">
                            <option value="Room Only">Room Only</option>
                            <option value="Breakfast Included">Breakfast Included</option>
                            <option value="Half Board (Breakfast + Dinner)">Half Board</option>
                            <option value="Full Board">Full Board</option>
                        </select>
                    </div>
                </div>
                <h4 class="form-section-title">Contact Details</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Guest Name *</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>WhatsApp Number *</label>
                        <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Special Requests (Optional)</label>
                    <textarea name="requests" rows="2" placeholder="Specific hotel name, twin beds, etc."></textarea>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Bus Booking Modal -->
<div id="busFormModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Bus Booking</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="busForm" onsubmit="handleFormSubmit(event, 'bus')">
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
                    <div class="form-group">
                        <label>Date of Travel *</label>
                        <input type="date" name="travelDate" required min="">
                    </div>
                    <div class="form-group">
                        <label>Bus Preference *</label>
                        <select name="busPreference" required>
                            <option value="AC Sleeper">AC Sleeper</option>
                            <option value="AC Seater">AC Seater</option>
                            <option value="Non-AC Sleeper">Non-AC Sleeper</option>
                            <option value="Non-AC Seater">Non-AC Seater</option>
                            <option value="Volvo / Premium">Volvo / Premium</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Total Passengers *</label>
                        <input type="number" name="passengers" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <label>Preferred Time</label>
                        <select name="time">
                            <option value="Any">Any</option>
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                            <option value="Evening/Night">Evening/Night</option>
                        </select>
                    </div>
                </div>
                <h4 class="form-section-title">Contact Details</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Passenger Name *</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>WhatsApp Number *</label>
                        <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Train Booking Modal -->
<div id="trainFormModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Train Booking</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="trainForm" onsubmit="handleFormSubmit(event, 'train')">
                <div class="form-row">
                    <div class="form-group">
                        <label>Trip Type *</label>
                        <select name="tripType" required onchange="toggleReturnDate(this, 'trainReturnDate')">
                            <option value="One Way">One Way</option>
                            <option value="Round Trip">Round Trip</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Train Class *</label>
                        <select name="trainClass" required>
                            <option value="All">All Classes</option>
                            <option value="3A">3A (Third AC)</option>
                            <option value="2A">2A (Second AC)</option>
                            <option value="1A">1A (First AC)</option>
                            <option value="SL">Sleeper (SL)</option>
                            <option value="CC">AC Chair Car (CC)</option>
                            <option value="2S">Second Seater (2S)</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>From (Station) *</label>
                        <input type="text" name="from" required>
                    </div>
                    <div class="form-group">
                        <label>To (Station) *</label>
                        <input type="text" name="to" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Journey Date *</label>
                        <input type="date" name="journeyDate" required min="">
                    </div>
                    <div class="form-group" id="trainReturnDate" style="display: none;">
                        <label>Return Date *</label>
                        <input type="date" name="returnDate">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Adults *</label>
                        <input type="number" name="adults" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <label>Children (0-11)</label>
                        <input type="number" name="children" min="0" value="0">
                    </div>
                </div>
                <h4 class="form-section-title">Contact Details</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Primary Passenger *</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>WhatsApp Number *</label>
                        <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                    </div>
                </div>
                <div class="form-group checkbox-group">
                    <label><input type="checkbox" name="lowerBerth"> Lower Berth Preference (Subject to availability)</label>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Package Enquiry Modal -->
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
                <div class="selected-package-summary">
                    <h4 id="pkgFormTitle">Package Name</h4>
                    <p id="pkgFormDuration">Duration</p>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Travel Date *</label>
                        <input type="date" name="travelDate" required min="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Adults *</label>
                        <input type="number" name="adults" min="1" value="2" required>
                    </div>
                    <div class="form-group">
                        <label>Children</label>
                        <input type="number" name="children" min="0" value="0">
                    </div>
                </div>
                <h4 class="form-section-title">Contact Details</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Your Name *</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>WhatsApp Number *</label>
                        <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Special Requests / Customization (Optional)</label>
                    <textarea name="requests" rows="2" placeholder="Any specific requirements?"></textarea>
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
                    <div class="form-group">
                        <label>Starting City *</label>
                        <input type="text" name="from" required>
                    </div>
                    <div class="form-group">
                        <label>Destination (City/Country) *</label>
                        <input type="text" name="destination" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Planned Travel Date</label>
                        <input type="date" name="travelDate" min="">
                    </div>
                    <div class="form-group">
                        <label>Duration (Days)</label>
                        <input type="number" name="duration" min="1" value="5">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Total Travellers *</label>
                        <input type="number" name="travellers" min="1" value="2" required>
                    </div>
                    <div class="form-group">
                        <label>Approx Budget (Per Person)</label>
                        <select name="budget">
                            <option value="Not Sure">Not Sure</option>
                            <option value="Economy (Under ₹20k)">Economy</option>
                            <option value="Standard (₹20k - ₹50k)">Standard</option>
                            <option value="Premium (₹50k - ₹1L)">Premium</option>
                            <option value="Luxury (₹1L+)">Luxury</option>
                        </select>
                    </div>
                </div>
                <h4 class="form-section-title">Contact Details</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Your Name *</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>WhatsApp Number *</label>
                        <input type="tel" name="whatsapp" required pattern="[0-9]{10}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary full-width">Review Details</button>
            </form>
        </div>
    </div>
</div>

<!-- Package Detail Modal -->
<div id="packageDetailModal" class="modal full-screen-modal">
    <div class="modal-content">
        <button class="close-modal floating-close"><i class="fa-solid fa-xmark"></i></button>
        <div id="packageDetailContent">
            <!-- Injected via JS -->
        </div>
    </div>
</div>

<!-- Booking Summary Modal -->
<div id="summaryModal" class="modal">
    <div class="modal-content summary-content">
        <div class="modal-header">
            <h3>Trip Summary</h3>
            <button class="close-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <div class="summary-card" id="summaryCardContent">
                <!-- Injected via JS -->
            </div>
            <div class="summary-actions">
                <button class="btn btn-outline" onclick="closeSummaryAndEdit()">Edit Details</button>
                <button class="btn btn-whatsapp" id="confirmWhatsAppBtn"><i class="fa-brands fa-whatsapp"></i> Confirm & Continue</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="toast"></div>
