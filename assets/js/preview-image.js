function handleImageChange(inputElement, imageElement) {
  const file = inputElement.files[0]
  const reader = new FileReader()

  reader.onload = function (event) {
    imageElement.attr("src", event.target.result)
  }

  if (file) {
    reader.readAsDataURL(file)
  } else {
    imageElement.attr("src", "assets/static/images/no-image.jpg")
  }
}

function handleImageListChange(inputElement, imageElement) {
  const files = inputElement.files
  imageElement.empty()

  if (files.length === 0) {
    const img = document.createElement("img")
    img.src = "assets/static/images/no-image.jpg"
    imageElement.append(img)
  } else {
    for (let i = 0; i < files.length; i++) {
      const file = files[i]
      const reader = new FileReader()

      reader.onload = function (event) {
        const img = document.createElement("img")
        img.src = event.target.result
        imageElement.append(img)
      }

      reader.readAsDataURL(file)
    }
  }
}

$("#siteImage").change(function () {
  handleImageChange(this, $("#siteChosenImg"))
})

$("#pitchPrimaryImage").change(function () {
  handleImageChange(this, $("#pitchPrimaryChosenImage"))
})

$("#pitchImages").change(function () {
  handleImageListChange(this, $("#pitchChosenImages"))
})
