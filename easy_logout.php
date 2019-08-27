<?php
session_start();
// セッションを破棄する
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
<div id="wrapper">
    <p>ログアウトしました。</p>
    <p><a href="./need_login.php">戻る</a></p>
</div>
</body>
</html>
