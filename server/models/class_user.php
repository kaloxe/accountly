<?php

require_once("class_database.php");
class User extends database
{
    public static function validUser($sql)
    {
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
            $password = $user["password"];
            $array = array(
                'state' => true,
                'id_user' => $id_user,
                'nickname' => $nickname,
                'email' => $email,
                'password' => $password
            );
            return $array;
        }
    }
}
