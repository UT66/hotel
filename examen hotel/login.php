<?php
require_once 'function.php';
if (isset($_POST["submit3"])) {

    // Hier hal ik de data van index.php, wanneer er op submit geklikt wordt op sign up.
    $userid = $_POST["userid"];
    $pwd = $_POST["pwd"];

    // Neem classes en functie voor sign up.
    include "database.php";
    include "login-database.php";
    include "login-checker.php";
    //linked to signup-checker.
    $login = new LoginChecker($userid, $pwd);

    //Error checker linked to login-checker.php
    $login->loginUser();

    /*gaat terug naar login.php
    header("location: login.php?error=none");*/
}
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
    <title>Mederwerkers pagina</title>
</head>
<body>
    <?php
    if (isset($_SESSION["userid"])) {
    ?>
    <center>
    <div>
        <nav>
        <img src="img\logo.png" width="120" height="80">
            <div>
                <a class="link" href="index.php">Home</a>
                <a class="link" href="klant.php">Reserveren</a>
                <a class="link" href="contact-page.php">Contact</a>
                <a class="link" href="logout.php">Loguit</a>
            </div>
        </nav>
    </div>
    </center>
    <center>
        <h3>Welkom gebruiker <?php echo $_SESSION["useruserid"]; ?> u bent ingelogd</h3>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $result = $mysqli->query("SELECT * FROM medewerkers") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $totalRows = $result->num_rows;
        //print_r($totalRows);
        ?>
     </center>
     <center>
         <?php
        $mysqli = new mysqli('localhost', 'root', '', 'hotelterduin') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $result = $mysqli->query("SELECT * FROM klanten") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $totalRows = $result->num_rows;
        //print_r($totalRows);
        ?>
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
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['r_periode_in']; ?></td>
                            <td><?php echo $row['r_periode_out']; ?></td>
                            <td><?php echo $row['naam']; ?></td>
                            <td><?php echo $row['adres']; ?></td>
                            <td><?php echo $row['plaats']; ?></td>
                            <td><?php echo $row['postcode']; ?></td>
                            <td><?php echo $row['telefoon']; ?></td>
                            <td>
                                <a href="login.php?edit=<?php echo $row['klant_id'] ?>" class="btn btn-info">Edit</a>
                                <a href="function.php?delete=<?php echo $row['klant_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        </center>
                    <?php endwhile; ?>
                </table>
                <form action="function.php" method="post">
                    <div class="form-group col-md-2">
                        <input type='submit' name='export1' value='Export to excel file' />
                    </div>
                </form>
            </div>
            <br><br>
            <form action="function.php" method="post">
                <div>
                    <div>
                        <label>Check In</label>
                        <input type="date" name="startid" value="<?php echo $checkin; ?>">
                    </div>
                    <div>
                        <label>Check Out</label>
                        <input type="date" name="endid" value="<?php echo $checkin; ?>">
                    </div>
                </div>
                <div >
                    <label>Naam</label>
                    <input type="text" class="form-control" name="naam" value="<?php echo $name; ?>" placeholder="Voer je Naam in">
                </div>
                <div>
                    <div>
                        <label>Adres</label>
                        <input type="text" class="form-control" name="adres" value="<?php echo $adres; ?>" placeholder="Voer je adres in">
                    </div>
                    <div>
                        <label>Plaats</label>
                        <input type="text" class="form-control" name="plaats" value="<?php echo $plaats; ?>" placeholder="Plaats">
                    </div>
                    <div>
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="postcode" value="<?php echo $postcode; ?>" placeholder="Postcode">
                    </div>
                    <div>
                        <label>Telefoon</label>
                        <input type="text" class="form-control" name="telefoon" value="<?php echo $telefoon; ?>" placeholder="Telefoon nummer">
                    </div>
                </div>
                <div class="form-group">
                    <br>
                    <?php
                    if ($update == true) :
                    ?>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <?php else : ?>
                        <button type=" submit" class="btn btn-primary" name="submit3">Reserveren</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>

    <?php
    } else {
    ?>
    <center>
    <div>
        <nav>
        <img src="img\logo.png" width="120" height="80">
            <div>
                <a class="link" href="index.php">Home</a>
                <a class="link" href="login.php">Reserveren</a>
                <a class="link" href="contact-page.php">Contact</a>
            </div>
        </nav>
    </div>
    </center>
    <center>
        <h4>Log in</h4>
        <form action="login.php" method="post">
            <input type="text" name="userid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <br></br>
            <button type="submit" name="submit3">Login</button>
            <p>Nog geen account klik dan sign in</p>
            <p><a href="signin.php">Sign In</a></p>
        </form>
    </center>
    <?php
    }

    ?>

</body>

</html>