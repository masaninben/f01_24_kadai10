<?php

session_start();
//0.外部ファイル読み込み
include('functions.php');
chk_ssid();


//1.  DB接続します
// include('functions.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM '.$table.'');
$status = $stmt->execute();

//３．データ表示
if($_SESSION['kanri_flg'] != 0){
   $menu = '<a class="navbar-brand" href="user_index.php">ユーザー登録</a><a class="navbar-brand" href="user_select.php">ユーザー一覧</a>';
}else{
   $menu = '';
};

$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  errorMsg($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<div class="col-sm-2" style="border: solid 10px #efefef; font-size: 12px;">';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["indate"];
    $view .= '<br>';
    $view .= '<img src="'.$result['image'].'" height="100px">';
    $view .= '</a><br>';
    $view .= $result["title"];
    $view .= '<br>';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= "</div>";
    
  }

};
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>itemmap</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <p class="navbar-brand" style="font-size: 30px;font-style: oblique;">itemmap</p>
        <a class="navbar-brand" href="index.php">アイテム登録</a>
        <a class="navbar-brand" href="select.php">アイテム一覧</a>
        <?=$menu?>
        <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<legend >アイテム一覧</legend>
<div class="container">
    <div class="row">
     
      <?=$view?>
     
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
