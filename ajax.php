<?php
$id=$_POST["id"];

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


function read_p2_word(){
  $file_player2=file_get_contents("p2_word.txt");
  echo $file_player2;
}

function read_p1_word(){
  $file_player1=file_get_contents("p1_word.txt");
  echo $file_player1;
}


function read_hp(){
  $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  for($i=0; $i<$enemy_hp; $i++){
    echo "■";
  }
  if($enemy_hp<=0){
    echo "<div class='game_clear'>GAME CLEAR!</div>";
  }
}

?>
