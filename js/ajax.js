function set_terms() {
  var time = 0;
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "start_check"
        }
      })
      .done((data) => {
        if (data) {
          $("#word1").prop("disabled", true);
          $("#word2").prop("disabled", true);
          setTimeout(function() {
            $("#terms")
              .animate({
                opacity: 1
              }, 2000)
              .animate({
                opacity: 1
              }, 1000)
              .animate({
                opacity: 0
              }, 2000)
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                  "id": "set_terms"
                }
              })
              .done((data) => {
                $("#terms").html(data + "秒以内に敵を倒せ！");
                time = Number(data);
              });
          }, 1000);
          setTimeout(function() {
            $("#word1").prop("disabled", false);
            $("#word2").prop("disabled", false);
            p1_set_cursor();
            p2_set_cursor();
            var timeLimit = setInterval(function() {
              $("#timer").html(time.toFixed(1));
              time -= 0.1;
              if (time < 5) {
                $("#timer").css({
                  "color": "red",
                  "font-weight": "bold"
                });
                $("#timer").animate({
                  "font-size": "400%",
                  "width": "12%"
                }, 5000);
              }
              if (time < 0.0) {
                clearInterval(timeLimit);
                $("#timer").html("時間切れ");
                $("#word1").prop("disabled", true);
                $("#word2").prop("disabled", true);
              }
              $.ajax({
                url:"ajax.php",
                type:"POST",
                data:{
                  "id":"check_enemy_hp"
                }
              })
              .done((data)=>{
                if(data){
                  clearInterval(timeLimit);
                  $("#word1").prop("disabled", true);
                  $("#word2").prop("disabled", true);
                  set_terms();
                }
              })
            }, 100);
          }, 6000);
        }
        else{
          set_terms();
        }
      });
}

function next_stage() {
  $(function() {
    $("#next_stage").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
          url: "ajax.php",
          type: "POST",
          data: {
            "id": "p1_init",
            "next_stage": "next_stage"
          }
        })
        .done((data) => {

        });
    });
  });
}

function set_next_bt() {
  $.ajax({
      url: "ajax.php",
      type: "POST",
      data: {
        "id": "check_enemy_hp",
      }
    })
    .done((data) => {
      if (data) {
        $("#next").prop("disabled", false);
      } else {
        $("#next").prop("disabled", true);
      }
    });
}

function set_enemy_hp() {
  $.ajax({
      url: "ajax.php",
      type: "POST",
      data: {
        "id": "enemy_hp"
      }
    })
    .done((data) => {
      $("#enemy_hp").html(data);
      console.log(data);

    });
}

function set_enemy_img() {
  $.ajax({
      url: "ajax.php",
      type: "POST",
      data: {
        "id": "enemy_img"
      }
    })
    .done((data) => {
      $("#enemy_img").html(data);
      console.log(data);

    });
  $("#enemy_img").show();
}

function chat_process(){
  $("#chat").on("submit",function(event){
    event.preventDefault();
  })
}

function p1_init_process() {
  $("#p1_replay").on("submit", function(event) {
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "p1_init",
          "player1": "player1"
        }
      })
      .done((data) => {

      });

  });
  $("#p1_home").on("submit", function(event) {
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "p1_init"
        }
      })
      .done((data) => {

      });
  });
}

function p2_init_process() {
  $("#p2_replay").on("submit", function(event) {

    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "p2_init",
          "player2": "player2"
        }
      })
      .done((data) => {

      });
  });
  $("#p2_home").on("submit", function(event) {
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "p2_init"
        }
      })
      .done((data) => {

      });
  });
}

function p1_set_word() {
  $("#p1_set_word").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "p1_set_word",
          "word1": $("#word1").val()
        }
      })
      .done((data) => {
        $(this)[0].reset();
        $("#p1_input_word").html(data);
      });
  });
}

function p2_set_word() {
  $("#p2_set_word").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "p2_set_word",
          "word2": $("#word2").val()
        }
      })
      .done((data) => {
        $(this)[0].reset();
        $("#p2_input_word").html(data);
      });
  });
}

function p1_set_cursor() {
  $(function() {
    document.getElementById('word1').focus();
  });
}

function p2_set_cursor() {
  $(function() {
    document.getElementById('word2').focus();
  });
}

function read_p1_word() {
  $.ajax({
      url: "ajax.php",
      type: "POST",
      data: {
        "id": "read_p1_word"
      }
    })
    .done((data) => {
      $("#player1").html(data);
      console.log(data);
    });
}

function read_p2_word() {
  $.ajax({
      url: "ajax.php",
      type: "POST",
      data: {
        "id": "read_p2_word"
      }
    })
    .done((data) => {
      $("#player2").html(data);
      console.log(data);
    });
}



$(function() {
  //敵情報の取得や、テキストファイルの初期化
  p1_init_process();
  p2_init_process();


  //プレイヤーの画面にあらかじめカーソルをセットしておく
  p1_set_cursor();
  p2_set_cursor();



  //プレイヤーの入力したワードをセットする
  p1_set_word();
  p2_set_word();

  //敵の体力を表示。0以下の場合はGAME CLEARを表示。
  set_enemy_hp();

  check_enemy_hp();
  // 敵画像の表示
  set_enemy_img();


  // 次のステージを表示する
  next_stage();

  // クリア条件の提示
  set_terms();

  //100ms毎に実行。他の画面で更新した内容をリアルタイムで表示するため。
  setInterval(function() {

    //敵の体力を表示。0以下の場合はGAME CLEARを表示。
    set_enemy_hp();

    // 敵画像の表示
    set_enemy_img();

    //次へ進むボタンを有効にする
    set_next_bt();

    //プレイヤーのテキストファイルを読み込んで表示する
    read_p1_word();
    read_p2_word();
  }, 100);
});
