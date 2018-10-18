<?php
session_start();
//0.外部ファイル読み込み
include('functions.php');
chk_ssid();

if($_SESSION['kanri_flg'] != 0){
   $menu = '<a class="navbar-brand" href="user_index.php">ユーザー登録</a><a class="navbar-brand" href="user_select.php">ユーザー一覧</a>';
}else{
   $menu = '';
};

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>itemmap</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

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
<legend >アイテム登録</legend>
<form method="post" action="insert.php" class="form-horizontal"  enctype="multipart/form-data">
  <div class="jumbotron ">
   <fieldset>
     
      <div class="form-group">
        <label class="control-label col-sm-2">アイテム名(必須)：</label>
          <div class="col-sm-4">
            <input type="text" name="title" class="form-control" >
          </div>
      </div> 
      <div class="form-group">   
        <label class="control-label col-sm-2">URL(任意)：</label>
          <div class="col-sm-4">
            <input type="text" name="url" class="form-control">
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">メモ(任意)：</label>
          <div class="col-sm-4">
            <textarea name="memo" rows="3" cols="50"></textArea>
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">アイテム画像(必須)：</label>
          <div class="col-sm-4">
           <input type="file" name="upfile" accept="image/*" capture="camera">
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <input type="submit" value="登録" class="btn btn-success">
          </div>
      </div>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
