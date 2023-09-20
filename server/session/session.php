<?php
if (!isset($_SESSION)) {
    session_start();
}

if (@$_SESSION['nickname']) {
    // $object = $_SESSION['object'];
    $state = $_SESSION['state'];
    $id_user = $_SESSION['id_user'];
    $nickname = $_SESSION['nickname'];
    $email = $_SESSION['email'];
} else {
    @header('Location: /accountly/templates/deskapp-master/login.php');
}

if (isset($_GET['close_session'])) {
    session_unset();
    session_destroy();
    @header('Location: /accountly/templates/deskapp-master/login.php');
}
