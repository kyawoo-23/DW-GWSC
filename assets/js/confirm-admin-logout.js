$(".admin-logout").click(() => {
  let confirmation = confirm("Are you sure you want to logout?")
  if (confirmation) {
    window.location.href = "adminLogout.php"
  }
})
