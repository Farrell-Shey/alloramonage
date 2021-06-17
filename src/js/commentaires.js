// Voir le fichier activites.js pour le fonctionnement de l'ajax
$(document).ready(function (e) {
    $('.validation_commentaire').click(function () {
        var id = $(this).attr('id')
        $.ajax({
            // URL qui correspond à la page /functions/administration/commentaires.php
            // Appel ajax qui va permettre de valider un commentaire
            url: "/action_commentaire",
            type: "POST",
            async: false,
            data: {
                id: id,
                methode: "valider"
            },
            success: function () {
                window.location.reload()
            },
            error: function (e) {
                
            },
        });
    })
    $('.suppression_commentaire').click(function () {
        var id = $(this).attr('id')
        $.ajax({
            // Appel ajax qui va permettre de supprimer un commentaire
            url: "/action_commentaire",
            type: "POST",
            async: false,
            data: {
                id: id,
                methode: "supprimer"
            },
            success: function () {
                window.location.reload()
            },
            error: function (e) {
                
            },
        });
    })
});
