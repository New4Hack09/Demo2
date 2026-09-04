function renderPackages() {
    const grid = document.getElementById('packagesGrid');

    packages.forEach(pkg => {
        const card = document.createElement('div');
        card.className = 'package-card';

        let highlightsHtml = '';
        pkg.highlights.forEach(h => highlightsHtml += `<span>${h}</span>`);

        card.innerHTML = `
            <div class="pkg-img">
                <img src="${pkg.image}" alt="${pkg.title}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&q=80&w=600'">
                <div class="pkg-badge">${pkg.discount}</div>
            </div>
            <div class="pkg-content">
                <div class="pkg-dest">${pkg.destination}</div>
                <h3>${pkg.title}</h3>
                <div class="pkg-duration"><i class="fa-regular fa-clock"></i> ${pkg.duration}</div>
                <div class="pkg-highlights">
                    ${highlightsHtml}
                </div>
                <div class="pkg-price-row">
                    <div>
                        <div class="old-price">${pkg.oldPrice}</div>
                        <div class="new-price">${pkg.price}</div>
                    </div>
                </div>
                <div class="pkg-actions">
                    <button class="btn btn-outline" style="color: var(--color-primary); border-color: var(--color-primary);" onclick="viewPackageDetails('${pkg.id}')">Details</button>
                    <button class="btn btn-primary" onclick="openPackageForm('${pkg.id}')">Book</button>
                </div>
            </div>
        `;
        grid.appendChild(card);
    });
}

function viewPackageDetails(id) {
    const pkg = packages.find(p => p.id === id);
    if(!pkg) return;

    const content = document.getElementById('packageDetailContent');

    let itineraryHtml = '';
    pkg.itinerary.forEach(item => {
        itineraryHtml += `
            <div class="day-item">
                <div class="day-title">${item.day}: ${item.title}</div>
                <p>${item.description}</p>
            </div>
        `;
    });

    let inclusionsHtml = '<ul>';
    pkg.inclusions.forEach(inc => inclusionsHtml += `<li><i class="fa-solid fa-check text-success"></i> ${inc}</li>`);
    inclusionsHtml += '</ul>';

    let exclusionsHtml = '<ul>';
    pkg.exclusions.forEach(exc => exclusionsHtml += `<li><i class="fa-solid fa-xmark text-danger"></i> ${exc}</li>`);
    exclusionsHtml += '</ul>';

    content.innerHTML = `
        <div class="pkg-detail-hero">
            <img src="${pkg.image}" alt="${pkg.title}" onerror="this.src='https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&q=80&w=1200'">
        </div>
        <div class="pkg-detail-body">
            <div class="pkg-detail-header">
                <div>
                    <div class="pkg-dest">${pkg.destination}</div>
                    <h2>${pkg.title}</h2>
                    <div class="pkg-duration"><i class="fa-regular fa-clock"></i> ${pkg.duration}</div>
                </div>
                <div style="text-align: right;">
                    <div class="old-price">${pkg.oldPrice}</div>
                    <div class="new-price">${pkg.price}</div>
                </div>
            </div>

            <div class="itinerary-list">
                <h3>Itinerary</h3>
                ${itineraryHtml}
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <div class="inclusions-list">
                    <h3>Inclusions</h3>
                    ${inclusionsHtml}
                </div>
                <div class="inclusions-list">
                    <h3>Exclusions</h3>
                    ${exclusionsHtml}
                </div>
            </div>

            <button class="btn btn-primary full-width btn-lg" onclick="document.getElementById('packageDetailModal').classList.remove('active'); openPackageForm('${pkg.id}')">Book This Package</button>
        </div>
    `;

    openModal('packageDetailModal');
}

document.addEventListener('DOMContentLoaded', renderPackages);
