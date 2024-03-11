<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang=de>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style1.css">
    <title>BOCA B2B WEBSHOP</title>
</head>

<body>

    <?php
    if(isset($_SESSION['user_id'])){ ?>
        <h2>BOCA B2B Webshop</h2>
        <hr>
        <div class="abmelden">
            <?php
                output_username(); 
            ?>
            <form action=includes/logout.inc.php method="post">  
                <button>ABMELDEN</button>
            </form>
        </div>
    <?php } ?>
    

    <?php
    if(!isset($_SESSION['user_id'])){ ?>
        
        <h2>Willkommen beim BOCA B2B Webshop</h2>
        <hr>
        <div class="anmeldung">
        <h3>Anmeldung</h3>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="Lbenutzername" placeholder="Benutzername"><br>
            <input type="password" name="Lpasswort" placeholder="Passwort"><br>
            <button>ANMELDEN</button>
        </form> 
        <div class="errors">
            <?php
            check_login_errors();
            ?>
        </div>
        </div>
    <?php } ?>

    <?php
    if(!isset($_SESSION['user_id'])){ ?>
        <br>
        <div class="registrierung">
        <h3>Registrierung</h3>
        <form action="includes/signup.inc.php" method="post">
            <?php
            signup_inputs()
            ?>
            <button>REGISTRIEREN</button>
        </form> 
        <div class="errors">
            <?php
            check_signup_errors();
            ?>
        </div>
        </div>
    <?php } ?>

    <?php
    if(isset($_SESSION['user_id'])){
        include 'includes/dbhandler.inc.php';
        ?><form  action="order.inc.php" method="post"><?php
    try {
        // SQL-Abfrage vorbereiten
        $stmt = $pdo->prepare("SELECT * FROM boca.products");

        // SQL-Abfrage ausführen
        $stmt->execute();

        // Daten ausgeben
        if ($stmt->rowCount() > 0) {
            echo"<br>";
            echo "<table border='1'>";
            echo "<tr><th>Produkt-ID</th><th>Name</th><th>Preis</th><th>Info</th><th>Anzahl</th></tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                echo "<tr>";
                echo "<td>" . $row["id_products"] . "</td>";
                echo "<td>" . $row["name_products"] . "</td>";
                echo "<td>" . $row["preis_products"] . "€</td>";
                
                if ($row["amount_products"] < "16") {
                    echo "<td>Nur noch <font color='red'><b>" . $row["amount_products"] . "</b></font color> verfügbar </td>";
                }else{
                    echo "<td>Noch <font color='green'><b>". $row["amount_products"] . "</b></font color> verfügbar</td>";
                }

                echo "<td><input type='number' name='order".$row["id_products"]."' value='0' min='0' max='".$row["amount_products"]."'></td>";
                echo "</tr>";
                
            }   echo "</table>"; ?>
                <br>
                
                <div class="bestellen">
                <button>BESTELLUNG PRÜFEN</button>
                </div>
                </form>
                <?php
        } else {
            echo "Keine Daten gefunden";
        }
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }

    // Verbindung schließen
    $pdo = null;
    }
    ?>
    
</body>
<footer>
<hr>
</footer>
</html>