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

if((isset($_POST["word2"])) && ($_POST["word2"]) != ""){
  $set_word=$_POST["word2"]."<br>";
  file_put_contents("p2_word.txt",$set_word,FILE_APPEND);
  echo '<div class="input_word">入力したワード：'.$set_word.'</div>' ;
}

  $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  if($enemy_hp<=0){
    $hp=1;
  }


  $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  for($i=0; $i<$enemy_hp; $i++){
    echo "■";
  }



?>
