//validation_commentaire
//suppression_commentaire

$(document).ready(function (e) {
    $('.validation_commentaire').click(function () {
        var id = $(this).attr('id')
        $.ajax({
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
