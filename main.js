const main = document.querySelector('.main');

function init() {
	setTimeout(() => {
		main.style.display = 'block';
		setTimeout(() => main.style.opacity = 1, 50);
	}, 50);
}

function enlargeImg(img) {
	img.style.transform = "scale(1.5)";
	img.style.transition = "transform 0.25s ease";
}

function resetImg(img) {
	img.style.transform = "scale(1)";
	img.style.transition = "transform 0.25s ease";
}

init();	