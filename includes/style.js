//Email Validation
document.addEventListener("DOMContentLoaded", function () {
  var email = document.getElementById("email");
  var emailError = document.getElementById("emailError");

  function validateEmail() {
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Standard email format
    if (email.value.trim() === "") {
      emailError.textContent = "Email is required.";
      emailError.style.color = "red";
    } else if (!emailPattern.test(email.value)) {
      emailError.textContent = "Please enter a valid email address.";
      emailError.style.color = "red";
    } else {
      emailError.textContent = "";
    }
  }

  email.addEventListener("input", validateEmail);
});

//Phone number Validation
document.addEventListener("DOMContentLoaded", function () {
  var phone = document.getElementById("phone");
  var phoneError = document.getElementById("phoneError");

  function validatePhone() {
    var phonePattern = /^[0-9]{10}$/; // Must be exactly 10 digits

    if (!phonePattern.test(phone.value)) {
      phoneError.textContent = "Invalid Format!.";
      phoneError.style.color = "red";
    } else {
      phoneError.textContent = "";
    }
  }

  phone.addEventListener("input", validatePhone);
});

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
