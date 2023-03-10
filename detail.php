<?php

/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */

$id = $_GET['id'];

try {
    $db_name = 'gs_kadai_db'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute();

if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //データが取得できたときの処理
    $result = $stmt->fetch();
}

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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">絵本リストへ</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
    <div class="data-table">
        <table class="form-wrapper">
            <h3 class="syosai-title">修正したい箇所を入力し直す</h3>
            <tr>
                <th>
                    <div class="form-name">名前：</div> 
                </th>
                <td><input type="text" name="name" value="<?= $result['name']?>"></td>
            </tr>
            <tr>
                <th>
                    <div class="form-name">URL：</div> 
                </th>
                <td><input type="text" name="url" value="<?= $result['url']?>"></td>
            </tr>
            <tr>
                <th>
                    <div class="form-name">感想：</div> 
                </th>
                <td><textarea name="comment" rows="4" cols="40"><?= $result['comment']?></textarea></td>
            </tr>
            <tr><input type="hidden" name="id" value="<?= $result['id']?>"></tr>
        </table>
        <div class="buttons">
            <input type="submit" value="修正" class="btn-submit">
        </div>
    </div>
        <!-- <div class="jumbotron">
            <fieldset>
                <legend>詳細</legend>
                <label>名前：<input type="text" name="name" value="<?= $result['name']?>"></label><br>
                <label>URL:<input type="text" name="url" value="<?= $result['url']?>"></label><br>
                <label><textarea name="comment" rows="4" cols="40"><?= $result['comment']?></textarea></label><br>
                <input type="hidden" name="id" value="<?= $result['id']?>"><br>
                <input type="submit" value="修正">
            </fieldset>
        </div> -->
    </form>
</body>

</html>
