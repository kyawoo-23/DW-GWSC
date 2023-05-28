jQuery.fn.extend({
  showModal: function () {
    return this.each(function () {
      if (this.tagName === "DIALOG") {
        this.showModal()
      }
    })
  },
  closeModal: function () {
    return this.each(function () {
      if (this.tagName === "DIALOG") {
        this.close()
      }
    })
  },
})

$(".anydayBtn").on("click", () => {
  $("#anydayModal").showModal()
})
$("#anydayModalForm").on("submit", () => {
  $(".anydayBtn").text($(".search-day").val())
})
$("#resetSearchDayBtn").on("click", () => {
  $("#anydayModal").closeModal()
  $(".anydayBtn").text("Anyday")
})

$(".anywhereBtn").on("click", () => {
  $("#anywhereModal").showModal()
})
$("#anywhereModalForm").on("submit", () => {
  $(".anywhereBtn").text($(".search-site").val())
})
$("#resetSearchSiteBtn").on("click", () => {
  $("#anywhereModal").closeModal()
  $(".anywhereBtn").text("Anywhere")
})

$(".close-btn").on("click", () => {
  $("#anydayModal").closeModal()
  $("#anywhereModal").closeModal()
})
