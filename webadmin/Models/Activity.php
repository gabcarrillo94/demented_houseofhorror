<?php

/**
 *
 */
include_once('Model.php');

class Activity extends Model
{
  public static $name_table = 'activities';

  function __construct()
  {
    parent::__construct();
    # code...
  }

  public function getAll()
  {
      $array_return = array();
      $c = 0;

      $response = $this->query("SELECT * FROM `".self::$name_table."`");

      if(!empty($response)){
        while($value = mysqli_fetch_assoc($response)){
            $array_return[$c++] = $value;
        }
        return $array_return;
      }

  } 

  public function save ($data)
  {

      return $this->query("insert into `".self::$name_table."` (`name`, `open_work`) values ('". $data["name"] ."', '". $data["open_work"] ."')");

  }

  public function lastItem () {
      $array_return = array();
      $c = 0;

      $response =  $this->query("SELECT * FROM `".self::$name_table."` ORDER BY `id` DESC");

      if(!empty($response)){
        while($value = mysqli_fetch_assoc($response)){
            $array_return[$c++] = $value;
        }
        return $array_return;
      }

  }

  public function getAllWithFunctions ()
  {
    $array_return = array();
    $c = 0;

    $response =  $this->query("SELECT * from `".self::$name_table."` INNER JOIN `functions` on ".self::$name_table.".id=functions.activity_id");

    if(!empty($response)){
      while($value = mysqli_fetch_assoc($response)){
          $array_return[$c++] = $value;
      }
      return $array_return;
    }
  }

}
