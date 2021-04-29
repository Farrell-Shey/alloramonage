$(document).ready(function (e) {
  $("#inscription").click(function (e) {
    e.preventDefault();
    console.log($("#email_inscription").val())
    if (!verification_email()) {
      e.preventDefault();
    }
    if ($("#mot_de_passe").val() != $("#mot_de_passe_verif").val()) {
      $("#texte_erreur_mdp").text("Les mots de passe ne correspondent pas.");
      e.preventDefault();
    }
  });
});

function verification_email() {
  var email = $("#email_inscription").val();
  var error = false;
  if (email != ""){
    $.ajax({
      url: "/functions/verification_email.php",
      type: "post",
      async: false,
      data: {
        email: email,
        email_check: 1,
      },
      success: function (response) {
        $("#email_erreur").remove();
        if(response === "") {
          error = true;
        } 
        else {
          $("#email_inscription").after(
            "<span id='email_erreur' class='text-danger'>" + response + "</span>"
          );
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
