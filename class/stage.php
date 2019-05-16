<?php


  class Stage{

    public function __construct($stage_info){
      //1番目のステージ
      if($stage_info==1){
        $enemy_list=array("enemy/first_enemy/enemy01.txt");
        $enemy_img_list=array("enemy/first_enemy/enemy01.png");
        shuffle($enemy_list);
        $enemy_info=array_rand($enemy_list,1);
        $select_enemy=file_get_contents($enemy_list[$enemy_info]);
        $select_enemy_img=$enemy_img_list[$enemy_info];
        file_put_contents("enemy/HitPoint.txt",$select_enemy);
        file_put_contents("enemy/stage.txt",2);
        file_put_contents("enemy/enemy_img.txt",$select_enemy_img);


      }

      //2番目のステージ
      if($stage_info==2){
        $enemy_list=array("enemy/second_enemy/enemy01.txt");
        $enemy_img_list=array("enemy/second_enemy/enemy01.png");
        shuffle($enemy_list);
        $enemy_info=array_rand($enemy_list,1);
        $select_enemy=file_get_contents($enemy_list[$enemy_info]);
        file_put_contents("enemy/HitPoint.txt",$select_enemy);
        file_put_contents("enemy/stage.txt",3);
        $select_enemy_img=$enemy_img_list[0];
        file_put_contents("enemy/enemy_img.txt",$select_enemy_img);
      }

      //3番目のステージ
      if($stage_info==3){
        $enemy_list=array("enemy/third_enemy/enemy01.txt");
        $enemy_img_list=array("enemy/third_enemy/enemy01.png");
        shuffle($enemy_list);
        $enemy_info=array_rand($enemy_list,1);
        $select_enemy=file_get_contents($enemy_list[$enemy_info]);
        file_put_contents("enemy/HitPoint.txt",$select_enemy);
        file_put_contents("enemy/stage.txt",4);
        $select_enemy_img=$enemy_img_list[0];
        file_put_contents("enemy/enemy_img.txt",$select_enemy_img);
      }
      }
    }


?>
