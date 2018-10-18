<?php
$id = $_GET["id"];
// echo "GET:".$id;

//2. DB接続します
include('functions.php');
$pdo = db_conn();

//３．SELECT
$stmt = $pdo->prepare('SELECT * FROM '. $table .' WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//4．データ表示
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
      <a class="navbar-brand" href="login.php">ログイン</a>
      <a class="navbar-brand" href="select_nologin.php">アイテム一覧</a>
     </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<legend >アイテム詳細</legend>
<form method="post" action="update.php" class="form-horizontal">
  <div class="jumbotron ">
   <fieldset>
      <div class="form-group">
        <label class="control-label col-sm-2">アイテム名：</label>
          <div class="col-sm-4">
            <?=$rs["title"]?>
          </div>
      </div> 
      <div class="form-group">   
        <label class="control-label col-sm-2">URL：</label>
          <div class="col-sm-4">
            <?=$rs["url"]?>
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">メモ：</label>
          <div class="col-sm-4">
            <?=$rs["memo"]?>
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">アイテム画像：</label>
          <div class="col-sm-4">
           <img src="<?=$rs['image']?>" height="200px">
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
