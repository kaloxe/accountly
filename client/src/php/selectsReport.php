<?php

require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/models/class_rest.php");
require("/xampp/htdocs/accountly/server/db/db.php");

$dataAccounts = Rest::readAccounts($id_user);
$dataBadges = Rest::readBadges();
$dataReasons = Rest::readReasons();
$dataUsers = Rest::readUsers();
$dataTypesUser = Rest::readTypesUser();

$select = [];
$select['accounts'] = '<option value="all">Todas</option>';
$select['badges'] = '<option value="all">Todas</option>';
$select['reasons'] = '<option value="all">Todas</option>';
$select['users'] = '<option value="all">Todos</option>';
$select['types'] = '<option value="all">Todos</option>';

foreach ($dataAccounts as $account) {
    $select['accounts'] .= '<option value="' . $account['id_account'] . '">' . $account['name_account'] . '</option>';
}

foreach ($dataBadges as $badge) {
    $select['badges'] .= '<option value="' . $badge['id_badge'] . '">' . $badge['name_badge'] . '</option>';
} 

foreach ($dataReasons as $reason) {
    $select['reasons'] .= '<option value="' . $reason['id_reason'] . '">' . $reason['name_reason'] . '</option>';
}

foreach ($dataUsers as $user) {
    $select['users'] .= '<option value="' . $user['id_user'] . '">' . $user['nickname'] . '</option>';
} 

foreach ($dataTypesUser as $type) {
    $select['types'] .= '<option value="' . $type['type_user'] . '">' . $type['type_user'] . '</option>';
} 

echo json_encode($select, JSON_UNESCAPED_UNICODE);