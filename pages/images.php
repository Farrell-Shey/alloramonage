<?php

?>

<script src="/assets/js/app.js"></script>
<div class="container">
    <form method="post" action="" enctype="multipart/form-data" id="myform">
        <div class='preview'>
            <img src="" id="img" width="100" height="100">
        </div>
        <div>
            <input type="file" id="file" name="file" />
            <input type="button" class="button" value="Upload" id="but_upload">
        </div>
    </form>
</div>

<style>
    /* Container */
    .container {
        margin: 0 auto;
        border: 0px solid black;
        width: 50%;
        height: 250px;
        border-radius: 3px;
        background-color: ghostwhite;
        text-align: center;
    }

    /* Preview */
    .preview {
        width: 100px;
        height: 100px;
        border: 1px solid black;
        margin: 0 auto;
        background: white;
    }

    .preview img {
        display: none;
    }

    /* Button */
    .button {
        border: 0px;
        background-color: deepskyblue;
        color: white;
        padding: 5px 15px;
        margin-left: 10px;
    }
</style>