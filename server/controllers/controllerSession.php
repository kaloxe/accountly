<?php
require("/xampp/htdocs/accountly/server/session/session.php");
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
                $sql = "INSERT INTO `user`(`nickname`, `email`, `password`) VALUES ('$usuario', '$correo', $password)";
                echo Rest::execute($sql);
                break;
            case "valid_user":
                $usuario = $user['usuario'];
                $password = $user['password'];
                $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                $result = User::validUser($sql);
                if ($result["state"]) {
                    $_SESSION['state'] = $result['state'];
                    $_SESSION['id_user'] = $result["id_user"];
                    $_SESSION['nickname'] = $result["nickname"];
                    $_SESSION['email'] = $result["email"];
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case "change_password":
                $id = $_SESSION['id_user'];
                $usuario = $_SESSION['nickname'];
                $password = $user['password'];
                $newPassword = $user['newPassword'];
                $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                $result = User::validUser($sql);
                if ($result["state"]) {
                    $sql = "UPDATE `user` SET `password`='$newPassword' WHERE `id_user`='$id'";
                    echo Rest::execute($sql);
                } else {
                    echo json_encode($result);
                }
                break;
            default:
                echo json_encode('hola');
        }
    }
}
