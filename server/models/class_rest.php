<?php
require_once("class_database.php");
class Rest extends database
{
  public static function execute($sql)
  {
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    $query->execute();
    $array = array('state' => true);
    return json_encode($array);
  }

  public static function readAccount($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);

    $account = $result->fetch_assoc();
    $id_account = $account["id_account"];
    $name_account = $account["name_account"];
    $array = array(
      'id_account' => $id_account,
      'name_account' => $name_account
    );
    return json_encode($array);
  }

  public static function readDebt($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);

    $debt = $result->fetch_assoc();
    $id_debt = $debt["id_debt"];
    $description = $debt["description"];
    $amount = $debt["amount"];
    $array = array(
      'id_debt' => $id_debt,
      'description' => $description,
      'amount' => $amount
    );
    return json_encode($array);
  }

  public static function readTransaction($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);
    $tran = $result->fetch_assoc();

    $id_transaction = $tran["id_transaction"];
    $type = $tran["type"];
    $id_badge = $tran["id_badge"];
    $id_account = $tran["id_account"];
    $reference = $tran["reference"];
    $amount = $tran["amount"];
    $date = $tran["date"];
    $description = $tran["description"];

    $array = array(
      'id_transaction' => $id_transaction,
      'type' => $type,
      'id_account' => $id_account,
      'id_badge' => $id_badge,
      'reference' => $reference,
      'amount' => $amount,
      'date' => $date,
      'description' => $description
    );

    return json_encode($array);
  }

  public static function readAccounts($user_id)
  {
    $sql = "SELECT * FROM account WHERE id_user = $user_id";
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    $query->execute();
    return $query;
  }

  public static function readBadges()
  {
    $sql = "SELECT * FROM badge WHERE 1";
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    $query->execute();
    return $query;
  }
}
