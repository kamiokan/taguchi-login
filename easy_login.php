<?php
require_once './lib/h.php';
header('X-FRAME-OPTIONS: SAMEORIGIN');
session_start();

// エラーメッセージを初期化
$error = '';

// 認証済みかどうかのセッション変数を初期化
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}

$user_id[] = "user1";
$hash[] = '$2y$10$6DbbRArAPaOmNLQP9hiu4uPTPGeozkG4CEPkvqT4JsB9VbK4lOP7m'; // pass1
$user_name[] = "カミオカ";

if (isset($_POST['user_id']) && isset($_POST['password'])) {

    foreach ($user_id as $key => $value) {
        if ($_POST['user_id'] === $user_id[$key] && password_verify($_POST['password'], $hash[$key])) {
            session_regenerate_id(true);
            $_SESSION['auth'] = true;
            $_SESSION['user_name'] = $user_name[$key];
            break;
        }
    }
    if ($_SESSION['auth'] === false) {
        $error = 'ユーザーIDかパスワードに誤りがあります。';
    }
}

if ($_SESSION['auth'] !== true) {
    ?>
    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>ログインフォーム</title>
    </head>
    <body>
    <div id="login">
        <h1>認証フォーム</h1>
        <?php
        if ($error) {
            echo '<p style="color:red">' . h($error) . '</p>';
        }
        ?>
        <form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="post">
            <dl>
                <dt><label for="user_id">ユーザーID</label></dt>
                <dd><input type="text" name="user_id" id="user_id" value=""></dd>
            </dl>
            <dl>
                <dt><label for="password">パスワード</label></dt>
                <dd><input type="password" name="password" id="password" value=""></dd>
            </dl>
            <input type="submit" name="submit" value="ログイン">
        </form>
    </div>
    </body>
    </html>
    <?php
    // スクリプトを終了し、認証が必要なページが表示されないようにする
    exit();
}