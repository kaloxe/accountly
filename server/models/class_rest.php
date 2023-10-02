<?php
require_once("class_database.php");
class Rest extends database
{
  public static function execute($sql)
  {
    try {
      $conn = new database();
      $query = $conn->open()->prepare($sql);
      $query->execute();
      $array = array('state' => true);
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'message' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function exists($sql)
  {
    $conn = new database();
    $resultado = $conn->openSQL()->query($sql);
    $num_rows = $resultado->num_rows;
    return $num_rows > 0 ? true : false;
  }

  public static function binnacle($id_user, $movement)
  {
    try {
      $conn = new database();
      $actualdt = date('y-m-d h:i:s');
      $sql = "INSERT INTO `binnacle`(`id_user`, `movement`, `datetime`) VALUES ($id_user,'$movement','$actualdt')";
      $query = $conn->open()->prepare($sql);
      $query->execute();
      $array = array('state' => true);
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'name_account' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function readUserId($sql)
  {
    $conn = new database();
    $result = $conn->openSQL()->query($sql);
    $user = $result->fetch_assoc();
    $id = $user["id_user"];
    return $id;
  }

  public static function readAccount($sql)
  {
    try {
      $conn = new database();
      $result = $conn->openSQL()->query($sql);

      $account = $result->fetch_assoc();
      $id_account = $account["id_account"];
      $name_account = $account["name_account"];
      $user_id = $account["id_user"];
      $array = array(
        'state' => true,
        'id_account' => $id_account,
        'user_id' => $user_id,
        'name_account' => $name_account
      );
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'name_account' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function readBadge($sql)
  {
    try {
      $conn = new database();
      $result = $conn->openSQL()->query($sql);

      $badge = $result->fetch_assoc();
      $id_badge = $badge["id_badge"];
      $name_badge = $badge["name_badge"];
      $value = $badge["value"];
      $array = array(
        'state' => true,
        'id_badge' => $id_badge,
        'name_badge' => $name_badge,
        'value' => $value
      );
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'name_account' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function readTransaction($sql)
  {
    try {
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
        'state' => true,
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
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'name_account' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function readUser($sql)
  {
    try {
      $conn = new database();
      $result = $conn->openSQL()->query($sql);
      $tran = $result->fetch_assoc();

      $id_user = $tran["id_user"];
      $nickname = $tran["nickname"];
      $email = $tran["email"];
      $password = $tran["password"];
      $type_user = $tran["type_user"];

      $array = array(
        'state' => true,
        'id_user' => $id_user,
        'nickname' => $nickname,
        'email' => $email,
        'password' => $password,
        'type_user' => $type_user
      );
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'name_account' => $errorMessage
      );
      return json_encode($array);
    }
  }
  public static function readDiary($sql)
  {
    try {
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
        'state' => true,
        'id_diary' => $id_diary,
        'type' => $type,
        'id_badge' => $id_badge,
        'amount' => $amount,
        'date' => $date,
        'description' => $description
      );
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'name_account' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function readGoal($sql)
  {
    try {
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
        'state' => true,
        'type' => $type,
        'id_badge' => $id_badge,
        'id_goal' => $id_goal,
        'name_goal' => $name_goal,
        'amount' => $amount,
        'description' => $description,
        'complete' => $complete
      );
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'name_account' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function getRecentMovements($id_where)
  {
    try {
      $incomes = [];
      $becomes = [];
      $dates = [];
      $actualdt = date('y-m-d');
      for ($i = 0; $i <= 7; $i++) {
        $date = date("y-m-d", strtotime($actualdt . "- $i days"));
        $conn = new database();
        $sql1 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=1 and date<='$date' and user.id_user=account.id_user and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
        $sql2 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=0 and date<='$date' and user.id_user=account.id_user and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
        $result1 = $conn->openSQL()->query($sql1);
        $result2 = $conn->openSQL()->query($sql2);
        $income = 0;
        $become = 0;
        while ($row1 = $result1->fetch_assoc()) {
          $income += $row1["amount"] * $row1["value"];
        }
        while ($row2 = $result2->fetch_assoc()) {
          $become += $row2["amount"] * $row2["value"];
        }
        array_unshift($incomes, round($income, 2));
        array_unshift($becomes, round($become, 2));
        array_unshift($dates, $date);
      }
      $array = array(
        'state' => true,
        'incomes' => $incomes,
        'becomes' => $becomes,
        'dates' => $dates,
      );
      return json_encode($array);
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'message' => $errorMessage
      );
      return json_encode($array);
    }
  }

  public static function getMovements($id_where, $tiempo)
  {
    try {
      $incomes = [];
      $becomes = [];
      $dates = [];
      $actualdt = date('y-m-d');
      $conn = new database();
      switch ($tiempo) {
        case "1 WEEK":
          for ($i = 0; $i <= 7; $i++) {
            $date = date("y-m-d", strtotime($actualdt . "- $i days"));
            $sql1 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=1 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $sql2 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=0 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $result1 = $conn->openSQL()->query($sql1);
            $result2 = $conn->openSQL()->query($sql2);
            $income = 0;
            $become = 0;
            while ($row1 = $result1->fetch_assoc()) {
              $income += $row1["amount"] * $row1["value"];
            }
            while ($row2 = $result2->fetch_assoc()) {
              $become += $row2["amount"] * $row2["value"];
            }
            array_unshift($incomes, round($income, 2));
            array_unshift($becomes, round($become, 2));
            array_unshift($dates, $date);
          }
          break;
        case "1 MONTH":
          for ($i = 0; $i <= 30; $i++) {
            $date = date("y-m-d", strtotime($actualdt . "- $i days"));
            $sql1 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=1 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $sql2 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=0 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $result1 = $conn->openSQL()->query($sql1);
            $result2 = $conn->openSQL()->query($sql2);
            $income = 0;
            $become = 0;
            while ($row1 = $result1->fetch_assoc()) {
              $income += $row1["amount"] * $row1["value"];
            }
            while ($row2 = $result2->fetch_assoc()) {
              $become += $row2["amount"] * $row2["value"];
            }
            array_unshift($incomes, round($income, 2));
            array_unshift($becomes, round($become, 2));
            array_unshift($dates, $date);
          }
          break;
        case "6 MONTH":
          for ($i = 0; $i <= 6; $i++) {
            $date = date("y-m-d", strtotime($actualdt . "- $i months"));

            $sql1 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=1 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $sql2 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=0 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $result1 = $conn->openSQL()->query($sql1);
            $result2 = $conn->openSQL()->query($sql2);
            $income = 0;
            $become = 0;
            while ($row1 = $result1->fetch_assoc()) {
              $income += $row1["amount"] * $row1["value"];
            }
            while ($row2 = $result2->fetch_assoc()) {
              $become += $row2["amount"] * $row2["value"];
            }
            array_unshift($incomes, round($income, 2));
            array_unshift($becomes, round($become, 2));
            array_unshift($dates, $date);
          }
          break;
        case "1 YEAR":
          for ($i = 0; $i <= 12; $i++) {
            $date = date("y-m-d", strtotime($actualdt . "- $i months"));
            $sql1 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=1 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $sql2 = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE badge.id_badge=transaction.id_badge and transaction.type=0 and date<='$date' and " . ($id_where == 1 ? "1" : "user.id_user=account.id_user") . " and $id_where),0)) as amount FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $id_where GROUP BY badge.id_badge";
            $result1 = $conn->openSQL()->query($sql1);
            $result2 = $conn->openSQL()->query($sql2);
            $income = 0;
            $become = 0;
            while ($row1 = $result1->fetch_assoc()) {
              $income += $row1["amount"] * $row1["value"];
            }
            while ($row2 = $result2->fetch_assoc()) {
              $become += $row2["amount"] * $row2["value"];
            }
            array_unshift($incomes, round($income, 2));
            array_unshift($becomes, round($become, 2));
            array_unshift($dates, $date);
          }
          break;
        default:
          $tiempo = "1 DAY";
      }

      $array = array(
        'state' => true,
        'incomes' => $incomes,
        'becomes' => $becomes,
        'dates' => $dates,
      );
      return $array;
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'message' => $errorMessage
      );
      return $array;
    }
  }

  public static function getTotals($id_where, $cuentaC, $badge)
  {
    try {
      $accounts = [];
      $amounts = [];

      $conn = new database();

      $sql1 = "SELECT * FROM account INNER JOIN user on user.id_user=account.id_user WHERE $id_where AND $cuentaC";
      $result1 = $conn->openSQL()->query($sql1);
      $num_rows1 = $result1->num_rows;

      if ($num_rows1 > 0) {
        while ($row1 = $result1->fetch_assoc()) {
          $id = $row1['id_account'];
          $sql2 = "SELECT name_account, name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=1 and 1 and 1),0) - ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=0 and 1 and 1),0)) as subtotal FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $badge and transaction.id_account=$id GROUP BY badge.id_badge";
          $result2 = $conn->openSQL()->query($sql2);
          $num_rows2 = $result2->num_rows;
          $amount = 0;
          array_unshift($accounts, $row1['name_account']);
          if ($num_rows2 > 0) {
            while (($row2 = $result2->fetch_assoc())) {
              $amount += $row2["subtotal"] * $row2["value"];
            }
          }
          array_unshift($amounts, round(($amount), 2));
        }
      }

      $array = array(
        'state' => true,
        'accounts' => $accounts,
        'amounts' => $amounts,
      );
      return $array;
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'message' => $errorMessage
      );
      return $array;
    }
  }

  public static function getEvents($id_where)
  {
    try {
      $events = [];
      $conn = new database();

      $sql = "SELECT * FROM diary INNER JOIN user on user.id_user=diary.id_user INNER JOIN badge on badge.id_badge=diary.id_badge INNER JOIN date on date.id_date=diary.id_date WHERE $id_where";
      $result = $conn->openSQL()->query($sql);
      $num_rows = $result->num_rows;

      if ($num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $array = array(
            'title' => "".$row['description']."",
            'description' => "".$row['amount']." ". $row['name_badge'] ."",
            'start' => $row['date'],
            'end' => $row['date'],
            //'className' => "fc-bg-default",
            'className' => ($row['state_register'] ? ($row['type'] ? "fc-bg-green" : "fc-bg-red") : "fc-bg-gray"),
            'icon' => ($row['type'] ? "arrow-up" : "arrow-down"),
          );
          array_unshift($events, $array);
        }
      }
      return $events;
    } catch (Exception $e) {
      $errorMessage = 'Ha habido una excepción: ' . $e->getMessage() . '';
      $array = array(
        'state' => false,
        'message' => $errorMessage
      );
      return $array;
    }
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
    $sql = "SELECT * FROM account INNER JOIN user on user.id_user=account.id_user WHERE $user_id";
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
