$(document).ready(function () {
    $("#but_upload").click(function () {
        var fd = new FormData();
        var files = $('#file')[0].files;
        // Check file selected or not
        if (files.length > 0) {
            fd.append('file', files[0]);
            $.ajax({
                url: '/upload_image',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response != 0) {
                        $("#img").attr("src", response);
                        $(".preview img").show(); // Display image element
                    } else {
                        alert('L\'image n\'a pas été sauvegardé.');
                    }
                },
            });
        } else {
            alert("Veuillez choisir une image.");
        }
    });
});