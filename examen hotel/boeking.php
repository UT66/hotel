<?php
require_once 'function.php';

?>
<?php

if (isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
 <title>boeking</title>
    <center>
    <div>
        <nav>
        <img src="img\logo.png" width="120" height="80">
            <div>
                <a class="link" href="index.php">Home</a>
                <a class="link" href="contact-page.php">Contact</a>
                <a class="link" href="login.php">Login</a>
                </ul>
            </div>
        </nav>
    </div>
    </center>
</head>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$result = $mysqli->query("SELECT * FROM klanten ORDER BY klant_id DESC LIMIT 1") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//pre_r($result);
?>
<center>
<div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Naam</th>
                    <th>Adres</th>
                    <th>Plaats</th>
                    <th>Postcode</th>
                    <th>Telefoon</th>
                </tr>
            </thead>
            <?php $row = $result->fetch_assoc(); ?>
            <tr>
            <td><?php echo $row['r_periode_in']; ?></td>
            <td><?php echo $row['r_periode_out']; ?></td>
            <td><?php echo $row['naam']; ?></td>
            <td><?php echo $row['adres']; ?></td>
            <td><?php echo $row['plaats']; ?></td>
            <td><?php echo $row['postcode']; ?></td>
            <td><?php echo $row['telefoon']; ?></td>
            </tr>
        </table>
        <form action="function.php" method="post">
            <div class="form-group col-md-2">
                <input type='submit' name='export' value='Export to excel file' />
            </div>
        </form>
    </div>
</div>
</center>