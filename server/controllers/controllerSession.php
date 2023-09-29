<?php
// require("/xampp/htdocs/accountly/server/session/session.php");
require_once("/xampp/htdocs/accountly/server/models/class_rest.php");
require_once("/xampp/htdocs/accountly/server/models/class_user.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    if (isset($user['action'])) {
        switch ($user['action']) {
            case "create_user":
                $usuario = $user['usuario'];
                $correo = $user['correo'];
                $password = $user['password'];
                $sql1 = "SELECT * FROM user WHERE nickname='$usuario'";
                $sql2 = "INSERT INTO `user`(`nickname`, `email`, `password`, `type_user`) VALUES ('$usuario', '$correo', '$password', 'usuario')";
                if (Rest::exists($sql1)) {
                    echo json_encode(array('state' => false));
                } else {
                    echo Rest::execute($sql2);
                    Rest::binnacle((Rest::readUserId($sql1)), "Registro de usuario comun: $usuario");
                }
                break;
            case "valid_user":
                session_start();
                $usuario = $user['usuario'];
                $password = $user['password'];
                $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                $result = User::validUser($sql);
                if ($result["state"]) {
                    $_SESSION['state'] = $result['state'];
                    $_SESSION['id_user'] = $result["id_user"];
                    $_SESSION['nickname'] = $result["nickname"];
                    $_SESSION['type_user'] = $result["type_user"];
                    $_SESSION['email'] = $result["email"];
                    Rest::binnacle($_SESSION['id_user'], "Ingreso de usuario: $usuario");
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
                // case "change_password":
                //     $id = $_SESSION['id_user'];
                //     $usuario = $_SESSION['nickname'];
                //     $password = $user['password'];
                //     $newPassword = $user['newPassword'];
                //     $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                //     $result = User::validUser($sql);
                //     if ($result["state"]) {
                //         $sql = "UPDATE `user` SET `password`='$newPassword' WHERE `id_user`='$id'";
                //         Rest::binnacle($id_user, "Cambio de contraseña de usuario: $usuario");
                //         echo Rest::execute($sql);
                //     } else {
                //         echo json_encode($result);
                //     }
                //     break;
            default:
                echo json_encode('hola');
        }
    }
}
