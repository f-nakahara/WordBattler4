var hit = 0;

function check_enemy_hp() {
  $.ajax({
      url: "php/ajax.php",
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


function hit_damage($speed) {
  $.ajax({
    url:"php/ajax.php",
    type:"POST",
    data:{
      "id": "hit_check"
    }
  })
  .done((data)=>{
    if(data){
      $("#enemy_img").fadeOut($speed, function() {
        $(this).fadeIn($speed, function() {
          $(this).fadeOut($speed, function() {
            $(this).fadeIn($speed)
          });
        })
      });
    }
  });
}


$(function() {


  setInterval(function() {
    // 敵の体力が0になったかチェック
    check_enemy_hp();

    // ダメージを与えたときのモーション
    hit_damage(80);
  }, 100);
});
