<?php

class Rest
{
  public static function create($conn, $sql)
  {
    // $success = false;
    // $mensaje = "";

    $query = $conn->prepare($sql);
    $query->execute();

    // $array = array('success' => $success, 'mensaje' => $mensaje);
    // return json_encode($array);
  }

  public static function read($conn, $sql)
  {
    $success = false;
    $mensaje = "";

    $query = $conn->prepare($sql);
    $query->execute();


    $array = array('success' => $success, 'mensaje' => $mensaje);
    return json_encode($array);
  }

  public static function editar_paciente($conn, $sql)
  {
    $success = false;
    $mensaje = "";

    $query = $conn->prepare($sql);
    $query->execute();

    $array = array('success' => $success, 'mensaje' => $mensaje);
    return json_encode($array);
  }

  public static function getPaciente($conn, $cedula_paciente)
  {
    $nombre_paciente = "";
    $apellido_paciente = "";
    $genero = "";
    $fecha_nacimiento = "";
    $correo_electronico = "";
    $telefono = "";

    $sql = "SELECT * FROM paciente WHERE cedula_paciente='$cedula_paciente'";
    $query = $conn->prepare($sql);
    $query->execute();
    if ($paciente = $query->fetch(PDO::FETCH_ASSOC)) {
      $cedula_paciente = $paciente["cedula_paciente"];
      $genero = $paciente["genero"];
      $nombre_paciente = $paciente["nombre_paciente"];
      $apellido_paciente = $paciente["apellido_paciente"];
      $fecha_nacimiento = $paciente["fecha_nacimiento"];
      $correo_electronico = $paciente["correo_electronico"];
      $telefono = $paciente["telefono"];
    }
    $array = array(
      'cedula_paciente' => $cedula_paciente,
      'genero' => $genero,
      'nombre_paciente' => $nombre_paciente,
      'apellido_paciente' => $apellido_paciente,
      'fecha_nacimiento' => $fecha_nacimiento,
      'correo_electronico' => $correo_electronico,
      'telefono' => $telefono,
    );
    return json_encode($array);
  }
}
