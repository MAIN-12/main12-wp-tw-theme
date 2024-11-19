/** @format */

function scroll_animation() {
	let scrollPosition = window.scrollY;
	targetId = entry.target.getAttribute('id');
	let setProperty = targuet('--scroll').style(scrollPosition);
}

window.addEventListener('scroll', scroll_animation);
window.addEventListener('resize', scroll_animation);
