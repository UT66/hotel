<?php

if (isset($_POST["submit2"])) {

    // Hier hal ik de data van index.php, wanneer er op submit geklikt wordt op sign up.
    $userid = $_POST["userid"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];
    $email = $_POST["email"];

    // Neem classes en functie voor sign up.
    include "database.php";
    include "signup-database.php";
    include "signup-checker.php";
    //linked to signup-checker.
    $signup = new SignupChecker($userid, $pwd, $pwd2, $email);

    //Error checker linked to signup-checker.php
    $signup->singupUser();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>signup</title>
    <center>
    <div>
        <nav>
        <img src="img\logo.png" width="120" height="80">
            <div>
                <a class="link" href="index.php">Home</a>
                <a class="link" href="klant.php">Reserveren</a>
                <a class="link" href="contact-page.php">Contact</a>
                <a class="link" href="Inlog.php">Login</a>
            </div>
        </nav>
    </div>
    </center>
</head>

<body>
    <?php
    if (isset($_POST["submit2"])) {
    ?>
    <center>
        <h4>Uw account is aan gemaakt.</h4>
        <p>Klik op inloggen om verder te gaan</p>
        <a href="login.php">Inloggen</a>
    </center>
    <?php
    } else {
    ?>
    <center>
        <h4>Sign up</h4>
        <p>Voor users selecteer user. Voor admins selecteer admin</p>
        <form action="signin.php" method="post">
            <input type="text" name="userid" placeholder="Username">
            <input type="text" name="email" placeholder="Email adres">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd2" placeholder="Repeat Password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <br></br>
            <button type="submit" name="submit2">SIGN UP</button>
        </form>
    </center>

    <?php
    }

    ?>




</body>

</html>