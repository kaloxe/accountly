<?php

class Rest
{
  public static function execute($conn, $sql)
  {
    $query = $conn->prepare($sql);
    $query->execute();
  }

  public static function readFont($conn, $sql)
  {
    $result = $conn->query($sql);
    // $query = $conn->prepare($sql);
    // $query->execute();

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

  public static function readDebt($conn, $sql)
  {
    $result = $conn->query($sql);
    $query = $conn->prepare($sql);
    $query->execute();

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

  public static function readTransaction($conn, $sql)
  {
    $result = $conn->query($sql);
    $query = $conn->prepare($sql);
    $query->execute();

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

  public static function readFonts($conn)
  {
    $sql = "SELECT * FROM font WHERE id_user = 1";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query;
  }
}
