<?php
require_once './easy_login.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>ログインが必要な画面</title>
</head>
<body>
<div id="wrapper">
    <p><?php echo h($_SESSION['user_name']); ?>さん、いらっしゃい！</p>
    <p>ログインした方のみが閲覧できます！</p>
    <p><a href="./easy_logout.php">ログアウトする</a></p>
</div>
</body>
</html>
