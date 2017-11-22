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
        <? if ($username) {?>
        <h1>저장된 세션값: <?=$username?></h1>
        <? } else { ?>
        <h1>저장된 세션값 없음</h1>
        <? } ?>
        <form method="post" action="<?=base_url()?>ex13_session/result">
            <input type="text" name="username" placeholder="Username" />
            <button type="submit">세션저장</button>
        </form>
    </body>
</html>