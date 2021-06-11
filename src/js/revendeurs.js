$(document).ready(function (e) {
    $('.changement_revendeurs').click(function () {
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
        // $.ajax({
        //     url: "/revendeurs",
        //     type: "POST",
        //     async: false,
        //     data: {
        //         statut: statut
        //     },
        //     success: function (response) {
        //         $("#revendeurs").append(response);
        //     },
        //     error: function (e) {
        //         alert("Service indisponible pour le moment.")
        //     },
        // });
        //console.log($(this).attr('id'))
    });
    $(document).on('click', '.modification_revendeurs', function(){
        //console.log("value : " + $(this).attr('id'))
        var id_revendeur = $(this).attr('id')
        $.ajax({
            url: "/revendeurs",
            type: "POST",
            dataType: 'JSON',
            async: false,
            data: {
                id_revendeur: id_revendeur
            },
            success: function (response) {
                console.log(response[0]['societe'])
                $("#id_revendeur").text(response[0]['id'])

                $("#societe_revendeur").val(response[0]['societe'])
                //$('#societe_revendeur').attr('value', response[0]['societe'])
                //document.getElementById("societe_revendeur").value= response[0]['societe']
                var test = response[0]['societe']
                $('#refus_revendeur').val(test)
                $("#societe_revendeur").val(test)
                $(".poney").val(test)
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });
     });
});