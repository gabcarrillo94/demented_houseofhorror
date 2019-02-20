<?php

require_once('Models/Session98128.php');
require_once('Models/AdminPanel.php');

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    ///echo $password;
    $session = new Session98128();
    $session->demen_session_start();

    if($email == 'dementedhaunt@gmail.com')
    {
        if($password == 'b2428a3aa2c94e57b85d731c87018419736070121659caec0ee841a24021e582b4f6402faef67cc84e75531ba1e8a8b45a19a8c0ff98fdfdf5fc0618fb301874')
        {
          $user_browser = $_SERVER['HTTP_USER_AGENT'];
          //  Protección XSS ya que podríamos imprimir este valor.

          // Protección XSS ya que podríamos imprimir este valor.
          $email = preg_replace("/[^a-zA-Z0-9_\-]+/",
                                                      "",
                                                      $email);
          $_SESSION['email'] = $email;
          $_SESSION['login_string'] = hash('sha512',
                    $_POST['password'] . $user_browser);

            header('Location:dashboard.php');
        }
        else {
             header('Location:login658_panel.php?error=2');
        }
    }
    else {
        header('Location:login658_panel.php?error=1');
    }
    //$session = new Session98128();
    //$session->demen_session_start();

    //$admin = new AdminPanel();
    //echo $admin->auth($email, $password);

  //   if ($admin->auth($email, $password) == true) {
  //     // Inicio de sesión exitosa
  //     header('Location:dashboard.php');
  // } else {
  //     // Inicio de sesión exitosa
  //     header('Location:login658_panel.php?error=1');
  // }

}
?>
