let isSamePwd = false
let isNotRobot = false
$("#registerBtn").prop("disabled", true)

$("#pwdNoMatch").hide()
$("#passwordInput2").blur(function () {
  let pass = $("#passwordInput").val()
  let repass = $("#passwordInput2").val()
  if (pass.length == 0 || repass.length == 0) {
    $("#pwdNoMatch").show()
    isSamePwd = false
  } else if (pass != repass) {
    $("#pwdNoMatch").show()
    isSamePwd = false
  } else {
    $("#pwdNoMatch").hide()
    isSamePwd = true
  }
  toggleCreateBtn(isSamePwd, isNotRobot)
})

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
  isNotRobot = true
  toggleCreateBtn(isSamePwd, isNotRobot)
  // setTimeout(() => {
  //     CONTAINER.hide()
  //     $(".container").hide()
  // }, 1200)
}

function toggleCreateBtn(isSamePwd, isNotRobot) {
  if (isSamePwd === true && isNotRobot === true) {
    $("#registerBtn").prop("disabled", false)
  } else {
    $("#registerBtn").prop("disabled", true)
  }
}
