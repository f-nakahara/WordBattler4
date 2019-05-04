<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="stylesheet/chat_stylesheet.css">
  <title>観戦モード</title>
</head>
<body>
  <div class="header">
    <h1>観戦モード</h1>
    <p>入力された文字を表示していきます。</p>
    <a href="http://localhost/wordbattler_test/game_home.html">ホームに戻る</a>
  </div>
  <div class="main">
    <div class="player1_chat">
      <h2>プレイヤー1</h2>
      <div id="player1"></div>
    </div>
      <script>
      $(function(){
        setInterval(function(){
          $.ajax({
            url:"read_P1_word.php",
          })
          .done((data)=>{
            $("#player1").html(data);
            console.log(data);

          })
          .fail((data)=>{
            $('#player').html("muri");

            console.log(data);
          })
          .always((data)=>{

          });
        },100);
      });
      </script>


    <div class="player2_chat">
      <h2>プレイヤー2</h2>
      <div id="player2"></div>
    </div>
      <script>
      $(function(){
        setInterval(function(){
          $.ajax({
            url:"read_P2_word.php",
          })
          .done((data)=>{
            $("#player2").html(data);
            console.log(data);

          })
          .fail((data)=>{
            $('#player').html("muri");

            console.log(data);
          })
          .always((data)=>{

          });
        },100);
      });
      </script>

  </div>
</body>
</html>
