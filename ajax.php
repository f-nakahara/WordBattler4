<?php
require "class/stage.php";

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
  case 'p1_set_word':
    p1_set_word();
    break;
  case 'p2_set_word':
    p2_set_word();
    break;
  case "p1_init":
    p1_init_process();
    break;
  case "p2_init":
    p2_init_process();
    break;

}


//初期処理
function p1_init_process(){
  //プレイヤー選択画面、またはもう一度遊ぶボタンを押したら
  if(isset($_POST["player1"]) || (isset($_POST["next_stage"]))){

    //ステージの設定
    if(isset($_POST["player1"])){
      $stage = new Stage(1);
    }
    if(isset($_POST["next_stage"])){
      $stage = new Stage(2);
    }
    if(isset($_POST["third"])){
      $stage = new Stage(3);
    }
    //テキストファイルの初期化
    file_put_contents("p1_word.txt","");
  }

}

function p2_init_process(){
  //プレイヤー選択画面、またはもう一度遊ぶボタンを押したら
  if(isset($_POST["player2"]) || (isset($_POST["next_stage"]))){

    //ステージの設定
    if(isset($_POST["player2"])){
      $stage = new Stage(1);
    }
    if(isset($_POST["next_stage"])){
      $stage = new Stage(2);
    }
    if(isset($_POST["third"])){
      $stage = new Stage(3);
    }
    //テキストファイルの初期化
    file_put_contents("p2_word.txt","");
  }

}

//プレイヤー1の入力したワードをp1_word.txtに追加
function p1_set_word(){
  if((isset($_POST["word1"])) && ($_POST["word1"]) != ""){
    $set_word=$_POST["word1"]."<br>";
    file_put_contents("p1_word.txt",$set_word,FILE_APPEND);
    // 最後に入力した文字を表示する
    echo '<div class="input_word">入力したワード：'.$set_word.'</div>' ;

    //敵hpの取得
    $enemy_hp=file_get_contents("enemy/HitPoint.txt");
    //敵HPを1減らしてHitPoint.txtを上書き
    file_put_contents("enemy/HitPoint.txt",$enemy_hp-1);

  }
}

//プレイヤー2の入力したワードをp2_word.txtに追加
function p2_set_word(){
  if((isset($_POST["word2"])) && ($_POST["word2"]) != ""){
    $set_word=$_POST["word2"]."<br>";
    file_put_contents("p2_word.txt",$set_word,FILE_APPEND);
    // 最後に入力した文字を表示する
    echo '<div class="input_word">入力したワード：'.$set_word.'</div>' ;

    //敵hpの取得
    $enemy_hp=file_get_contents("enemy/HitPoint.txt");
    //敵HPを1減らしてHitPoint.txtを上書き
    file_put_contents("enemy/HitPoint.txt",$enemy_hp-1);

  }
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
