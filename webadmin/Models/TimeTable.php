<?php

/**
 *
 */
include_once('Model.php');

class TimeTable extends Model
{

  public static $name_table = 'functions';

  function __construct()
  {
      parent::__construct();
  }

  public function where ($id)
  {
      $array_return = array();
      $c = 0;

      $response = $this->query("SELECT * FROM `".self::$name_table."` WHERE id='". (int)$id ."'");

      if(!empty($response)){
        while($value = mysqli_fetch_assoc($response)){
            $array_return[$c++] = $value;
        }
        return $array_return;
      }

  }

  public function save ($data)
  {
      return $this->query("INSERT INTO `".self::$name_table."` (`activity_id`, `hour_in`, `price`) VALUES ('". $data["activity_id"] ."', '". $data["hour_in"] ."',  '". $data["price"] ."') ");
  }

  public function getAllOfActivity ($activity_id)
  {
      if(!empty($activity_id))
      {
        $array_return = array();
        $c = 0;

        $response = $this->query("SELECT * FROM `".self::$name_table."` WHERE `activity_id`='".(int)$activity_id ."'");

        if(!empty($response)){
          while($value = mysqli_fetch_assoc($response)){
              $array_return[$c++] = $value;
          }
          return $array_return;
        }

      }
      else {
        return false;
      }
  }

  public function updateAvailability ($function_id, $availability)
  {

    if(count($function_id) > 0)
    {

      $response = $this->query("UPDATE `".self::$name_table."` SET `availability`='". (int) $availability ."'  WHERE  `id`='". (int) $function_id ."' ");
      return $response;

    }
    else {
      return false;
    }
  }

}

 ?>
