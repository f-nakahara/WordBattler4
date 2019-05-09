<?php
require "class/stage.php";
  //プレイヤー選択画面、またはもう一度遊ぶボタンを押したら
  if((isset($_POST["player2"])) || (isset($_POST["second"])) || (isset($_POST["third"])) ){
    if(isset($_POST["player2"])){
      $stage = new Stage(1);

    }
    if(isset($_POST["second"])){
      $stage = new Stage(2);
    }
    if(isset($_POST["third"])){
      $stage = new Stage(3);
    }

    //テキストファイルの初期化
    file_put_contents("p2_word.txt","");
  }

//敵のHPを取得
$enemy_hp=file_get_contents("enemy/HitPoint.txt");
//文字がセットされたら、敵HPを1減らしてHitPoint.txtを上書き
if((isset($_POST["word2"])) && ($_POST["word2"] != "")){
    file_put_contents("enemy/HitPoint.txt",$enemy_hp-1);
    if($enemy_hp<1){
      $stage+=1;
  }
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
  <title>プレイヤー2</title>
</head>
<body>
  <div class="header">
    <h1>プレイヤー2</h1>
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
    <form action="player2.php"  method="post">
      <input type="submit" name="second" value="次のステージに進む！">
    </form>
  <?php endif ?>

  <div class="main">
    <!-- 入力フォーム -->
    <form action="player2.php"  method="post">
      <input type="text" name="word2" id="word2">
      <input type="submit" value="送信">
    </form>
  </div>

  <?php
  //入力した文字をプレイヤー1のテキストファイルに追加する
  if((isset($_POST["word2"])) && ($_POST["word2"]) != ""){
    $set_word=$_POST["word2"]."<br>";
    file_put_contents("p2_word.txt",$set_word,FILE_APPEND);
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
    <form action="player2.php" method="post" class="replay_bt">
      <input type="submit" name="player2" value="もう一度遊ぶ">
    </form>
  </div>
  <!-- カーソルをあらかじめセットしておく -->
  <script>document.getElementById('word2').focus();</script>
</body>
</html>
