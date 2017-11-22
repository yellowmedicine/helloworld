<!DOCTYPE html>
<!--
    /application/views/ex12_cookie/index.php
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter</title>
    </head>
    <body>
        <form method="post" action="<?=base_url()?>ex16_upload/result" enctype="multipart/form-data">
            <input type="file" name="photo" placeholder="jpg,png,gif" />
            <button type="submit">파일업로드</button>
        </form>
    </body>
</html>