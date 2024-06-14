$(document).ready(function () {
  $("form").on("submit", function (e) {
    e.preventDefault();

    var isValid = true;

    var fullName = $("#name").val();
    if (fullName.length < 3) {
      // alert("Full Name must be at least 3 characters long.");
      isValid = false;
    }

    var dob = $("#dob").val();
    if (!dob) {
      // alert("Please enter a valid Date of Birth.");
      isValid = false;
    }

    var mobile = $("#phone").val();
    var mobileRegex = /^[0-9]{11}$/;
    if (!mobileRegex.test(mobile)) {
      // alert("Please enter a valid 11-digit Mobile Number.");
      isValid = false;
    }

    var email = $("#email").val();
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
      // alert("Please enter a valid Email Address.");
      isValid = false;
    }

    if (isValid) {
      var formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "query/insert.php",
        data: formData,
        success: function (response) {
          window.location.href = "success.html";
        },
        error: function () {
          alert("An error occurred while submitting the form.");
        },
      });
    }
  });
});
