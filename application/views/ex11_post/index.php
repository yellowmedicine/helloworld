<!DOCTYPE html>
<!--
    /application/views/ex08_use_view/index.php
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter</title>
    </head>
    <body>
        <form action="<?=base_url()?>ex11_post/result" method="post">
            <input type="text" name="username" placeholder="Username" />
            
            <input type="email" name="email" placeholder="Email" />
            
            <button type="submit">전송</button>
        </form>
    </body>
</html>