//If passsword doesn't Match
document.addEventListener("DOMContentLoaded", function () {
  var password = document.getElementById("password");
  var confirmPassword = document.getElementById("confirm_password");
  var passwordError = document.getElementById("passwordError");

  function validatePassword() {
    if (password.value !== confirmPassword.value) {
      passwordError.textContent = "Passwords do not match!";
      passwordError.style.color = "red";
    } else {
      passwordError.textContent = "";
    }
  }

  confirmPassword.addEventListener("input", validatePassword);
});
