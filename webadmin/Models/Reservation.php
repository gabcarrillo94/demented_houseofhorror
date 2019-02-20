<?php

/**
 *
 */
include_once('Model.php');

class Reservation extends Model
{
  public static $name_table = 'reservations';

  function __construct()
  {
      parent::__construct();
  }

  public function getAll()
  {
      $array_return = array();
      $c = 0;

      $response = $this->query("SELECT * FROM `".self::$name_table."` INNER JOIN `functions` on `".self::$name_table."`.function_id=`functions`.id");

      if(!empty($response)){
        while($value = mysqli_fetch_assoc($response)){
            $array_return[$c++] = $value;
        }
        return $array_return;
      }

  }

  public function validateIfExist($data){
    $array_return = array();
    $c = 0;

    $response = $this->query("SELECT * FROM `".self::$name_table."` WHERE `date`='". $data["date"] ."' AND `email_user`='". $data["email_user"] ."' AND `function_id`='". $data["function_id"] ."'");

    if(!empty($response)){
      while($value = mysqli_fetch_assoc($response)){
          $array_return[$c++] = $value;
      }
      return $array_return;
    }

  }

  public function delete($id){
    $array_return = array();
    $c = 0;

    $response = $this->query("DELETE FROM `".self::$name_table."` WHERE id_reservation='".(int) $id."'");

    return $response;

  }


  public function save ($data)
  {
      return $this->query("INSERT INTO `".self::$name_table."` (`function_id`, `date`, `number_people_adult`,
       `number_people_children`, `number_total`, `price_total`, `email_user`, `full_name_user`,
       `phone_number_user`, `status`, `created_at`, `updated_at`)
      VALUES ('". (int)$data["function_id"] ."','". $data["date"] ."','". (int)$data["number_people_adult"] ."',
      '". (int)$data["number_people_children"] ."', '". (int)$data["number_total"] ."', '". (int) $data["price_total"] ."',
      '". $data["email_user"] ."', '". $data["full_name_user"] ."','". $data["phone_number_user"] ."','". (int) 1 ."',
      '". date("Y-m-d H:i:s") ."','". date("Y-m-d H:i:s") ."')");
  }

  public function getNumberReservations()
  {

    return $this->query("SELECT count(*) FROM `".self::$name_table."`");

  }

  public function getReservationsDate( $date )
  {
    $array_return = array();
    $c = 0;

    $response =  $this->query("SELECT * FROM `".self::$name_table."` INNER JOIN `functions` on `".self::$name_table."`.function_id=`functions`.id WHERE `".self::$name_table."`.date='". $date ."'");

    if(!empty($response)){
      while($value = mysqli_fetch_assoc($response)){
          $array_return[$c++] = $value;
      }
      return $array_return;
    }


  }


  public function getAllNumberPeopleReservations ($data)
  {
    $acumulador = 0;

    $response = $this->query("SELECT `number_total` FROM `".self::$name_table."`  INNER JOIN `functions` on `".self::$name_table."`.function_id=`functions`.id WHERE `".self::$name_table."`.date='".$data['date']."'
 AND  `functions`.hour_in='".$data['hour_in']."' ");

    if(!empty($response)){
      while($value = mysqli_fetch_assoc($response)){
          $acumulador = $acumulador + $value['number_total'];
      }
      return $acumulador;
    }
  }


}
