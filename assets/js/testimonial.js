let previous = document.querySelector(".prev")
let next = document.querySelector(".next")
let slides = document.getElementsByClassName("testimonial-card")
let current = 0

next.addEventListener("click", function () {
  slides[current].classList.remove("active")
  slides[current].style.animation = "slideOutLeft 0.5s forwards"
  current++
  if (current === slides.length) current = 0
  slides[current].style.animation = "slideInRight 0.5s forwards"
  slides[current].classList.add("active")
})

previous.addEventListener("click", function () {
  slides[current].classList.remove("active")
  slides[current].style.animation = "slideOutRight 0.5s forwards"
  current--
  if (current < 0) current = slides.length - 1
  slides[current].style.animation = "slideInLeft 0.5s forwards"
  slides[current].classList.add("active")
})
