<?php
require_once("class_database.php");
class Rest extends database
{
  
  public static function execute($sql)
  {
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    // $query = $conn->prepare($sql);
    $query->execute();
  }

  public static function readFont($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);

    $font = $result->fetch_assoc();
    $id_font = $font["id_font"];
    $name_font = $font["name_font"];
    $amount = $font["amount"];
    $array = array(
      'id_font' => $id_font,
      'name_font' => $name_font,
      'amount' => $amount
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
    $id_management = $tran["id_management"];
    $id_font = $tran["id_font"];
    $reference = $tran["reference"];
    $amount = $tran["amount"];
    $date = $tran["date"];
    $description = $tran["description"];

    $array = array(
      'id_transaction' => $id_transaction,
      'id_management' => $id_management,
      'id_font' => $id_font,
      'reference' => $reference,
      'amount' => $amount,
      'date' => $date,
      'description' => $description
    );

    return json_encode($array);
  }

  public static function readFonts($user_id)
  {
    $sql = "SELECT * FROM font WHERE id_user = $user_id";
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    $query->execute();
    return $query;
  }
}
