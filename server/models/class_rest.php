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

  public static function binnacle($id_user, $movement)
  {
    $conn = new database();
    $actualdt = date('y-m-d h:i:s');
    $sql = "INSERT INTO `binnacle`(`id_user`, `movement`, `datetime`) VALUES ($id_user,'$movement','$actualdt')";
    $query = $conn->open()->prepare($sql);
    $query->execute();
    $array = array('state' => true);
    return json_encode($array);
  }

  public static function readBadge($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);

    $badge = $result->fetch_assoc();
    $id_badge = $badge["id_badge"];
    $name_badge = $badge["name_badge"];
    $value = $badge["value"];
    $array = array(
      'id_badge' => $id_badge,
      'name_badge' => $name_badge,
      'value' => $value
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
    $id_reason = $tran["id_reason"];
    $amount = $tran["amount"];
    $date = $tran["date"];
    $description = $tran["description"];

    $array = array(
      'id_transaction' => $id_transaction,
      'type' => $type,
      'id_account' => $id_account,
      'id_badge' => $id_badge,
      'id_reason' => $id_reason,
      'amount' => $amount,
      'date' => $date,
      'description' => $description
    );

    return json_encode($array);
  }

  public static function readUser($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);
    $tran = $result->fetch_assoc();

    $id_user = $tran["id_user"];
    $nickname = $tran["nickname"];
    $email = $tran["email"];
    $password = $tran["password"];
    $type_user = $tran["type_user"];

    $array = array(
      'id_user' => $id_user,
      'nickname' => $nickname,
      'email' => $email,
      'password' => $password,
      'type_user' => $type_user
    );

    return json_encode($array);
  }
  public static function readDiary($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);
    $tran = $result->fetch_assoc();

    $id_diary = $tran["id_diary"];
    $type = $tran["type"];
    $id_badge = $tran["id_badge"];
    $amount = $tran["amount"];
    $date = $tran["date"];
    $description = $tran["description"];

    $array = array(
      'id_diary' => $id_diary,
      'type' => $type,
      'id_badge' => $id_badge,
      'amount' => $amount,
      'date' => $date,
      'description' => $description
    );

    return json_encode($array);
  }

  public static function readGoal($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);
    $tran = $result->fetch_assoc();

    $id_goal = $tran["id_goal"];
    $type = $tran["type"];
    $id_badge = $tran["id_badge"];
    $amount = $tran["amount"];
    $description = $tran["description"];
    $name_goal = $tran["name_goal"];
    $complete = $tran["complete"];

    $array = array(
      'type' => $type,
      'id_badge' => $id_badge,
      'id_goal' => $id_goal,
      'name_goal' => $name_goal,
      'amount' => $amount,
      'description' => $description,
      'complete' => $complete
    );

    return json_encode($array);
  }

  public static function readGoalComplete($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);
    $tran = $result->fetch_assoc();
    $complete = $tran["complete"];
    return $complete;
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

  public static function readReasons()
  {
    $sql = "SELECT * FROM reason WHERE 1";
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    $query->execute();
    return $query;
  }

  public static function readUsers()
  {
    $sql = "SELECT * FROM user WHERE 1";
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    $query->execute();
    return $query;
  }

  public static function readTypesUser()
  {
    $sql = "SELECT * FROM user WHERE 1";
    $conn = new database();
    $query = $conn->open()->prepare($sql);
    $query->execute();
    return $query;
  }
}
