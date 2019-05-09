<?php
switch ($_POST["id"]) {
  case 'enemy_hp':
    read_hp();
    break;
  case 'read_p1_word':
    read_p1_word();
    break;
  case 'read_p2_word':
    read_p2_word();
    break;

}


//プレイヤー2の入力したワードの表示
function read_p2_word(){
  $file_player2=file_get_contents("p2_word.txt");
  echo $file_player2;
}

//プレイヤー1の入力したワードを表示
function read_p1_word(){
  $file_player1=file_get_contents("p1_word.txt");
  echo $file_player1;
}

//敵体力の表示
function read_hp(){
  $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  for($i=0; $i<$enemy_hp; $i++){
    echo "■";
  }
  //体力が0以下になったら[GAME CLEAR]の表示
  if($enemy_hp<=0){
    echo "<div class='game_clear'>GAME CLEAR!</div>";
  }
}

?>
