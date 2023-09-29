<?php
if (!isset($_SESSION)) {
    session_start();
}

if (@$_SESSION['state']) {
    $state = $_SESSION['state'];
    $id_user = $_SESSION['id_user'];
    $nickname = $_SESSION['nickname'];
    $type_user = $_SESSION['type_user'];
    $email = $_SESSION['email'];
    $id_user_where= ($type_user=="administrador") ? 1 : "user.id_user=$id_user";
} else {
    @header('Location: /accountly/client/login.php');
}

if (isset($_GET['close_session'])) {
    session_unset();
    session_destroy();
    @header('Location: /accountly/client/login.php');
}
