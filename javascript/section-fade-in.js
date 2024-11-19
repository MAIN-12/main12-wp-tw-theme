const appearOptions = {
  //   threshold: 0.5,
  rootMargin: '0px 0px -100px 0px'
};


const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show");
      observer.unobserve(entry.target); // Stop observing the target element
    }
  });
}, appearOptions);

// const observer = new IntersectionObserver((entries) => {
//   entries.forEach((entry) => {
//     entry.isIntersecting
//       ? entry.target.classList.add("show")
//       : entry.target.classList.remove("show");
//   }); 
// }, appearOptions);

const hiddenElements = document.querySelectorAll(".fadde-in-animation");
hiddenElements.forEach((el) => observer.observe(el));