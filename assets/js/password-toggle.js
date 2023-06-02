// password
let $passwordInput = $("#passwordInput")
let $passwordToggle = $("#passwordToggle")

$passwordToggle.on("click", function () {
  if ($passwordInput.attr("type") === "password") {
    $passwordInput.attr("type", "text")
    $passwordToggle.attr("src", "./assets/static/icons/eye.svg")
  } else {
    $passwordInput.attr("type", "password")
    $passwordToggle.attr("src", "./assets/static/icons/eye-slash.svg")
  }
})

// confirm password
let $passwordInput2 = $("#passwordInput2")
let $passwordToggle2 = $("#passwordToggle2")

$passwordToggle2.on("click", function () {
  if ($passwordInput2.attr("type") === "password") {
    $passwordInput2.attr("type", "text")
    $passwordToggle2.attr("src", "./assets/static/icons/eye.svg")
  } else {
    $passwordInput2.attr("type", "password")
    $passwordToggle2.attr("src", "./assets/static/icons/eye-slash.svg")
  }
})

// Check if passwords match
function checkPasswordsMatch() {
  let password = $passwordInput.val()
  let confirmPassword = $passwordInput2.val()

  if (password !== confirmPassword) {
    $("#password-no-match").show()
  } else {
    $("#password-no-match").hide()
  }
}

$passwordInput2.on("blur", checkPasswordsMatch)
