
document.addEventListener('DOMContentLoaded', function() {
// Get all navigation links
const navLinks = document.querySelectorAll('nav a');

// Get the current page URL
const currentPage = window.location.href;

// Check if the link matches the current URL
function isCurrentPage(link) {
    return link.href === currentPage;
}

// Set aria-current="page" and add styles for the link that matches the current URL
navLinks.forEach(link => {
    if (isCurrentPage(link)) {
    link.setAttribute('aria-current', 'page');
    link.style.fontWeight = 'bold';
    link.style.backgroundColor = '#009624'; // Light green color
    link.style.padding = '0.2em 0.4em';
    link.style.borderRadius = '4px';
    }
});
});
