<?php
  if(isset($_POST["player1"])){
    file_put_contents("p1_word.txt","");
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">


  <link rel="stylesheet" href="stylesheet/player_stylesheet.css">
  <title>プレイヤー1</title>
</head>
<body>
  <div class="header">
    <h1>プレイヤー1</h1>
    <p>お題に近い言葉を入力してください</p>
    <a href="http://localhost/wordbattler_test/game_home.html">ホームに戻る</a>
  </div>
  <div class="main">
    <form action="player1.php"  method="post">
      <input type="text" name="word1" id="word1">
      <input type="submit" value="送信">
    </form>
  </div>

  <?php
    if((isset($_POST["word1"])) && ($_POST["word1"] != "")){
      $set_word=$_POST["word1"]."<br>";
      file_put_contents("p1_word.txt",$set_word,FILE_APPEND);
      echo '<div class="input_word">入力したワード：'.$set_word.'</div>' ;
    }
  ?>

  <script>
    document.getElementById('word1').focus();
  </script>


</body>
</html>
