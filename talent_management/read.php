<?php
//idを取得
$id = $_GET["id"];

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
$stmt = $pdo->prepare($sql);
//プリペアーどステートメントを実行
$status = $stmt->execute();

//接続できなかった場合のエラー文表記
if($status == false){
    $error = $stmt->errorInfo();
    exit("SQL Error:".$error[2]);
}
//何のためにあるかわからん
$view = "";

//fetchAllで各データを連想配列で取得
//fetchAll(PDO::FETCH_ASSOC);は連想配列でPHPに値を取得する関数
$values = $stmt->fetchAll(PDO::FETCH_ASSOC);

//jsonに変換
$json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ一覧</title>
</head>
<body>
    <table>
        <tr>
            <th>名前</th>
            <th>モチベーション</th>
            <th>説明</th>
            <th>提案</th>
            <th>期待値調整</th>
            <th>関係構築</th>
            <th>ヒアリング</th>
            <th>ファシリテーション</th>
            <th>クロージング</th>
            <th>課題</th>
            <th>日付</th>
        </tr>
        <?php foreach($values as $v){
        ?>
        <tr>
            <?php $view=''?>
            <td><?=$v["name"]?></td>
            <td><?=$v["motivation"]?></td>
            <td><?=$v["explanation"]?></td>
            <td><?=$v["proposal"]?></td>
            <td><?=$v["expectation"]?></td>
            <td><?=$v["relation"]?></td>
            <td><?=$v["hearing"]?></td>
            <td><?=$v["facilitation"]?></td>
            <td><?=$v["closing"]?></td>
            <td><?=$v["problem"]?></td>
            <td><?=$v["indate"]?></td>
            <td><?=$view .= ' '?></td>
            <td><?php echo $view .='<a href = "./delete.php" id ='.$v["id"].'>削除</a>'?></td>
        </tr>
        <?php }?>
    </table>
    <a href="./index.php">ホーム</a>


    <script>
        
    </script>
</body>
</html>


