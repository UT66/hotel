<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mede_id = 0;
$update_mede = false;
$username = "";
$email = "";

//delete knop functie medewerker
if (isset($_GET['delete_mede'])) {
    $Mede_id = $_GET['delete_mede'];
    $mysqli->query("DELETE FROM medewerkers WHERE medewerker_id=$mede_id") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $_SESSION['message'] = "medewerker is verwijderd!";
    $_SESSION['msg_type'] = "danger";

    header("location: login.php");
}
//edit data functie medewerker
if (isset($_GET['edit_mede'])) {
    $klant_id = $_GET['edit_mede'];
    $update = true;
    $result = $mysqli->query("SELECT * medewerkers WHERE medewerker_id=$mede_id") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $username = $row['medewerker_user'];
        $email = $row['email'];
    }
}