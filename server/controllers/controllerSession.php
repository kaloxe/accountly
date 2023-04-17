<?php

require_once("/xampp/htdocs/accountly/server/db/db.php");
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
                echo Rest::execute($conn, $sql);
                // echo json_encode($user);
                // echo json_encode($sql);
                break;
            case "valid_user":

                $usuario = $user['usuario'];
                $password = $user['password'];
                $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                $result = User::validUser($conn, $sql);
                if ($result["state"]) {
                    session_start();
                    // $_SESSION['object'] = $result;
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
                session_start();
                $id = $_SESSION['id_user'];
                $usuario = $_SESSION['nickname'];
                $password = $user['password'];
                $newPassword = $user['newPassword'];
                $sql = "SELECT * FROM `user` WHERE `nickname`='$usuario' AND `password`='$password'";
                $result = User::validUser($conn, $sql);
                if ($result["state"]) {
                    $sql = "UPDATE `user` SET `password`='$newPassword' WHERE `id_user`='$id'";
                    // echo $id;
                    echo Rest::execute($conn, $sql);
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }

                break;
            case "update_debt":
                $id = $user["id"];
                $descripcion = $user['descripcion'];
                $monto = $user['monto'];
                $sql = "UPDATE `debt` SET `description`='$descripcion',`amount`=$monto WHERE `id_debt`=$id";
                echo Rest::execute($conn, $sql);
                break;
            case "delete_debt":
                $id = $user['id'];
                $sql = "DELETE FROM `debt` WHERE `debt`.`id_debt` = $id";
                echo Rest::execute($conn, $sql);
                break;
            default:
                echo json_encode('hola');
        }
    }
}
