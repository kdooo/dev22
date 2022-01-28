<?php

require_once('funcs.php');


//1.POSTでデータの取得
$name = $_POST['name'];
$url = $_POST['url'];
$content = $_POST['content'];


//2.DB接続する
$pdo = db_conn();


//3.データ登録SQLの作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, content, date)
                        VALUES(NULL, :name, :url, :content, sysdate())");

// 2. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    // $error = $stmt->errorInfo();
    // exit("ErrorMessage:" . $error[2]);
    sql_error($stmt);

} else {
    //５．index.phpへリダイレクト
    redirect('index.php');
}





?>