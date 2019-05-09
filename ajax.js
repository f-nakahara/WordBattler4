//敵の体力を表示する
$(function(){
  setInterval(function(){
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
  },100);
});

//プレイヤー1のテキストファイルを読み込んで表示する
$(function(){
  setInterval(function(){
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
  },100);
});

//プレイヤー2のテキストファイルを読み込んで表示する
$(function(){
  setInterval(function(){
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
  },100);
});

$(function(){
  ("#word1").on("click",function(){
    $.ajax({
      url:"ajax.php",
      type:"POST",
      data:{
        "id":"set_P1_word",
        "word1":$("#word1").val()
      }
    })
  });
});
