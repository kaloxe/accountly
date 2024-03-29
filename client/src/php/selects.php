<?php

require("../../../server/session/session.php");
require("../../../server/models/class_rest.php");

$dataAccounts = Rest::readAccounts($id_user_where);
$dataBadges = Rest::readBadges();
$dataReasons = Rest::readReasons();

$select = [];
$select['accounts'] = '<option value="">Seleccione</option>';
$select['badges'] = '<option value="">Seleccione</option>';
$select['reasons'] = '<option value="">Seleccione</option>';

foreach ($dataAccounts as $account) {
    $select['accounts'] .= '<option value="' . $account['id_account'] . '">' . (($type_user=="administrador") ? ('' . $account['nickname'] . ' ') : "") . $account['name_account'] . '</option>';
}

foreach ($dataBadges as $badge) {
    $select['badges'] .= '<option value="' . $badge['id_badge'] . '">' . $badge['name_badge'] . '</option>';
} 

foreach ($dataReasons as $reason) {
    $select['reasons'] .= '<option value="' . $reason['id_reason'] . '">' . $reason['name_reason'] . '</option>';
} 

echo json_encode($select, JSON_UNESCAPED_UNICODE);