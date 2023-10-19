<?php
require_once("../session/session.php");
require_once("../models/class_rest.php");
require_once("../models/class_user.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    if (isset($user['action'])) {
        switch ($user['action']) {
            case "create_user":
                $usuario = $user['usuario'];
                $correo = $user['correo'];
                $password = $user['password'];
                $sql = "INSERT INTO `user`(`nickname`, `email`, `password`, `type_user`) VALUES ('$usuario', '$correo', '$password', 'usuario')";
                Rest::binnacle($_SESSION['id_user'], "Registro de usuario comun: $usuario");
                echo Rest::execute($sql);
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
                    $_SESSION['email'] = $result["email"];
                    // Rest::binnacle($id_user, "Ingreso de usuario: $usuario");
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case "read_user":
                $id = $_SESSION['id_user'];
                $sql = "SELECT `id_user`, `nickname`, `password`, `email`, `type_user` FROM `user` WHERE id_user=$id";
                echo Rest::readUser($sql);
                break;
            case "update_user":
                $id = $_SESSION['id_user'];
                $usuario = $_SESSION['nickname'];
                $nuevoUsuario = $user['usuario'];
                $correo = $user['correo'];
                $password = $user['password'];
                $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                $result = User::validUser($sql);
                if ($result["state"]) {
                    //$_SESSION['state'] = $result['state'];
                    $_SESSION['nickname']= $nuevoUsuario;
                    $_SESSION['email'] = $correo;
                    $sql1 = "UPDATE `user` SET `nickname`='$nuevoUsuario', `email`='$correo' WHERE `id_user`=$id";
                    Rest::binnacle($id_user, "Cambio de datos de usuario: $usuario");
                    echo Rest::execute($sql1);
                } else {
                    echo json_encode($result);
                }
                break;
            case "update_password":
                $id = $_SESSION['id_user'];
                $usuario = $_SESSION['nickname'];
                $password = $user['oldPassword'];
                $newPassword = $user['password1'];
                $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                $result = User::validUser($sql);
                if ($result["state"]) {
                    $sql1 = "UPDATE `user` SET `password`='$newPassword' WHERE `id_user`='$id'";
                    Rest::binnacle($id_user, "Cambio de contraseña de usuario: $usuario");
                    echo Rest::execute($sql1);
                } else {
                    echo json_encode($result);
                }
                break;
            default:
                echo json_encode('hola');
        }
    }
}
