$(document).ready(function (e) {
  $("#inscription").click(function (e) {
    if (!verification_email()) {
      e.preventDefault();
      $("#mail_inscription").addClass("is-invalid");
    } else {
      $("#mail_inscription").removeClass("is-invalid");
    }
    if ($("#password_inscription").val() != $("#confirm_password_inscription").val()) {
      $("#confirm_password_inscription").addClass("is-invalid");
      e.preventDefault();
    } else {
      $("#confirm_password_inscription").removeClass("is-invalid");
    }
  });
});

function verification_email() {
  var email = $("#mail_inscription").val();
  var error = false;
  if (email != "") {
    $.ajax({
      url: "/verification_email",
      type: "POST",
      async: false,
      data: {
        email: email,
        email_check: 1,
      },
      success: function (response) {
        $("#email_erreur").remove();
        if (response === "") {
          error = true;
        }
        else {
          error = false;
        }
      },
      error: function (e) {
        $("#resultat").html(
          "Quelque chose ne fonctionne pas correctement. Veuillez réessayer plus tard."
        );
      },
    });
  }
  return error;
}
