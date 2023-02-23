<?php

require "../inc/bdd.inc.php";
require "../model/Participation.php";

$data = get_all_weekly_part_by_id($_POST["id_cav"],1,$_POST["week_increment"]);
$response ="";
foreach ($data as $row) {
    $response .= '<tr>';
    $response .= '  <td>' .$row["id_cour"] .'</td>
                    <td>'. $row["title"] .'</td>
                    <td>'. date_format(date_create($row["start_event"]),"l").'</td>
                    <td>'. substr($row["start_event"],5,6) .'</td>
                    <td>'. substr($row["end_event"],-8,-3) .'</td>
                    <td>'. substr($row["end_event"],-8,-3) .'</td>
                    <td>
                        <form action="ParticipationController.php" method="post">
                            <input type="hidden" name="id_cours" value="'. $row["id_cour"].'" >
                            <input type="hidden" name="id_week_cour" value="'.$row["id_week_cour"].'" >
                            <input type="hidden" name="id_cav" value="'.$row["id_cav"].'" >
                            <input type="hidden" name="actif" value="0" >
                            <input type="hidden" name="action" value="update" >
                            <input type="submit" value="S\'ABSENTER">
                        </form>
                    </td>';
    $response .=  '</tr>';
}


echo $response;