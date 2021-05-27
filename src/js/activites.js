$(document).ready(function (e) {
    $(".ajouter").click(function (e) {
        activite = $(".ajoutervalue").val()
        if(activite == ""){
            alert("Vous ne pouvez pas ajouter une activité sans nom.")
        } else {
            $.ajax({
                url: "/ajout_activite",
                type: "POST",
                async: false,
                data: {
                    activite: activite,
                },
                success: function (response) {
                    alert("Ajout effectué.")
                    window.location.reload()
                },
                error: function (e) {
                    alert("Service indisponible pour le moment.")
                },
            });
        }
    });
    $(".modifier").click(function (e) {
        var activite = $("." + e.target.id).val();
        var id_activite = e.target.id;
        if (activite == "") {
            alert("Vous ne pouvez pas modifier une activité si vous ne changez pas le nom.")
        } else {
            $.ajax({
                url: "/modification_activite",
                type: "POST",
                async: false,
                data: {
                    activite: activite,
                    id_activite: id_activite
                },
                success: function (response) {
                    alert("Modification effectuée.")
                    window.location.reload()
                },
                error: function (e) {
                    alert("Service indisponible pour le moment.")
                },
            });
        }
    });
    $(".supprimer").click(function (e) {
        var id_activite = e.target.id;
        $.ajax({
            url: "/suppression_activite",
            type: "POST",
            async: false,
            data: {
                id_activite: id_activite
            },
            success: function (response) {
                alert("Suppression effectuée.")
                window.location.reload()
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });
    });
});