function audioBGM(){
  document.getElementById("battle_bgm").currentTime=0;
  document.getElementById("battle_bgm").loop=true;
  document.getElementById("battle_bgm").play();
}

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
      document.getElementById("atack_sound").currentTime=0;
      document.getElementById("atack_sound").play();
      $("#enemy_img").fadeOut($speed, function() {
        $(this).fadeIn($speed, function() {
          $(this).fadeOut($speed, function() {
            $(this).fadeIn($speed)
          });
        });
      });
    }
  });
}

// BGMの再生
window.onload=function(){
  audioBGM();
}

$(function() {

  setInterval(function() {
    // 敵の体力が0になったかチェック
    check_enemy_hp();

    // ダメージを与えたときのモーション
    hit_damage(80);
  }, 100);
});
