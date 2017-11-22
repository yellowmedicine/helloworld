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
        <? if ($temp_input) {?>
        <h1>저장된 tempdata: <?=$temp_input?></h1>
        <? } else { ?>
        <h1>저장된 tempdata 없음</h1>
        <? } ?>
        <form method="post" action="<?=base_url()?>ex15_tempdata/result">
            <input type="text" name="temp_input" placeholder="임시 저장값" />
            <button type="submit">Tempdata 저장</button>
        </form>
    </body>
</html>