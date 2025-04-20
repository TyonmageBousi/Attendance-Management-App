<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>ログイン、入力画面(仮)</p>
    <form action="{{ url('/login_auth') }}" method="POST">
        @csrf
        <label for="email">メールアドレス</label>
        <input type="text" id="email" name="email" required>
        <br><br>

        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">送信</button>
    </form>
