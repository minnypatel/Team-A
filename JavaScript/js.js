//alert("file ran");

function resizeHeaderOnScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 50,
  headerEl = document.getElementById('js-header');
  
  if (distanceY > shrinkOn) {
    headerEl.classList.add("scrolled");
//    alert("if ran");
  } else {
    headerEl.classList.remove("scrolled");
//    alert("else ran");
  }
}

window.addEventListener('scroll', resizeHeaderOnScroll);



function resizeNavbarOnScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 50,
  headerEl = document.getElementById('js-navbar');
  
  if (distanceY > shrinkOn) {
    headerEl.classList.add("scrolled");
//    alert("if ran");
  } else {
    headerEl.classList.remove("scrolled");
//    alert("else ran");
  }
}

window.addEventListener('scroll', resizeNavbarOnScroll);



function navbarNoScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 50,
  headerEl = document.getElementById('js-navbar');
  
  if (distanceY <= shrinkOn) {
    headerEl.classList.add("unscrolled");
//    alert("if ran");
  } else {
    headerEl.classList.remove("unscrolled");
//    alert("else ran");
  }
}

window.addEventListener('scroll', navbarNoScroll);




function twitterFeedNoScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 50,
  headerEl = document.getElementById('twitterbox');
  
  if (distanceY <= shrinkOn) {
    headerEl.classList.add("unscrolled");
//    alert("if ran");
  } else {
    headerEl.classList.remove("unscrolled");
//    alert("else ran");
  }
}

window.addEventListener('scroll', twitterFeedNoScroll);



function resizeTwitterFeedOnScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 50,
  headerEl = document.getElementById('twitterbox');
  
  if (distanceY > shrinkOn) {
    headerEl.classList.add("scrolled");
//    alert("if ran");
  } else {
    headerEl.classList.remove("scrolled");
//    alert("else ran");
  }
}

window.addEventListener('scroll', resizeTwitterFeedOnScroll);




