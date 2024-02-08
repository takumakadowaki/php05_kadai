<?php

session_start();
require_once('funcs.php');
loginCheck();

//1. POSTデータ取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$content = $_POST['content'];
$age    = $_POST['age'];


// 画像アップロードの処理
// 画像pathを確認
// 一時保存されている画像をimgフォルダに移動させる。
$image = '';
if (isset($_FILES['image'])) {
    // 画像の名前をリネーム処理
    // 一次保存されているファイルの場所を確認する。
    $upload_file = $_FILES['image']['tmp_name'];

    // 送られてきた名前を確認する。
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $new_name = uniqid() . '.' . $extension;
    $image_path = 'img/' . $new_name;

    // 一次保存ファイルをimgフォルダに移動させる（保存する）
    if (move_uploaded_file($upload_file, $image_path)) {
        $image = $image_path;
    }
}
;   

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO
                        gs_an_table(name, email, age, content, indate, image)
                       VALUES(:name, :email, :age, :content, sysdate(), :image);');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
