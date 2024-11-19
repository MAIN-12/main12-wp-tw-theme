window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');

    // Check if scroll position is greater than 100 pixels
    if (window.scrollY > 100) {
        // Add a CSS class to change the navbar color
        navbar.classList.add('scrolled');
    } else {
        // Remove the CSS class if scroll position is less than or equal to 100 pixels
        navbar.classList.remove('scrolled');
    }
});