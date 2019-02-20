<?php
/**
 *
 */

include_once('Model.php');

class AdminPanel extends Model
{

  public static $name_table = 'users';

  function __construct()
  {
    parent::__construct();
  }

  public function auth ($email, $password)
  {
    // Usar declaraciones preparadas significa que la inyección de SQL no será posible.
    if ($stmt = $this->conection->prepare("SELECT email, password
        FROM `".self::$name_table."`
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Une “$email” al parámetro.
        $stmt->execute();    // Ejecuta la consulta preparada.
        $stmt->store_result();

        // Obtiene las variables del resultado.
        $stmt->bind_result($username, $db_password);
        $stmt->fetch();

        // Hace el hash de la contraseña con una sal única.
        $password = hash('sha512', $password);
        if ($stmt->num_rows == 1) {
            // Si el usuario existe, revisa si la cuenta está bloqueada
            // por muchos intentos de conexión.

            if (false) {
                // La cuenta está bloqueada.
                // Envía un correo electrónico al usuario que le informa que su cuenta está bloqueada.
                return false;
            } else {
                // Revisa que la contraseña en la base de datos coincida
                // con la contraseña que el usuario envió.
                if ($db_password == $password) {
                    // ¡La contraseña es correcta!
                    // Obtén el agente de usuario del usuario.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    //  Protección XSS ya que podríamos imprimir este valor.

                    // Protección XSS ya que podríamos imprimir este valor.
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                                                                "",
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512',
                              $password . $user_browser);
                    // Inicio de sesión exitoso
                    return true;
                } else {                    // La contraseña no es correcta.
                    return false;
                }
            }
        } else {
            // El usuario no existe.
            return false;
        }
    }

  }
}


 ?>
