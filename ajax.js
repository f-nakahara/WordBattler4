function p1_next_stage(){
  $(function(){
    $("#p1_next_stage").on("submit",function(event){
      event.preventDefault()
      $.ajax({
        url:"ajax.php",
        type:"POST",
        data:{
          "id":"p1_init",
          "next_stage":$("#next_stage").val()
        }
      })
      .done((data)=>{

      });
    });
  });
}

function set_enemy_hp(){
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
}

function p1_init_process(){
  $(function(){
    $("#p1_replay").on("submit",function(event){
      $.ajax({
        url:"ajax.php",
        type:"POST",
        data:{
          "id":"p1_init",
          "player1":$("#player1").val()
        }
      })
      .done((data)=>{

      });
    });
  });
}
function p2_init_process(){
  $(function(){
    $("#p2_replay").on("submit",function(event){

      $.ajax({
        url:"ajax.php",
        type:"POST",
        data:{
          "id":"p2_init",
          "player2":$("#player2").val()
        }
      })
      .done((data)=>{

      });
    });
  });
}

function p1_set_word(){
  $(function(){
    $("#p1_set_word").on("submit",function(event){
      event.preventDefault();
      $.ajax({
        url:"ajax.php",
        type:"POST",
        data:{
          "id":"p1_set_word",
          "word1":$("#word1").val()
        }
      })
      .done((data)=>{
        $(this)[0].reset();
        $("#p1_input_word").html(data);
      });
    });
  });
}
function p2_set_word(){
  $(function(){
    $("#p2_set_word").on("submit",function(event){
      event.preventDefault();
      $.ajax({
        url:"ajax.php",
        type:"POST",
        data:{
          "id":"p2_set_word",
          "word2":$("#word2").val()
        }
      })
      .done((data)=>{
        $(this)[0].reset();
        $("#p2_input_word").html(data);
      });
    });
  });
}

function p1_set_cursor(){
  $(function(){
    document.getElementById('word1').focus();
  })
}
function p2_set_cursor(){
  $(function(){
    document.getElementById('word2').focus();
  })
}

function read_p1_word(){
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
}
function read_p2_word(){
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
}



$(function(){
  //敵情報の取得や、テキストファイルの初期化
  p1_init_process();
  p2_init_process();

  p1_next_stage();

  //プレイヤーの画面にあらかじめカーソルをセットしておく
  p1_set_cursor();
  p2_set_cursor();

  //プレイヤーの入力したワードをセットする
  p1_set_word();
  p2_set_word();

  //敵の体力を表示。0以下の場合はGAME CLEARを表示。
  set_enemy_hp();

  //100ms毎に実行。他の画面で更新した内容をリアルタイムで表示するため。
  setInterval(function(){

    //敵の体力を表示。0以下の場合はGAME CLEARを表示。
    set_enemy_hp();

    //プレイヤーのテキストファイルを読み込んで表示する
    read_p1_word();
    read_p2_word();
  },100);
});
