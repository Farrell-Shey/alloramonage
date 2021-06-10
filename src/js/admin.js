$(document).ready(function (e) {
    $('#table-select').change(function () {
        $.ajax({
            url: '/getColumns',
            type: 'post',
            data: { "callGetColumns": this.value},
            success: function(response) { 
                $("#empty-select").empty();
                $("#empty-select").html("Sur quel champ souhaitez-vous travailler ? " + response);
            }
        });
    });
});