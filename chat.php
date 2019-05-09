<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">
  <script src="./ajax.js"></script>
  <link rel="stylesheet" href="stylesheet/enemy.css">
  <link rel="stylesheet" href="stylesheet/chat_stylesheet.css">
  <title>観戦モード</title>
</head>
<body>
  <div class="header">
    <h1>観戦モード</h1>
    <p>各プレイヤーの入力文字を表示します</p>
    <!-- ホームに戻るボダン -->

  </div>
  <div class="main">
    <div class="player1_chat">
      <h2>プレイヤー1</h2>
      <!-- プレイヤー1の入力したワードを表示 -->
      <div id="player1"></div>
    </div>

    <!-- 敵体力の表示 -->
    <div id="enemy_hp" class="enemy_hp"></div>
    <form action="game_home.html" class="home_bt">
      <input type="submit" value="ホームに戻る">
    </form>

    <div class="player2_chat">
      <h2>プレイヤー2</h2>
      <!-- プレイヤー2の入力したワードの表示 -->
      <div id="player2"></div>
    </div>
  </div>
</body>
</html>
