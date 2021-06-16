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
    // $('.modification_revendeurs').click(function () {
    //     // $.ajax({
    //     //     url: "/revendeurs",
    //     //     type: "POST",
    //     //     async: false,
    //     //     data: {
    //     //         statut: statut
    //     //     },
    //     //     success: function (response) {
    //     //         $("#revendeurs").append(response);
    //     //     },
    //     //     error: function (e) {
    //     //         alert("Service indisponible pour le moment.")
    //     //     },
    //     // });
    //     //console.log($(this).attr('id'))
    // });
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
                // costic ???
                //console.log
                $("#id_revendeur").val(response[0]['id'])

                //
                $("#statut_revendeur").val(response[0]['statut'])
                $("#statut_revendeur option:eq(1)").prop('selected', true)
                //

                $("#date_revendeur").val(response[0]['created_at'])
                $("#date_boost_revendeur").val(response[0]['date_payant'])
                //$("#top_position_revendeur").val(response[0]['societe'])

                //
                $("#a_paye_revendeur").val(response[0]['payant'])
                $("#boost_position_revendeur").val(response[0]['societe'])
                //

                $("#refus_revendeur").val(response[0]['commentaire_admin'])
                $("#societe_revendeur").val(response[0]['societe'])
                $("#siren_revendeur").val(response[0]['siren'])
                $("#contact_revendeur").val(response[0]['gerant'])
                $("#ville_revendeur").val(response[0]['ville'])
                $("#code_postal_revendeur").val(response[0]['code_postal'])
                $("#adresse_revendeur").val(response[0]['adresse'])
                $("#pays_revendeur").val(response[0]['pays'])
                $("#telephone_revendeur").val(response[0]['tel'])
                //$("#fax_revendeur").val(response[0]['societe'])
                $("#email_revendeur").val(response[0]['email'])
                $("#url_revendeur").val(response[0]['site_web'])
                //$("#tarif_revendeur").val(response[0]['societe'])

                //
                $("#certificat_revendeur").val(response[0]['certif'])
                //

                $("#description_revendeur").val(response[0]['description'])
                $("#activites_revendeurs").val(response[0]['societe'])
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });
     });
});