let slideIndex = 1;
const carouselStates = new WeakMap();

function getPrimaryCarousel() {
  return document.querySelector(".carosello");
}

function getCarouselState(carousel) {
  if (!carouselStates.has(carousel)) {
    carouselStates.set(carousel, { index: 1 });
  }

  return carouselStates.get(carousel);
}

function plusSlides(n) {
  const carousel = getPrimaryCarousel();

  if (!carousel) {
    return;
  }

  const state = getCarouselState(carousel);
  showCarouselSlides(carousel, state.index + n);
}

function currentSlide(n) {
  const carousel = getPrimaryCarousel();

  if (!carousel) {
    return;
  }

  showCarouselSlides(carousel, n);
}

function showSlides(n) {
  const carousel = getPrimaryCarousel();

  if (!carousel) {
    return;
  }

  showCarouselSlides(carousel, n);
}

function showCarouselSlides(carousel, n) {
  const state = getCarouselState(carousel);
  const slides = carousel.getElementsByClassName("mySlides");
  const dots = carousel.getElementsByClassName("dot");

  if (slides.length === 0) {
    return;
  }

  if (n > slides.length) state.index = 1;
  else if (n < 1) state.index = slides.length;
  else state.index = n;

  if (carousel === getPrimaryCarousel()) {
    slideIndex = state.index;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (let i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[state.index - 1].style.display = "block";

  if (dots[state.index - 1]) {
    dots[state.index - 1].className += " active";
  }
}

document.querySelectorAll(".carosello").forEach((carousel) => {
  showCarouselSlides(carousel, 1);

  if (carousel.dataset.autoplay === "true") {
    const interval = Number.parseInt(carousel.dataset.interval || "4000", 10);

    window.setInterval(() => {
      const state = getCarouselState(carousel);
      showCarouselSlides(carousel, state.index + 1);
    }, Number.isNaN(interval) ? 4000 : interval);
  }
});
