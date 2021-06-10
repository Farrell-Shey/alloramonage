$(document).ready(function (e) {
    $('.changement_revendeurs').click(function () {
        console.log($(this).attr('value'))
        $("#revendeurs").empty();
        var statut = $(this).attr('value')
        $.ajax({
            url: "/revendeurs",
            type: "POST",
            async: false,
            data: {
                statut: statut
            },
            success: function (response) {
                $("#revendeurs").append(response);
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });
    });
    $('.modification_revendeurs').click(function () {
        $.ajax({
            url: "/revendeurs",
            type: "POST",
            async: false,
            data: {
                statut: statut
            },
            success: function (response) {
                $("#revendeurs").append(response);
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });
    });
});