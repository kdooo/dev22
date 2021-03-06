<?php

require_once('funcs.php'); //「require_once」ファイルを使えるようにする
$id = $_GET['id']; 

//DBに接続
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id = :id' );
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
$view = '';
if ($status === false) {

    //関数化へ(func.php)
    sql_error($stmt);

} else {
    //データが取得できたら。
    $view = $stmt->fetch();
}

// var_dump($view);
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
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

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>会員詳細</legend>
                <label>名前：<input type="text" name="name" value=<?= $view['name']?>></label><br>
                <label>id：<input type="text" name="lid" value=<?= $view['lid']?>></label><br>
                <label>pw：<input type="text" name="lpw" value=<?= $view['lpw']?>></label><br>
                <label>管理者：<input type="checkbox" name="kanri_flg"　checked value=<?= $view['kanri_flg']?>></label><br>
                <label>現職者：<input type="checkbox" name="life_flg" checked value=<?= $view['life_flg']?>></label><br>

                <input type="hidden" name="id" value=<?= $view['id'] ?>>

                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
