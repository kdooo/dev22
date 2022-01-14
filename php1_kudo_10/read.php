<?php
    $file = fopen("data.txt","r");
    while ($str = fgets($file)){
        echo nl2br($str);
    }
    fclose($file);

?>

<style>
    body{
    background-color: #F5F5F5;
    } 

    
</style>