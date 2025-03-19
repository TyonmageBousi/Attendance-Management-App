<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
<form action="{{ url('/new_create_account') }}" method="POST">
@csrf
            <label for="user_id">名前</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- メールアドレス入力 -->
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- パスワード入力 -->
        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- フォーム送信ボタン -->
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
</body>
</html>