const main = document.querySelector('.main');

function init() {
	setTimeout(() => {
		main.style.display = 'block';
		setTimeout(() => main.style.opacity = 1, 50);
	}, 50);
}

function enlargeImg(img) {
	img.style.transform = "scale(1.25)";
	img.style.transition = "transform 0.35s ease";
	img.style.position ="relative";
    img.style.left = "200px";
}

function resetImg(img) {
	img.style.transform = "scale(1)";
	img.style.transition = "transform 0.35s ease";
	img.style.position ="relative";
    img.style.left = "0px";
}

init();	