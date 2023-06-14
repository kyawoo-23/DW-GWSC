$("#pwdNoMatch").hide()
$("#registerBtn").prop("disabled", true)

$("#passwordInput2").blur(function () {
  let pass = $("#passwordInput").val()
  let repass = $("#passwordInput2").val()
  if (pass.length == 0 || repass.length == 0) {
    $("#pwdNoMatch").show()
    $("#registerBtn").prop("disabled", true)
  } else if (pass != repass) {
    $("#pwdNoMatch").show()
    $("#registerBtn").prop("disabled", true)
  } else {
    $("#pwdNoMatch").hide()
    $("#registerBtn").prop("disabled", false)
  }
})
