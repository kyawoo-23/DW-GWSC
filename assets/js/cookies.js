$(".cookies-container").hide()

if (!localStorage.getItem("IsCookiesClosed")) {
  console.log("hi")
  $(".cookies-container").show()
}

$("#ok-cookie").click(() => {
  $(".cookies-container").hide()
  localStorage.setItem("IsCookiesClosed", true)
})
