<?php
//postを受け取る
$name = $_POST["name"];
$motivation = $_POST["motivation"];
$explanation = $_POST["explanation"];
$proposal = $_POST["proposal"];
$expectation = $_POST["expectation"];
$relation = $_POST["relation"];
$hearing = $_POST["hearing"];
$facilitation = $_POST["facilitation"];
$closing = $_POST["closing"];
$problem = $_POST["problem"];
//DBに接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=talent_management;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}  

//DBのSQL作成
//DBのテーブル名とカラム名を入力
$sql = "INSERT INTO talent_management_table(name,motivation,explanation,proposal,expectation,relation,hearing,facilitation,closing,problem,indate)
VALUES(:name,:motivation,:explanation,:proposal,:expectation,:relation,:hearing,:facilitation,:closing,:problem,sysdate());";
$stmt = $pdo->prepare($sql);

//安全性を保つための関数
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':motivation',$motivation,PDO::PARAM_STR);
$stmt->bindValue(':explanation',$explanation,PDO::PARAM_STR);
$stmt->bindValue(':proposal',$proposal,PDO::PARAM_STR);
$stmt->bindValue(':expectation',$expectation,PDO::PARAM_STR);
$stmt->bindValue(':relation',$relation,PDO::PARAM_STR);
$stmt->bindValue(':hearing',$hearing,PDO::PARAM_STR);
$stmt->bindValue(':facilitation',$facilitation,PDO::PARAM_STR);
$stmt->bindValue(':closing',$closing,PDO::PARAM_STR);
$stmt->bindValue(':problem',$problem,PDO::PARAM_STR);
$status = $stmt->execute();


//データ登録後処理
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //データ登録後にreadに飛ばす
    header("Location: read.php");
    exit();
}


?>