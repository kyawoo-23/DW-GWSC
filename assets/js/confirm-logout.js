$(".logout-btn").click(() => {
  let confirmation = confirm("Are you sure you want to logout?")
  if (confirmation) {
    window.location.href = "logout.php"
  }
})
