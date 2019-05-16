<?php
require "class/stage.php";

switch ($_POST["id"]) {
  case 'enemy_img':
    read_enemy_img();
    break;
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
  case "check_enemy_hp":
    check_enemy_hp();
    break;
  case "hit_check":
    hit_check();
    break;
  case "set_terms":
    set_terms();
    break;
  case "start_check":
    start_check();
    break;
}

// ゲームスタートできるタイミングかチェック
function start_check(){
  $p1_login=file_get_contents("p1_login.txt");
  $p2_login=file_get_contents("p2_login.txt");
  if($p1_login==1 && $p2_login==1){
    $start_count=file_get_contents("start_count.txt");
    file_put_contents("start_count.txt",$start_count+1);
    $start_count=file_get_contents("start_count.txt");
    if($start_count==2){
      file_put_contents("start_count.txt",0);
      file_put_contents("p1_login.txt",0);
      file_put_contents("p2_login.txt",0);
    }
    echo true;
  }
  else{
    echo false;
  }

}

// クリア条件の提示
function set_terms(){
  $stage=file_get_contents("enemy/stage.txt");
  if($stage==2){
    echo 10;
  }
  else if($stage==3){
    echo 20;
  }
  else{
    echo 30;
  }
}

//攻撃が有効か判定する
function hit_check(){
  if((isset($_POST["word1"]) && $_POST["word1"] != "") || (isset($_POST["word2"]) && $_POST["word2"] != "")){
    echo true;
  }
  else{
    echo false;
  }
}

function check_enemy_hp(){
  //敵HPの読み込み
  $enemy_hp=file_get_contents("enemy/HitPoint.txt");
  if($enemy_hp<=0){
    echo true;
  }
  else{
    echo false;
  }
}

//初期処理
function p1_init_process(){
  file_put_contents("p1_word.txt","");
  file_put_contents("start_count.txt",0);
  file_put_contents("p1_login.txt",0);
  //プレイヤー選択画面、またはもう一度遊ぶボタンを押したら
  if(isset($_POST["player1"])){
    file_put_contents("p1_login.txt",1);
    file_put_contents("enemy/stage.txt",1);
    $stage_info=file_get_contents("enemy/stage.txt");
    $stage = new Stage($stage_info);
    //テキストファイルの初期化
    file_put_contents("p1_word.txt","");

  }

    //ステージの設定
  if(isset($_POST["next_stage"])){
    file_put_contents("p1_login.txt",1);
    file_put_contents("p2_login.txt",1);
    $stage_info=file_get_contents("enemy/stage.txt");
    $stage = new Stage($stage_info);
    //テキストファイルの初期化
    file_put_contents("p1_word.txt","");
    file_put_contents("p2_word.txt","");
  }
}

function p2_init_process(){
  file_put_contents("p2_word.txt","");
  file_put_contents("start_count.txt",0);
  file_put_contents("p2_login.txt",0);

//プレイヤー選択画面、またはもう一度遊ぶボタンを押したら
  if(isset($_POST["player2"])){
    file_put_contents("p2_login.txt",1);
    file_put_contents("enemy/stage.txt",1);
    $stage_info=file_get_contents("enemy/stage.txt");
    $stage = new Stage($stage_info);
    //テキストファイルの初期化
    file_put_contents("p2_word.txt","");

  }

    //ステージの設定
  if(isset($_POST["next_stage"])){
    file_put_contents("p2_login.txt",1);
    file_put_contents("p1_login.txt",1);

    $stage_info=file_get_contents("enemy/stage.txt");
    $stage = new Stage($stage_info);
    //テキストファイルの初期化
    file_put_contents("p2_word.txt","");
    file_put_contents("p1_word.txt","");
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
  $stage_info=file_get_contents("enemy/stage.txt");

  for($i=0; $i<$enemy_hp; $i++){
    echo "■";
  }
  //体力が0以下になったら[GAME CLEAR]の表示
  if($enemy_hp<=0){
    echo "<div class='game_clear'>GAME CLEAR!</div>";
  }
}

// 敵画像の読み込み
function read_enemy_img(){
    $enemy_img=file_get_contents("enemy/enemy_img.txt");
    echo '<image src='.$enemy_img.' width="60%" height="60%">';
}

?>
