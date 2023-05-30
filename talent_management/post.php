<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力画面</title>
</head>
<body>
    <div>
        <form method="post" action="./write.php">
            名前<input name="name" type="text"><br>
            仕事のやりがい<input name="motivation" type="text"><br>
            説明<input name="explanation" type="text"><br>
            提案<input name="proposal" type="text"><br>
            期待値調整<input name="expectation" type="text"><br>
            関係構築<input name="relation" type="text"><br>
            ヒアリング<input name="hearing" type="text"><br>
            ファシリテーション<input name="facilitation" type="text"><br>
            クロージング<input name="closing" type="text"><br>
            課題<textarea name="problem" type="text"></textarea><br>
            <input id="send" type="submit" value="送信"><br>
        </form>
    </div> 
    <a href="./index.php">ホーム</a>
</body>
</html>