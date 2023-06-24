let BOX = $(".captchaBox")
let WRAP = $(".captchaWrapper")
let CHECK = $("#hiddenCaptcha")
// let CONTAINER = $(".captchaContainer")

$(function () {
  if (CHECK.prop("checked")) {
    BOX.removeClass()
    BOX.addClass("captchaBox circle fadeOut")
  }
})

BOX.click(function () {
  setTimeout(scaleDown, 100)
})

function scaleDown() {
  BOX.addClass("scaleDown")
  setTimeout(scaleUp, 600)
}

function scaleUp() {
  BOX.removeClass("scaleDown boxHover").addClass("circle scaleUp")
  WRAP.addClass("rotation")
  setTimeout(fadeToMark, 1200)
}

function fadeToMark() {
  BOX.removeClass("scaleUp rotation").addClass("fadeOut")
  setTimeout(checkItOut, 400)
}

function checkItOut() {
  CHECK.prop("checked", true)
  // setTimeout(() => {
  //     CONTAINER.hide()
  //     $(".container").hide()
  // }, 1200)
}
