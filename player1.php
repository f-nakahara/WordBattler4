<?php
$hp=0;
if(isset($_POST["player1"])){
  $enemy_list=array("enemy/enemy01.txt","enemy/enemy02.txt","enemy/enemy03.txt");
  shuffle($enemy_list);
  $select_enemy=array_rand($enemy_list,1);
  file_put_contents("p1_word.txt","");
  $boss=file_get_contents($enemy_list[$select_enemy]);
  file_put_contents("enemy/HitPoint.txt",$boss);
}
$enemy_hp=file_get_contents("enemy/HitPoint.txt");
if((isset($_POST["word1"])) && ($_POST["word1"] != "")){
    file_put_contents("enemy/HitPoint.txt",$enemy_hp-1);
}
  $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  if($enemy_hp<=0){
    $hp=1;
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

  <div class="enemy_hp" id="enemy_hp">
    <?php
    $enemy_hp=file_get_contents("enemy/HitPoint.txt");
    for($i=0; $i<$enemy_hp; $i++){
      echo "■";
    }
     ?>
  </div>
  <div class="main">
    <form action="player1.php"  method="post">
      <input type="text" name="word1" id="word1">
      <input type="submit"  value="送信">
    </form>
  </div>

  <?php
  if((isset($_POST["word1"])) && ($_POST["word1"] != "")){
    $set_word=$_POST["word1"]."<br>";
    file_put_contents("p1_word.txt",$set_word,FILE_APPEND);
    echo '<div class="input_word">入力したワード：'.$set_word.'</div>' ;
  }
  ?>
  <div class="button">
    <form action="game_home.html" class="home_bt">
      <input type="submit" value="ホームに戻る">
    </form>
    <form action="player1.php" method="post" class="replay_bt">
      <input type="submit" name="player1" value="もう一度遊ぶ">
    </form>
  </div>

  <script>document.getElementById('word1').focus();</script>
</body>
</html>
