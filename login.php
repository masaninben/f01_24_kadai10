<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
<title>itemmap</title>
</head>
<body>

<header>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
      <p class="navbar-brand" style="font-size: 30px;font-style: oblique;">itemmap</p>
      <a class="navbar-brand" href="select_nologin.php">アイテム一覧</a>
    </div>
    </div>
  </nav>
</header>

<!-- login_act.php は認証処理用のPHPです。 -->
<legend >ログイン</legend>
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>


</body>
</html>