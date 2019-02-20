<?php

/**
 *
 */
class Model
{

  const HOST_NAME = "localhost";
  const USER_NAME = "demented_main";
  const PASSWORD  = "!demenTED2017";
  const DB_NAME   = "demented_book_new";
  protected  $conection = null;
  protected  $_type = 'mysqli';

  function __construct()
  {
      $this->conection = mysqli_connect(self::HOST_NAME, self::USER_NAME, self::PASSWORD,self::DB_NAME) or trigger_error(mysqli_error($this->conection),E_USER_ERROR);
      mysqli_select_db($this->conection,self::DB_NAME);
  }

  public function query ($query)
  {
    if ($this->_type == 'mysqli') {
      $result = mysqli_query($this->conection, $query) or trigger_error(mysqli_error($this->conection),E_USER_ERROR);
    } else {
      $result = mysql_query($query, $this->conection) or exit;
    }
    return $result;

  }

}
