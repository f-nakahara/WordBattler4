<?php
  class Stage{
    public static $count=0;
    public function __construct($stage){
      echo self::$count;
      //1番目のステージ
      self::$count++;
      if(self::$count==1){
        $enemy_list=array("enemy/first_enemy/enemy01.txt","enemy/first_enemy/enemy02.txt");
        shuffle($enemy_list);
        $enemy_info=array_rand($enemy_list,1);
        $select_enemy=file_get_contents($enemy_list[$enemy_info]);
        file_put_contents("enemy/HitPoint.txt",$select_enemy);
      }

      //2番目のステージ
      if(self::$count==2){
        $enemy_list=array("enemy/second_enemy/enemy01.txt","enemy/second_enemy/enemy02.txt");
        shuffle($enemy_list);
        $enemy_info=array_rand($enemy_list,1);
        $select_enemy=file_get_contents($enemy_list[$enemy_info]);
        file_put_contents("enemy/HitPoint.txt",$select_enemy);
      }

      //3番目のステージ
      if($stage==3){
        $enemy_list=array("enemy/third_enemy/enemy01.txt","enemy/third_enemy/enemy02.txt");
        shuffle($enemy_list);
        $enemy_info=array_rand($enemy_list,1);
        $select_enemy=file_get_contents($enemy_list[$enemy_info]);
        file_put_contents("enemy/HitPoint.txt",$select_enemy);
      }
      }
    }


?>
