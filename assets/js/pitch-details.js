$(document).ready(function () {
  $("#newAddress").hide()

  $("#headCount").change(function () {
    let value = $("#headCount").val()
    let price = $("#price").data("price")
    $("#price").val(value * price)
  })

  $("#isNewAddress").on("change", function () {
    if ($("#isNewAddress").is(":checked")) {
      $("#address").slideUp(500)
      $("#newAddress").slideDown(500)
    } else {
      $("#newAddress").slideUp(500)
      $("#address").slideDown(500)
    }
  })

  $(".payment-logo").on("click", function () {
    $(this).addClass("active")
    $(this).siblings().removeClass("active")
    $("#paymentType").val($(this).data("payment"))
  })

  let validCardNumber = false,
    validCardExpiry = false,
    validCardCvv = false

  let cardNumber = $("#cardNumber")
  cardNumber.on("input", function () {
    let position = cardNumber[0].selectionStart
    let prevVal = cardNumber.val()
    let newVal = prevVal.replace(/\D/g, "")
    newVal = newVal.substring(0, 16)
    let formattedVal = newVal.replace(/(.{4})/g, "$1 ")
    cardNumber.val(formattedVal)

    for (let i = 0; i < position; i++) {
      if (prevVal[i] != formattedVal[i]) {
        cardNumber[0].selectionEnd = position + 1
        return
      }
    }
    cardNumber[0].selectionEnd = position

    validCardNumber = newVal.length >= 16 ? true : false
    toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv)
  })

  let cardExpiry = $("#cardExpiry")
  cardExpiry.on("input", function () {
    let position = cardExpiry[0].selectionStart
    let prevVal = cardExpiry.val()
    let newVal = prevVal.replace(/\D/g, "")
    newVal = newVal.substring(0, 4)
    let formattedVal = newVal.replace(/(.{2})/g, "$1 ")
    cardExpiry.val(formattedVal)

    for (let i = 0; i < position; i++) {
      if (prevVal[i] != formattedVal[i]) {
        cardExpiry[0].selectionEnd = position + 1
        return
      }
    }
    cardExpiry[0].selectionEnd = position

    validCardExpiry = newVal.length >= 4 ? true : false
    toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv)
  })

  let cardCvv = $("#cardCvv")
  cardCvv.on("input", function () {
    let cvvVal = cardCvv.val()
    cvvVal = cvvVal.replace(/\D/g, "")
    cvvVal = cvvVal.substring(0, 3)
    cardCvv.val(cvvVal)

    validCardCvv = cvvVal.length >= 3 ? true : false
    toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv)
  })

  function toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv) {
    if (
      validCardNumber === true &&
      validCardExpiry === true &&
      validCardCvv == true
    ) {
      $("#bookBtn").prop("disabled", false)
    } else {
      $("#bookBtn").prop("disabled", true)
    }
  }
})
