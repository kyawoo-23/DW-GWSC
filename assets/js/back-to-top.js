let btn = $("#backToTopBtn")
let lastScrollTop = 0
$(window).scroll(function () {
  let st = $(window).scrollTop()
  if (st > lastScrollTop) {
    btn.removeClass("show")
  } else if (st > 300) {
    btn.addClass("show")
  } else {
    btn.removeClass("show")
  }
  lastScrollTop = st
})

btn.on("click", function (e) {
  e.preventDefault()
  $("html, body").animate(
    {
      scrollTop: 0,
    },
    "300"
  )
})
