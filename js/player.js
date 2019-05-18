// 閉じるボタンを押したらプレイヤー情報をリセットする
window.onunload=function(){
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
}
