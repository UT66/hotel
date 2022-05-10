<?php
require_once 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<title>Reserveren</title>
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
<body>
<center>
    <div>
        <form action="function.php" method="post">
            <h3>Reserveer nu een Kamer</h3>
                <label>Check In</label>
                    <input type="date" name="startid">
                <label>Check Out</label>
                    <input type="date" name="endid">
                <label>Naam</label>
                    <input type="text" name="naam">
                <label>Adres</label>
                    <input type="text" name="adres">   
                <label>Plaats</label>
                    <input type="text" name="plaats">
                <label>Postcode</label>
                    <input type="text" name="postcode">
                <label>Telefoon</label>
                    <input type="text" name="telefoon">
                </div>
            </div>
            <div class="form-group">
                <br>
                <button type="submit" name="submit">Reserveren</button>
            </div>
        </form>
    </div>
    </center>
</body>

</html>