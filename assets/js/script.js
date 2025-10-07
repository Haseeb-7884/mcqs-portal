// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Animation on scroll using Intersection Observer
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Apply animation to cards (using classes, no IDs)
document.querySelectorAll('.category-card, .mcq-card, .feature-item, .cert-feature').forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(card);
});

// Basic search functionality example (adapt for backend)
// Targets the search input by class/parent - works even if HTML changes
const searchInput = document.querySelector('.search-box input');
if (searchInput) {
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            const query = this.value.trim();
            if (query) {
                // Placeholder for backend search - e.g., fetch('/search?q=' + query)
                console.log('Searching for: ' + query); // Replace with actual function
                // For now, just alert as demo; in production, redirect or load results dynamically
                alert('Searching for: ' + query);
            }
        }
    });
}

// If dropdowns are added later (e.g., Bootstrap dropdowns), they rely on Bootstrap JS, which is already linked.
// No need for custom JS unless specific backend integration is required.