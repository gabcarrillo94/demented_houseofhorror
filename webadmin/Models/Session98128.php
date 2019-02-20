<?php

/**
 *
 */
include_once('Model.php');

class Session98128 extends Model
{

  function __construct()
  {
    parent::__construct();
    # code...
  }

  public function demen_session_start() {
     $session_name = 'demen_session_id';   // Configura un nombre de sesión personalizado.
    // $secure = true;
    // // Esto detiene q// $session_name = 'demen_session_id';   // Configura un nombre de sesión personalizado.
    // $secure = true;
    // // Esto detiene que JavaScript sea capaz de acceder a la identificación de la sesión.
    // $httponly = true;
    // // Obliga a las sesiones a solo utilizar cookies.
    // if (ini_set('session.use_only_cookies', 1) === FALSE) {
    //     exit();
    // }
    // // Obtiene los params de los cookies actuales.
    // $cookieParams = session_get_cookie_params();
    // session_set_cookie_params($cookieParams["lifetime"],
    //     $cookieParams["path"],
    //     $cookieParams["domain"],
    //     $secure,
    //     $httponly);ue JavaScript sea capaz de acceder a la identificación de la sesión.
    // $httponly = true;
    // // Obliga a las sesiones a solo utilizar cookies.
    // if (ini_set('session.use_only_cookies', 1) === FALSE) {
    //     exit();
    // }
    // // Obtiene los params de los cookies actuales.
    // $cookieParams = session_get_cookie_params();
    // session_set_cookie_params($cookieParams["lifetime"],
    //     $cookieParams["path"],
    //     $cookieParams["domain"],
    //     $secure,
    //     $httponly);
    // Configura el nombre de sesión al configurado arriba.
    session_name($session_name);
    session_start();            // Inicia la sesión PHP.
    session_regenerate_id();    // Regenera la sesión, borra la previa.
}

public function close_session ()
{
  $this->demen_session_start();

    // // Desconfigura todos los valores de sesión.
    // $_SESSION = array();
    //
    // // Obtiene los parámetros de sesión.
    // $params = session_get_cookie_params();
    //
    // // Borra el cookie actual.
    // setcookie(session_name(),
    //         '', time() - 42000,
    //         $params["path"],
    //         $params["domain"],
    //         $params["secure"],
    //         $params["httponly"]);

    // Destruye sesión.
    session_destroy();
    header('Location:login658_panel.php');
}

}
