$(document).ready(function (e) {
  $("#inscription").submit(function (e) {
    e.preventDefault();
    /*if(verification_Email()){
      $("#texte_erreur_email").text("Cet email possède déjà un compte. Veuillez vous connectez avec ou en utiliser une autre.");
      e.preventDefault();
    }*/
    if ($("#mot_de_passe").val() != $("#mot_de_passe_verif").val()) {
      $("#texte_erreur_mdp").text("Les mots de passe ne correspondent pas.");
      e.preventDefault();
    }

    var email = $("#email").val();
    $.ajax({
      url: '../../functions/verification_email.php',
      type: 'post',
      data: {
        'email':email,
        'email_check':1,
    },

    success:function(response) {	
      $("#email_error").remove();
      $("#email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
    },

    error:function(e) {
      $("#result").html("Something went wrong");
    }
  });



  });
});
