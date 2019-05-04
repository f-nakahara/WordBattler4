<?php
  if(isset($_POST["player2"])){
    file_put_contents("p2_word.txt","");
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">


  <link rel="stylesheet" href="stylesheet/player_stylesheet.css">
  <title>プレイヤー2</title>
</head>
<body>
  <div class="header">
    <h1>プレイヤー2</h1>
    <p>お題に近い言葉を入力してください</p>
    <a href="http://localhost/wordbattler_test/game_home.html">ホームに戻る</a>
  </div>
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

  <script>
    document.getElementById('word2').focus();
  </script>


</body>
</html>
