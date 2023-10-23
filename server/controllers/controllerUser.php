<?php
require_once("../session/session.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_user":
            $usuario = $user['usuario'];
            $correo = $user['correo'];
            $password = $user['password'];
            $sql = "INSERT INTO `user`(`nickname`, `email`, `password`, `type_user`) VALUES ('$usuario', '$correo', '$password', 'administrador')";
            Rest::binnacle($id_user, "Registro de usuario administrador: $usuario");
            echo Rest::execute($sql);
            break;
        case "read_user":
            $id = $user['id'];
            $sql = "SELECT `id_user`, `nickname`, `password`, `email`, `type_user` FROM `user` WHERE id_user=$id";
            echo Rest::readUser($sql);
            break;
        case "update_user":
            $id = $user["id"];
            $email = $user['correo'];
            $nickname = $user['usuario'];
            $password =  $user['password'];
            $sql = "UPDATE `user` SET `email`='$email', `nickname`='$nickname', `password`='$password' WHERE `id_user`=$id";
            Rest::binnacle($id_user, "Actualizacion de usuario $nickname");
            echo Rest::execute($sql);
            break;
        case "delete_user":
            $id = $user['id'];
            $sql = "DELETE FROM `user` WHERE `user`.`id_user` = $id";
            Rest::binnacle($id_user, "Eliminacion de usuario n* $id");
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
