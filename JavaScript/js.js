

function resizeHeaderOnScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 200,
  headerEl = document.getElementById('js-header');
  
  if (distanceY > shrinkOn) {
    headerEl.classList.add("scrolled");
  } else {
    headerEl.classList.remove("scrolled");
  }
}

window.addEventListener('scroll', resizeHeaderOnScroll);







