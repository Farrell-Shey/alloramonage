$(document).ready(function (e) {
  $("#inscription").click(function (e) {
    //e.preventDefault();
    if (!verification_email()) {
      e.preventDefault();
      $("#mail_inscription").addClass("is-invalid");
      // $("#mail_inscription").after("<span class='invalid-feedback'>Ce Compte n\'existe pas</span>");
    } else {
      $("#mail_inscription").removeClass("is-invalid");
    }
    if ($("#password_inscription").val() != $("#confirm_password_inscription").val()) {
      $("#confirm_password_inscription").addClass("is-invalid");
      /*$("#confirm_password_inscription").after(
        "<span id='email_erreur' class='text-danger'>Les mots de passe ne correspondent pas.</span>"
      );*/
      e.preventDefault();
    } else {
      $("#confirm_password_inscription").removeClass("is-invalid");
      //$("#confirm_password_inscription").after("<span id='email_erreur' class='text-danger'>Les mots de passe ne correspondent pas.</span>").remove();
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
          /*$("#mail_inscription").after(
            "<span id='email_erreur' class='text-danger'>" + response + "</span>"
          );*/
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
