<?php
session_start();
//0.外部ファイル読み込み
include('functions.php');
chk_ssid();


$id = $_GET["id"];
// echo "GET:".$id;

//2. DB接続します
// include('functions.php');
$pdo = db_conn();

//３．SELECT
$stmt = $pdo->prepare('SELECT * FROM '. $table .' WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//4．データ表示
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
   $rs = $stmt->fetch();
}
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
<legend >アイテム更新</legend>
<form method="post" action="update.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="jumbotron ">
   <fieldset>
     
      <div class="form-group">
        <label class="control-label col-sm-2">アイテム名(必須)：</label>
          <div class="col-sm-4">
            <input type="text" name="title" class="form-control" value="<?=$rs['title']?>">
          </div>
      </div> 
      <div class="form-group">   
        <label class="control-label col-sm-2">URL(任意)：</label>
          <div class="col-sm-4">
            <input type="text" name="url" class="form-control" value="<?=$rs['url']?>">
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">メモ(任意)：</label>
          <div class="col-sm-4">
            <textarea name="memo" rows="3" cols="50"><?=$rs["memo"]?></textArea>
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">アイテム画像(必須)：</label>
          <div class="col-sm-4">
           <input type="file" name="upfile" accept="image/*" capture="camera">
           <img src="<?=$rs['image']?>" height="200px">
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <input type="submit" value="登録" class="btn btn-success">
          </div>
      </div>
      <!-- idは変えたくない = ユーザーから見えないようにする-->
     <input type="hidden" name="id" value="<?=$rs['id']?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
