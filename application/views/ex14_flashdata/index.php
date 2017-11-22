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
        <h1>저장된 Flashdata: <?=$temp_input?></h1>
        <? } else { ?>
        <h1>저장된 Flashdata 없음</h1>
        <? } ?>
        <form method="post" action="<?=base_url()?>ex14_flashdata/result">
            <input type="text" name="temp_input" placeholder="임시 저장값" />
            <button type="submit">Flashdata 저장</button>
        </form>
    </body>
</html>