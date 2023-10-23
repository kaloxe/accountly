<?php
require_once("class_database.php");
class User extends database
{
    public static function validUser($sql)
    {
        try {
            $conn = new database();
            $result = $conn->openSQL()->query($sql);
            $user = $result->fetch_assoc();
            if ($user == null) {
                $array = array('state' => false);
                return $array;
            } else {
                $id_user = $user["id_user"];
                $nickname = $user["nickname"];
                $email = $user["email"];
                $type_user = $user["type_user"];
                $password = $user["password"];
                $array = array(
                    'state' => true,
                    'id_user' => $id_user,
                    'nickname' => $nickname,
                    'email' => $email,
                    'type_user' => $type_user,
                    'password' => $password
                );
                return $array;
            }
        } catch (Exception $e) {
            $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
            $array = array(
                'state' => false,
                'message' => $errorMessage
            );
            return json_encode($array);
        }
    }
}
