document.addEventListener('DOMContentLoaded', function () {
    // const headerOffset = document.querySelector('.navbar').offsetHeight;
    const headerOffset = 80;
    const tableOfContentsItems = document.querySelectorAll('[data-scroll-target]');

    // Intersection Observer for Scroll Spy
    const handleIntersection = (entries, observer) => {
        let smallestRatio = Infinity; // Initialize with a very large value.
        let targetId = null;

        entries.forEach(entry => {
            if (entry.isIntersecting && entry.intersectionRatio > 0) {
                if (entry.intersectionRatio < smallestRatio) {
                    smallestRatio = entry.intersectionRatio;
                    targetId = entry.target.getAttribute('id');
                }
            }
        });

        // If a target ID is found, highlight the corresponding navigation item.
        if (targetId) {
            // Remove 'active' from all '.nav-item' elements
            document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));

            // Find the active '.nav-link' based on 'data-scroll-target' and add 'active' to its parent '.nav-item'
            const activeNavLink = document.querySelector(`[data-scroll-target="${targetId}"]`);
            if (activeNavLink && activeNavLink.parentElement.classList.contains('nav-item')) {
                activeNavLink.parentElement.classList.add('active');
            }
        }

        const activeItem = document.querySelector('.nav-item.active');

        if (activeItem) {
            // Remove previous and next classes from all items first to avoid duplicates
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('previous', 'next', 'previous-2', 'next-2');
            });

            // Add 'previous' class to the previous sibling, if it exists
            const previousItem = activeItem.previousElementSibling;
            if (previousItem) {
                previousItem.classList.add('previous');

                // Add 'previous-2' class to the element before the previous item, if it exists
                if (previousItem.previousElementSibling) {
                    previousItem.previousElementSibling.classList.add('previous-2');
                }
            }

            // Add 'next' class to the next sibling, if it exists
            const nextItem = activeItem.nextElementSibling;
            if (nextItem) {
                nextItem.classList.add('next');

                // Add 'next-2' class to the element after the next item, if it exists
                if (nextItem.nextElementSibling) {
                    nextItem.nextElementSibling.classList.add('next-2');
                }
            }
        }
    };


    const intersectionOptions = {
        threshold: 0.5,
        rootMargin: '-10% 0px -50% 0px'
    };

    const intersectionObserver = new IntersectionObserver(handleIntersection, intersectionOptions);

    tableOfContentsItems.forEach(item => {
        const targetElement = document.getElementById(item.getAttribute('data-scroll-target'));
        if (targetElement) {
            intersectionObserver.observe(targetElement);
        }
    });

    // Smooth Scroll Function
    const smoothScroll = (targetId) => {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            const offsetPosition = targetElement.offsetTop - headerOffset;
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    };

    // Smooth Scroll Event Listeners
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            smoothScroll(targetId);
        });
    });

    // Intersection Observer for Fade-In Effect
    const fadeInObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                fadeInObserver.unobserve(entry.target); // Stop observing the target element
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });

    const hiddenElements = document.querySelectorAll(".fadde-in-animation");
    hiddenElements.forEach(el => fadeInObserver.observe(el));
});

window.addEventListener('scroll', function () {
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


//fade in and out header 

let lastScrollTop = 0;

window.addEventListener("scroll", function () {
    let currentScrollTop = window.scrollY || document.documentElement.scrollTop;

    if (currentScrollTop > 100 && currentScrollTop > lastScrollTop) {
        // Scrolling down
        document.querySelector('.navbar').style.transition = 'transform 1s ease-out, opacity 0.5s ease-out';
        document.querySelector('.navbar').style.transform = 'translateY(-100%)';
        document.querySelector('.navbar').style.opacity = '0';
    } else {
        // Scrolling up or at the top
        document.querySelector('.navbar').style.transition = 'transform 1s ease-in, opacity 0.5s ease-in';
        document.querySelector('.navbar').style.transform = 'translateY(0)';
        document.querySelector('.navbar').style.opacity = '1';
    }

    lastScrollTop = currentScrollTop;
});