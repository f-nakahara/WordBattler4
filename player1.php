<?php
require "class/stage.php";
  //プレイヤー選択画面、またはもう一度遊ぶボタンを押したら
  if((isset($_POST["player1"])) || (isset($_POST["second"])) || (isset($_POST["third"])) ){

    //ステージの設定
    if(isset($_POST["player1"])){
      $stage = new Stage(1);
    }
    if(isset($_POST["second"])){
      $stage = new Stage(2);
    }
    if(isset($_POST["third"])){
      $stage = new Stage(3);
    }
    //テキストファイルの初期化
    file_put_contents("p1_word.txt","");
}
  //敵のHPを取得
  $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  if($enemy_hp<=1){
    $level=2;
  }
  //文字がセットされたら、敵HPを1減らしてHitPoint.txtを上書き
  if((isset($_POST["word1"])) && ($_POST["word1"] != "")){
      file_put_contents("enemy/HitPoint.txt",$enemy_hp-1);
  }

  ?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">
  <script src="./ajax.js"></script>
  <link rel="stylesheet" href="stylesheet/enemy.css">
  <link rel="stylesheet" href="stylesheet/player_stylesheet.css">
  <title>プレイヤー1</title>
</head>
<body>
  <div class="header">
    <h1>プレイヤー1</h1>
    <p>お題に近い言葉を入力してください</p>
  </div>

  <!-- 敵HPの表示 -->
  <div class="enemy_hp" id="enemy_hp">
    <?php
    // 敵HPの数値分だけ■を表示
    for($i=0; $i<$enemy_hp; $i++){
      echo "■";
    }
     ?>
  </div>
  <div class="next_stage_bt">
    <?php if($enemy_hp<=1): ?>
    <form action="player1.php"  method="post">
      <input type="submit" name="second" value="次のステージに進む！">
    </form>
  <?php endif ?>
  <?php if($enemy_hp<=1 ): ?>
  <form action="player1.php"  method="post">
    <input type="submit" name="third" value="次のステージに進む！">
  </form>
<?php endif ?>

  </div>
  <div class="main">
    <!-- 入力フォーム -->
    <form action="player1.php"  method="post">
      <input type="text" name="word1" id="word1">
      <input type="submit"  value="送信">
    </form>
  </div>

  <?php
  //入力した文字をプレイヤー1のテキストファイルに追加する
  if((isset($_POST["word1"])) && ($_POST["word1"] != "")){
    $set_word=$_POST["word1"]."<br>";
    file_put_contents("p1_word.txt",$set_word,FILE_APPEND);
    // 最後に入力した文字を表示する
    echo '<div class="input_word">入力したワード：'.$set_word.'</div>' ;
  }
  ?>

  <div class="button">
    <!-- ホームに戻るボタン -->
    <form action="game_home.html" class="home_bt">
      <input type="submit" value="ホームに戻る">
    </form>
    <!-- もう一度遊ぶボタン -->
    <form action="player1.php" method="post" class="replay_bt">
      <input type="submit" name="player1" value="もう一度遊ぶ">
    </form>
  </div>
  <!-- カーソルをあらかじめセットしておく -->
  <script>document.getElementById('word1').focus();</script>
</body>
</html>
