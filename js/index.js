var slideIndex = 1;
showSlides(slideIndex);

$(".prev").on('click', function(){
  plusSlides(-1);
});


$(".next").on('click', function(){
  plusSlides(+1);
});

function plusSlides(x) {
  showSlides(slideIndex += x);
}

function currentSlide(x) {
  showSlides(slideIndex = x);
}

function showSlides(x) {
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("dot");

  if (x > slides.length) {
    slideIndex = 1; 
  }
  if (x < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  slides[slideIndex - 1].style.display = "block";

  dots[slideIndex - 1].classList.add("active");
}
