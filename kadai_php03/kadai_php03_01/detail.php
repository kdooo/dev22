<?php

require_once('funcs.php');

    //1.PHP
    $id = $_GET['id']; 

    //DBに接続

    $pdo = db_conn();

    //２．データ取得SQL作成
    $stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id'); //idの人だけを取得する記述「WHERE」
    $stmt->bindValue(':id',$id, PDO::PARAM_INT);
    $status = $stmt->execute();

    //３．データ表示
    $view = '';
    if ($status === false) {
        sql_error($stmt);
    } else {
        //データが取得できたら
        $view = $stmt->fetch();
    }

    //var_dump($view); //viewを呼び出す

?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/reset.css" rel="stylesheet">
 
    <style>

    body{
        background-color: #F2F2F2;
    }


    div {
        padding:5px;
        font-size: 16px
    }

    .title{
        font-size: 30px;
        font-weight:bold;
        margin-bottom: 30px;
    }

    .form-inner{
        text-align: left;
        display: flex;
        flex-wrap: wrap;
        width: 640px;

    }

    .form-title{
        text-align: left;
        width: 640px;
        margin: 0 10px 0 0;
    }


    .form-item{
        width: 440px;
        margin: 0 0 20px 0;
        border: 0px solid none;
    }
    

    .form-parts{
        width: 440px;
        height: 30px;
        padding: 5px;
        background-color: none;
        border: 1px solid #ccc;
    }

    .form-parts2{
        width: 440px;
        height: 100px;
        padding: 5px;
        background-color: none;
        border: 1px solid #ccc;
    }

    .btn{
        display: inline-block;;
        background-color: #707070;
        width: 440px;
        text-align: center;
        line-height: 20px;
        margin-top: 20px;
        border-radius: 2px;
        padding: 20px 23px;
        color: #fff;

        margin-left: 10px;
    }

    
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <form action="update.php" method="POST">
        <div class="jumbotron">
            <div class="form-inner">
                <legend class="title">BOOK DETAIL</legend>
                <div class="form-title">書籍名</div>
                    <div class="form-item"><input type="text" name="name" class="form-parts" value= <?= $view['name'] ?>></div>
                <div class="form-title">書籍URL</div>
                    <div class="form-item"><input type="text" name="url" class="form-parts" value= <?= $view['url'] ?>></div>
                <div class="form-title">書籍コメント</div>               
                    <div class="form-item"><textarea name="content" rows="4" cols="40" class="form-parts2"><?= $view['content'] ?></textArea></div>

                    <input type="hidden" name="id" value=<?= $view['id'] ?>>

                <input type="submit" value="送信" class="btn">
            </fieldset>
        </div> 
    </form>

    
</body>
</html>