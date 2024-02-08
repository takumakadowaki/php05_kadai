<?php
session_start();
require_once('funcs.php');
loginCheck();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <form method="POST" action="insert.php" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>株式情報共有</legend>
                <div>
                    <label for="name">銘柄名：</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="email">企業URL：</label>
                    <input type="text" id="email" name="email">
                </div>
                <div>
                    <label for="age">証券コード：</label>
                    <input type="text" id="age" name="age">
                </div>
                <div>
                    <label for="content">情報：</label>
                    <textarea id="content" name="content" rows="4" cols="40"></textarea>
                </div>

                <div>
                    <label for="image">画像（チャート画面等）：</label>
                    <input type="file" id="image" name="aimage">
                </div>


                
                <div>
                    <input type="submit" value="送信">
                </div>
            </fieldset>
        </div>
    </form>
</body>

</html>
