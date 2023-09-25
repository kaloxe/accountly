<?php

require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/models/class_rest.php");
require("/xampp/htdocs/accountly/server/db/db.php");

$dataAccounts = Rest::readAccounts($id_user);
$dataBadges = Rest::readBadges();
$dataReasons = Rest::readReasons();

$select = [];
$select['accounts'] = '<option value="">Seleccione</option>';
$select['badges'] = '<option value="">Seleccione</option>';
$select['reasons'] = '<option value="">Seleccione</option>';

foreach ($dataAccounts as $account) {
    $select['accounts'] .= '<option value="' . $account['id_account'] . '">' . $account['name_account'] . '</option>';
}

foreach ($dataBadges as $badge) {
    $select['badges'] .= '<option value="' . $badge['id_badge'] . '">' . $badge['name_badge'] . '</option>';
} 

foreach ($dataReasons as $reason) {
    $select['reasons'] .= '<option value="' . $reason['id_reason'] . '">' . $reason['name_reason'] . '</option>';
} 

echo json_encode($select, JSON_UNESCAPED_UNICODE);