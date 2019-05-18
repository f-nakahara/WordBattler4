function p1_init_process() {
  $("#p1_replay").on("click", function(event) {
    $.ajax({
        url: "php/ajax.php",
        type: "POST",
        data: {
          "id": "p1_login_check"
        }
      })
      .done((data) => {
        if (data) {

          $.ajax({
              url: "php/ajax.php",
              type: "POST",
              data: {
                "id": "p1_init"
              }
            })
            .done((data) => {

            });
        } else {
          alert("他のプレイヤーがプレイ中です！");
          window.location.href="game_home.html";
        }
      });
  });

}

function p2_init_process() {
  $("#p2_replay").on("click", function(event) {
    $.ajax({
        url: "php/ajax.php",
        type: "POST",
        data: {
          "id": "p2_login_check"
        }
      })
      .done((data) => {
        if (data) {

          $.ajax({
              url: "php/ajax.php",
              type: "POST",
              data: {
                "id": "p2_init"
              }
            })
            .done((data) => {

            });
        } else {
          alert("他のプレイヤーがプレイ中です！");
          window.location.href="game_home.html";
        }
      });
  });

}

$(function() {
  p1_init_process();
  p2_init_process();

});
