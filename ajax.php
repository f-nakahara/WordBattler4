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
  case 'set_word2':
    set_word2();
    break;
}

function set_word2(){
  // $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  // if($_POST["word2"] != ""){
  //     file_put_contents("enemy/HitPoint.txt",$enemy_hp-1);
  // }
  // $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  // if($enemy_hp==0){
  //   $hp=1;
  // }
  $set_word=$_POST["word2"]."<br>";
  file_put_contents("p2_word.txt",$set_word,FILE_APPEND);
  echo '入力したワード：'."$set_word" ;
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
}

?>
