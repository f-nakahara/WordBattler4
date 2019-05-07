<?php
$hp=0;
if(isset($_POST["player2"])){
  $enemy_list=array("enemy/enemy01.txt","enemy/enemy02.txt","enemy/enemy03.txt");
  shuffle($enemy_list);
  $select_enemy=array_rand($enemy_list,1);
  file_put_contents("p2_word.txt","");
  $boss=file_get_contents($enemy_list[$select_enemy]);
  file_put_contents("enemy/HitPoint.txt",$boss);
}
$enemy_hp=file_get_contents("enemy/HitPoint.txt");
if((isset($_POST["word2"])) && ($_POST["word2"] != "")){
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

  <link rel="stylesheet" href="stylesheet/enemy.css">
  <link rel="stylesheet" href="stylesheet/player_stylesheet.css">
  <title>プレイヤー2</title>
</head>
<body>
  <div class="header">
    <h1>プレイヤー2</h1>
    <p>お題に近い言葉を入力してください</p>

  </div>
  <div class="game_clear">
    <?php if($hp==1){
      echo "GAME CLEAR!!";
    }
    ?>
  </div>
  <div class="enemy_hp" id="enemy_hp"></div>

  <div class="main">
    <form action="player2.php"  method="post">
      <input type="text" name="word2" id="word2">
      <input type="submit" value="送信">
    </form>
  </div>

  <?php
  if((isset($_POST["word2"])) && ($_POST["word2"]) != ""){
    $set_word=$_POST["word2"]."<br>";
    file_put_contents("p2_word.txt",$set_word,FILE_APPEND);
    echo '<div class="input_word">入力したワード：'.$set_word.'</div>' ;
  }
  ?>

  <div class="button">
    <form action="game_home.html" class="home_bt">
      <input type="submit" value="ホームに戻る">
    </form>
    <form action="player2.php" method="post" class="replay_bt">
      <input type="submit" name="player2" value="もう一度遊ぶ">
    </form>
  </div>

  <script>
  document.getElementById('word2').focus();
  </script>
  <script>
  $(function(){
    setInterval(function(){
      $.ajax({
        url:"ajax.php",
        type:"POST",
        data:{
          "id":"enemy_hp"
        }
      })
      .done((data)=>{
        $("#enemy_hp").html(data);
        console.log(data);
      });
    },100);
  });
  </script>

</body>
</html>
