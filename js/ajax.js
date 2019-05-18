function set_terms() {
  var time = 0;
  var term;
  var count = 0;
  $.ajax({
      url: "php/ajax.php",
      type: "POST",
      data: {
        "id": "start_check"
      }
    })
    .done((data) => {
      if (data) {
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
              url: "php/ajax.php",
              type: "POST",
              data: {
                "id": "set_terms"
              }
            })
            .done((data) => {
              $("#terms").html(data);
              time = parseInt(data, 10);
              term = data;
            });
        }, 1000);

        setTimeout(function() {
          $("#word1").prop("disabled", false);
          $("#word2").prop("disabled", false);
          p1_set_cursor();
          p2_set_cursor();
          if (term.match(/秒/)) {
            var timeLimit = setInterval(function() {

              $("#counter").html(time.toFixed(1));
              time -= 0.1;
              if (time < 5) {
                $("#counter").css({
                  "color": "red",
                  "font-weight": "bold"
                });
              }
              if (time < 0.0) {
                clearInterval(timeLimit);
                $("#counter").html("時間切れ");
                $("#word1").prop("disabled", true);
                $("#word2").prop("disabled", true);
                set_terms();
              }
              $.ajax({
                  url: "php/ajax.php",
                  type: "POST",
                  data: {
                    "id": "check_enemy_hp"
                  }
                })
                .done((data) => {
                  if (data) {
                    $("#counter").css({
                      "color": "rgb(51, 174, 233)",
                      "font-weight": "normal"
                    });
                    clearInterval(timeLimit);
                    $("#word1").prop("disabled", true);
                    $("#word2").prop("disabled", true);
                    set_terms();
                  } else {
                    // $("#word1").prop("disabled", false);
                    // $("#word2").prop("disabled", false);
                  }
                });
            }, 100);
          } else if (term.match(/回/)) {
            var wordLimit = setInterval(function() {
              $.ajax({
                  url: "php/ajax.php",
                  type: "POST",
                  data: {
                    "id": "attack_count"
                  }
                })
                .done((data) => {
                  count = Number(data);
                  $("#counter").html("残り" + (time - count) + "回");
                  if (time - count <= 0) {
                    clearInterval(wordLimit);
                    $("#word1").prop("disabled", true);
                    $("#word2").prop("disabled", true);
                    set_terms();
                  }
                });
              $.ajax({
                  url: "php/ajax.php",
                  type: "POST",
                  data: {
                    "id": "check_enemy_hp"
                  }
                })
                .done((data) => {
                  if (data) {
                    $("#counter").css({
                      "color": "rgb(51, 174, 233)",
                      "font-weight": "normal"
                    });
                    clearInterval(wordLimit);
                    $("#word1").prop("disabled", true);
                    $("#word2").prop("disabled", true);
                    set_terms();
                  } else {
                    // $("#word1").prop("disabled", false);
                    // $("#word2").prop("disabled", false);
                  }
                });
            }, 500);

          }
        }, 6000);

      }
    });
}

function next_stage() {
  $(function() {
    $("#next_stage").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
          url: "php/ajax.php",
          type: "POST",
          data: {
            "id": "next_stage"
          }
        })
    });
  });
}

function set_next_bt() {
  $.ajax({
      url: "php/ajax.php",
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
      url: "php/ajax.php",
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
      url: "php/ajax.php",
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

function chat_process() {
  $("#chat").on("click", function(event) {
    event.preventDefault();
  })
}


function p1_set_word() {
  $("#p1_set_word").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        url: "php/ajax.php",
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
        url: "php/ajax.php",
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
    $('#word1').focus();
}

function p2_set_cursor() {
    $('#word2').focus();
}

function read_p1_word() {
  $.ajax({
      url: "php/ajax.php",
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
      url: "php/ajax.php",
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

function p1_home() {
  $("#p1_home").on("submit", function(event) {
    $.ajax({
        url: "php/ajax.php",
        type: "POST",
        data: {
          "id": "p1_reset"
        }
      })
  });
}

function p2_home() {
  $("#p2_home").on("submit", function(event) {
    $.ajax({
        url: "php/ajax.php",
        type: "POST",
        data: {
          "id": "p2_reset"
        }
      })
  });
}

function game_reset() {
  $("#reset_bt").on("click", function() {
    $.ajax({
      url:"php/ajax.php",
      type:"POST",
      data:{
        "id":"p1_reset"
      }
    })
    $.ajax({
      url:"php/ajax.php",
      type:"POST",
      data:{
        "id":"p2_reset"
      }
    })
  });
}

$(function() {
  game_reset();

  p1_home();
  p2_home();

  //プレイヤーの画面にあらかじめカーソルをセットしておく
  p1_set_cursor();
  p2_set_cursor();

  //プレイヤーの入力したワードをセットする
  p1_set_word();
  p2_set_word();

  //敵の体力を表示。0以下の場合はGAME CLEARを表示。
  set_enemy_hp();

  // 敵画像の表示
  set_enemy_img();

  // 次のステージを表示する
  next_stage();

  // クリア条件の提示
  set_terms();

  //100ms毎に実行。他の画面で更新した内容をリアルタイムで表示するため。
  setInterval(function() {
    //クリア条件の提示
    set_terms();

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
