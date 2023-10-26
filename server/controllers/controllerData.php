<?php
require_once("../session/session.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "update_data":
            $sql1 = "SELECT * FROM diary INNER JOIN date on date.id_date=diary.id_date WHERE date.date<CURRENT_DATE";
            $conn = new database();
            $resultado = $conn->openSQL()->query($sql1);
            $num_rows = $resultado->num_rows;
            if ($num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $sql2 = 'UPDATE `diary` SET `state_register`=0 WHERE id_diary=' . $row['id_diary'] . '';
                    Rest::execute($sql2);
                }
                echo json_encode(array('state' => true));
            } else {
                echo json_encode(array('state' => false));
            }
            break;
        case "get_notifications":
            $notifications = Rest::getNotifications($id_user);
            $output = '
            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                <i class="icon-copy dw dw-notification"></i>
                <span class="badge notification-active"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="notification-list mx-h-350 customscroll"><ul>';
            if (count($notifications) > 0) {
                foreach ($notifications as $notification) {
                    $output .= '
                    <li>
                        <a href="./' . ($notification["type"] == 'last-session' ? 'binnacle.php' : ($notification["type"] == 'next-event' ? 'diary.php' : ($notification["type"] == 'goal' ? 'goal.php' : '#'))) . '">
                            <img src="vendors/images/' . ($notification["type"] == 'last-session' ? 'perfil.avif' : ($notification["type"] == 'next-event' ? 'calendar.jpg' : ($notification["type"] == 'goal' ? 'flags.jpg' : 'flags.jpg'))) . '" alt="" />
                            <h6>' . $notification["title"] . '</h6>
                            <p>
                            ' . $notification["description"] . '
                            </p>
                        </a>
                    </li>';
                }
            } else {
                $output .= '
                    <li>
                        <div class="text-center">
                            No hay nada que informar.
                        </div>
                    </li>';
            }
            $output .= '</ul></div></div>';
            echo json_encode(array(
                'state' => true,
                'content' => $output,
            ));
            break;
        default:
            echo json_encode('hola');
    }
}
