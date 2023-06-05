$("#siteImage").change(function () {
  const file = this.files[0]
  if (file) {
    let reader = new FileReader()
    reader.onload = function (event) {
      $("#siteChosenImg").attr("src", event.target.result)
    }
    reader.readAsDataURL(file)
  }
  if (file === undefined) {
    $("#siteChosenImg").attr("src", "assets/static/images/no-image.jpg")
  }
})
