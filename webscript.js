let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');


window.onscroll = () =>{
	searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
}

searchBtn.addEventListener('click', () =>{
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

formBtn.addEventListener('click', () =>{
    loginForm.classList.add('active');
});

formClose.addEventListener('click', () =>{
    loginForm.classList.remove('active');
});
//for video slider nav

const dots = document.querySelectorAll(".nav-dot");
const slides = document.querySelectorAll(".video-slider");
const contents = document.querySelectorAll(".content");

var sliderNav = function(manual){
  dots.forEach((dot) => {
    dot.classList.remove("active");
  });

  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  
  contents.forEach((content) => {
    content.classList.remove("active");
  });
  

  dots[manual].classList.add("active");
  slides[manual].classList.add("active");
  contents[manual].classList.add("active");
}

dots.forEach((dot, i) => {
	dot.addEventListener("click", () => {
      sliderNav(i);
	});
});