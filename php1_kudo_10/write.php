<?php

    $name = $_POST["name"];
    $birthplace = $_POST["birthplace"];
    $birthday = $_POST["birthday"];

    $name = htmlspecialchars($name, ENT_QUOTES);
    $birthplace = htmlspecialchars($birthplace, ENT_QUOTES);
    $birthday = htmlspecialchars($birthday, ENT_QUOTES);

    $date = date("Y年m月d日 H:i:s");
    $str = $date . " / " .$name . " / " .$birthplace. " / " .$birthday;

    $file = fopen("data.txt","a");
    fwrite($file, $str."\n");
    fclose($file);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h1>書き込みしました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2>

    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="input.php">戻る</a></li>
    </ul>
    
</body>
</html>