var hit = 0;

function check_enemy_hp() {
  $.ajax({
      url: "ajax.php",
      type: "POST",
      data: {
        "id": "check_enemy_hp",
      }
    })
    .done((data) => {
      if (data) {
        $("#enemy_img").hide(1000);
      }
    });
}

function hit_check() {
  $("#p1_set_word").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "hit_check",
          "word1": $("#word1").val()
        }
      })
      .done((data) => {
        if (data) {
          hit = 1;
          $("#enemy_img").fadeOut($speed, function() {
            $(this).fadeIn($speed, function() {
              $(this).fadeOut($speed, function() {
                $(this).fadeIn($speed)
              });
            })
          });
        }
      });
  });
  $("#p2_set_word").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data: {
          "id": "hit_check",
          "word2": $("#word2").val()
        }
      })
      .done((data) => {
        if (data) {
          hit = 1;
          $("#enemy_img").fadeOut($speed, function() {
            $(this).fadeIn($speed, function() {
              $(this).fadeOut($speed, function() {
                $(this).fadeIn($speed)
              });
            })
          });
        }
      });
  });
}

function hit_damage($speed) {
  if (hit == 1) {
    $("#enemy_img").fadeOut($speed, function() {
      $(this).fadeIn($speed, function() {
        $(this).fadeOut($speed, function() {
          $(this).fadeIn($speed)
        });
      })
    });
    hit = 0;
  }
}


$(function() {
  // 攻撃が成功したかチェック
  hit_check();

  setInterval(function() {
    // 敵の体力が0になったかチェック
    check_enemy_hp();

    // ダメージを与えたときのモーション
    hit_damage(80);
  }, 100);
});
