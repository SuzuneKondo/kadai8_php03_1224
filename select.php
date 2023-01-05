<?php

//XSS対策
//hにscriptで入力された時の悪さを防ぐ大事
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}



//1.  DB接続します
//DBに接続するおまじない🤗
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=gs_kadai_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成//データを抜き出す部分
//抜き出すだけなのでバインド変数はいらない
$stmt = $pdo->prepare("SELECT*FROM gs_bm_table;");//用意
$status = $stmt->execute();//実行

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時に失敗してエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      //GETデータ送信リンク作成
      // <a>で囲う
      $view .= '<tr>';
      $view .= '<th class="ddd">';
      $view .= $result['name'];
      $view .= '</th>';
      $view .= '<th class="ddd">';
      $view .= '<a href="' . $result['url'] . '">'. $result['url'] . '</a>';
      $view .= '</th>';
      $view .= '<th class="ddd">';
      $view .= $result['comment'];
      $view .= '</th>';

      $view .= '<th class="ddd">';
      $view .= '<a href="detail.php?id=' . $result['id'] . '">';
      $view .= '[修正]';
      $view .= '</a>';
      $view .= '</th>';

      $view .= '<th class="ddd">';
      $view .= '<a href="delete.php?id=' . $result['id'] . '">';
      $view .= '[削除]';
      $view .= '</a>';
      $view .= '</th>';
      $view .= '</tr>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/reset.css">
<title>ブックマーク一覧</title>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録画面へ</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<main>
  <h1 class="form-title">読んだ絵本リスト</h1>
  <div class="result-box-flame">
    <table border="1" class="result-flame">
      <tr>
          <th class="ttt" width="200px">名前</th>
          <th class="ttt">URL</th>
          <th class="ttt">コメント</th>
          <th class="ttt" width="40px">修正</th>
          <th class="ttt" width="40px">削除</th>
      </tr>
      <tr><?= $view ?></tr>
      <!-- <tr>
        <label>
        <input type="checkbox" name="level" value="ok">
        完全に理解した
        </label>
        <label>
        <input type="checkbox" name="level" value="bad">
        全然分からない
        </label>
      </tr> -->
  </div>
</main>
<!-- Main[End] -->

</body>
</html>
