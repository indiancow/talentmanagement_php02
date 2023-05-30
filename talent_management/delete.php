<?php

//DB接続
try {
    //Password:MAMP='root',XAMPP=''
    //PDOでデータをsecureにする、扱いやすくする。
    $pdo = new PDO('mysql:dbname=talent_management;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}  
//selectでデータtable取得
$sql = "SELECT * FROM talent_management_table;";
//pdoでデータを扱いやすくする。エスケープして安全にする。
//削除機能でどうやってidを取得するかがわからん…
$stmt = $pdo->prepare("DELETE FROM テーブル名 WHERE id = :id");
//プリペアーどステートメントを実行
$status = $stmt->execute();


//接続できなかった場合のエラー文表記
if($status == false){
    $error = $stmt->errorInfo();
    exit("SQL Error:".$error[2]);
}else{
    header("Location: read.php");
    exit();
}

//何のためにあるかわからん
// $view = "";

// //fetchAllで各データを連想配列で取得
// //fetchAll(PDO::FETCH_ASSOC);は連想配列でPHPに値を取得する関数
// $values = $stmt->fetchAll(PDO::FETCH_ASSOC);

// //jsonに変換
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);
// $id = $values[":id"];
// var_dump($values[0]);
// // var_dump($id);

// ?>
