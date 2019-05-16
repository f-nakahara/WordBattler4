<?php


  class Stage{

    public function __construct($stage_info){
      //1番目のステージ
      if($stage_info==1){
        $select_enemy=file_get_contents("../enemy/first_enemy/enemy01.txt");
        $select_enemy_img=("enemy/first_enemy/enemy01.png");
        file_put_contents("../enemy/HitPoint.txt",$select_enemy);
        file_put_contents("../enemy/stage.txt",2);
        file_put_contents("../enemy/enemy_img.txt",$select_enemy_img);
      }

      //2番目のステージ
      if($stage_info==2){
        $select_enemy=file_get_contents("../enemy/second_enemy/enemy01.txt");
        $select_enemy_img=("enemy/second_enemy/enemy01.png");
        file_put_contents("../enemy/HitPoint.txt",$select_enemy);
        file_put_contents("../enemy/stage.txt",3);
        file_put_contents("../enemy/enemy_img.txt",$select_enemy_img);
      }

      //3番目のステージ
      if($stage_info==3){
        $select_enemy=file_get_contents("../enemy/third_enemy/enemy01.txt");
        $select_enemy_img=("enemy/third_enemy/enemy01.png");
        file_put_contents("../enemy/HitPoint.txt",$select_enemy);
        file_put_contents("../enemy/stage.txt",4);
        file_put_contents("../enemy/enemy_img.txt",$select_enemy_img);
      }
    }
  }


?>
