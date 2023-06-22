$(".cookies-container").hide()

if (!sessionStorage.getItem("IsCookiesClosed")) {
  $(".cookies-container").show()
}

$("#ok-cookie").click(() => {
  $(".cookies-container").hide()
  sessionStorage.setItem("IsCookiesClosed", true)
})
