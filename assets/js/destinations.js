function renderDestinations(filter = 'All') {
    const grid = document.getElementById('destinationsGrid');
    if(!grid) return;
    grid.innerHTML = '';
    const filteredDestinations = filter === 'All' ? destinations : destinations.filter(d => d.category === filter);
    filteredDestinations.forEach(dest => {
        const card = document.createElement('div');
        card.className = 'dest-card';
        card.innerHTML = `<div class="dest-img"><img src="${dest.image}" alt="${dest.name}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&q=80&w=400'"><div class="dest-overlay"><h3>${dest.name}</h3></div></div><div class="dest-info"><p>${dest.description}</p><div class="dest-price">Starting from <span>${dest.price}</span></div></div>`;
        card.addEventListener('click', () => {
            const enquiryForm = document.getElementById('enquiryForm');
            if(enquiryForm) {
                enquiryForm.querySelector('input[name="destination"]').value = dest.name;
                openEnquiryForm();
            }
        });
        grid.appendChild(card);
    });
}
document.addEventListener('DOMContentLoaded', () => {
    renderDestinations();
    const filters = document.querySelectorAll('.filter-btn');
    filters.forEach(btn => {
        btn.addEventListener('click', (e) => {
            filters.forEach(f => f.classList.remove('active'));
            e.target.classList.add('active');
            renderDestinations(e.target.dataset.filter);
        });
    });
});
