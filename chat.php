
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="stylesheet/enemy.css">
  <link rel="stylesheet" href="stylesheet/chat_stylesheet.css">
  <title>観戦モード</title>
</head>
<body>
  <div class="header">
    <h1>観戦モード</h1>
    <p>各プレイヤーの入力文字を表示します</p>
    <form action="game_home.html" class="home_bt">
      <input type="submit" value="ホームに戻る">
    </form>
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
          url:"ajax.php",
          type:"POST",
          data:{
            "id":"read_p1_word"
          }
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
    <div id="enemy_hp" class="enemy_hp"></div>

    <div class="player2_chat">
      <h2>プレイヤー2</h2>
      <div id="player2"></div>
    </div>
    <script>
    $(function(){
      setInterval(function(){
        $.ajax({
          url:"ajax.php",
          type:"POST",
          data:{
            "id":"read_p2_word"
          }
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

  </div>
</body>

</html>
