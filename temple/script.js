const carousel = document.getElementById('carousel');
const dotsContainer = document.getElementById('dots');
const autoplayCheckbox = document.getElementById('autoplayCheckbox');

const itemsPerPage = 3; 
const watItems = document.querySelectorAll('.wat');
const totalPages = 2;   

let currentIndex = 0;
let autoplay = true;
let interval;


dotsContainer.innerHTML = '';
for (let i = 0; i < totalPages; i++) {
  const dot = document.createElement('span');
  dot.addEventListener('click', () => goToSlide(i));
  dotsContainer.appendChild(dot);
}

function updateDots() {
  const dots = dotsContainer.querySelectorAll('span');
  dots.forEach((dot, i) => {
    dot.classList.toggle('active', i === currentIndex);
  });
}

function goToSlide(index) {
  currentIndex = index;
  const cardWidth = 300;
  const cardMargin = 24;
  const offset = index * (cardWidth + cardMargin) * itemsPerPage;
  carousel.style.transform = `translateX(-${offset}px)`;
  updateDots();
}

function startAutoPlay() {
  interval = setInterval(() => {
    currentIndex = (currentIndex + 1) % totalPages;
    goToSlide(currentIndex);
  }, 3000);
}

function stopAutoPlay() {
  clearInterval(interval);
}

autoplayCheckbox.addEventListener('change', (e) => {
  autoplay = e.target.checked;
  if (autoplay) startAutoPlay();
  else stopAutoPlay();
});


goToSlide(0);
if (autoplay) startAutoPlay();
