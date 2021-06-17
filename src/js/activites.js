$(document).ready(function (e) {
    // Lors d'un clic sur un élément de classe « ajouter » (Les classes commencent par un point et les id par une dièse)
    $(".ajouter").click(function (e) {
        // Récupérer la valeur de l'élément ayant pour classe « ajoutervalue »
        activite = $(".ajoutervalue").val()
        if(activite == ""){
            alert("Vous ne pouvez pas ajouter une activité sans nom.")
        } else {
            // Faire une requête ajax de type POST sur l'URL /action_activite qui correspond à la page /functions/administration/activites.php
            $.ajax({
                url: "/action_activite",
                type: "POST",
                async: false,
                // La data correspond au(x) paramètre(s) POST que l'on envoie
                data: {
                    // Variable: value,
                    // On récupèrera la variable sous $_POST['variable'], ici ce sera sous $_POST['activite']
                    activite: activite,
                },
                // En cas de succès, afficher le message et raffraîchir la page
                success: function () {
                    alert("Ajout effectué.")
                    window.location.reload()
                },
                error: function () {
                    alert("Service indisponible pour le moment.")
                },
            });
        }
    });
    // Lors d'un clic sur un élément de classe « modifier »
    $(".modifier").click(function (e) {
        // e.target.id va récupérer l'id de l'élément sur lequel on vient de cliquer
        // Exemple : si l'id de l'élément vaut 12, je vais récupérer la valeur de l'élément ayant pour classe « 12 »
        var activite = $("." + e.target.id).val();
        var id_activite = e.target.id;
        if (activite == "") {
            alert("Vous ne pouvez pas modifier une activité si vous ne changez pas le nom.")
        } else {
            $.ajax({
                url: "/action_activite",
                type: "POST",
                async: false,
                data: {
                    activite: activite,
                    id_activite: id_activite
                },
                success: function () {
                    alert("Modification effectuée.")
                    window.location.reload()
                },
                error: function (e) {
                    alert("Service indisponible pour le moment.")
                },
            });
        }
    });
    // Lors d'un clic sur un élément de classe « supprimer »
    $(".supprimer").click(function (e) {
        var id_activite = e.target.id;
        $.ajax({
            url: "/action_activite",
            type: "POST",
            async: false,
            data: {
                id_activite: id_activite
            },
            success: function () {
                alert("Suppression effectuée.")
                window.location.reload()
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });
    });
});