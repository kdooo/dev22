<?php
//insert.phpと中身ほぼ同じ



require_once('funcs.php');


//1.POSTでデータの取得
$name = $_POST['name'];
$url = $_POST['url'];
$content = $_POST['content'];
$id = $_POST['id'];


//2.DB接続する
$pdo = db_conn();


//3.データ登録SQLの作成
$stmt = $pdo->prepare('UPDATE gs_bm_table
                        SET 
                            name = :name,
                            url = :url,
                            content = :content,
                            date = sysdate()
                        WHERE
                            id = :id;
                        ');

$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    // $error = $stmt->errorInfo();
    // exit("ErrorMessage:" . $error[2]);
    sql_error($stmt);

} else {
    //５．index.phpへリダイレクト
    redirect('select.php');
}





?>