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
    })
    $(document).on('click', '.modification_revendeurs', function(){
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
                $("#id_revendeur").val(response[0]['id'])
                $("#statut_revendeur").val(response[0]['statut'])
                $("#date_revendeur").val(response[0]['created_at'])
                $("#date_boost_revendeur").val(response[0]['date_payant'])
                if(response[0]['payant'] == 1){
                    $("#a_paye_revendeur").attr('checked', true)
                } else {
                    $("#a_paye_revendeur").attr('checked', false)
                }
                if(response[0]['xxx'] == 1){
                    $("#boost_position_revendeur").attr('checked', true)
                } else {
                    $("#boost_position_revendeur").attr('checked', false)
                }
                $("#refus_revendeur").val(response[0]['commentaire_admin'])
                $("#societe_revendeur").val(response[0]['societe'])
                $("#siren_revendeur").val(response[0]['siren'])
                $("#contact_revendeur").val(response[0]['gerant'])
                $("#ville_revendeur").val(response[0]['ville'])
                $("#code_postal_revendeur").val(response[0]['code_postal'])
                $("#adresse_revendeur").val(response[0]['adresse'])
                $("#pays_revendeur").val(response[0]['pays'])
                $("#telephone_revendeur").val(response[0]['tel'])
                $("#email_revendeur").val(response[0]['email'])
                $("#url_revendeur").val(response[0]['site_web'])
                if(response[0]['certif'] == 1){
                    $("#certificat_revendeur").attr('checked', true)
                } else {
                    $("#certificat_revendeur").attr('checked', false)
                }
                if(response[0]['costic'] == 1){
                    $("#costic_revendeur").attr('checked', true)
                } else {
                    $("#costic_revendeur").attr('checked', false)
                }
                $("#description_revendeur").val(response[0]['description'])

                //$("#top_position_revendeur").val(response[0]['societe'])
                //$("#tarif_revendeur").val(response[0]['societe'])
                //$("#activites_revendeurs").val(response[0]['societe'])
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });
    });
    $(document).on('click', '.sauvegarde_modifications', function(){
        var id = $("#id_revendeur").val();
        var statut = $("#statut_revendeur").val();
        var date_boost = $("#date_boost_revendeur").val();
        //var top_position = $("#top_position_revendeur").val();
        var a_paye = $("#a_paye_revendeur").is(":checked");
        //var boost_position = $("#boost_position_revendeur").is(":checked");
        var refus = $("#refus_revendeur").val();
        var societe = $("#societe_revendeur").val();
        var siren = $("#siren_revendeur").val();
        var contact = $("#contact_revendeur").val();
        var ville = $("#ville_revendeur").val();
        var code_postal = $("#code_postal_revendeur").val();
        var adresse = $("#adresse_revendeur").val();
        var pays = $("#pays_revendeur").val();
        var telephone = $("#telephone_revendeur").val();
        var email = $("#email_revendeur").val();
        var url = $("#url_revendeur").val();
        //var tarif = $("#tarif_revendeur").val();
        var certificat = $("#certificat_revendeur").is(":checked");
        var costic = $("#costic_revendeur").is(":checked");
        var description = $("#description_revendeur").val();
        //var activites = $("#activites_revendeurs").val();


        $.ajax({
            url: "/revendeurs",
            type: "POST",
            async: false,
            data: {
                modification: true,
                id: id,
                statut: statut,
                date_boost: date_boost,
                a_paye: a_paye,
                refus: refus,
                societe: societe,
                siren: siren,
                contact: contact,
                ville: ville,
                code_postal: code_postal,
                adresse: adresse,
                pays: pays,
                telephone: telephone,
                email: email,
                url: url,
                certificat: certificat,
                costic: costic,
                description: description
            },
            success: function (response) {
                console.log(response);
            },
            error: function (e) {
                alert("Service indisponible pour le moment.")
            },
        });


    })
});