alert("file ran");

function resizeHeaderOnScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 200,
  headerEl = document.getElementById('js-header');
  
  if (distanceY > shrinkOn) {
    headerEl.classList.add("scrolled");
    alert("if ran");
  } else {
    headerEl.classList.remove("scrolled");
    alert("else ran");
  }
}

window.addEventListener('scroll', resizeHeaderOnScroll);







