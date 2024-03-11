<?php
require_once 'includes/dbhandler.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>


<!DOCTYPE html>
<html lang=de>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style1.css">
    <title>BOCA B2B Websho</title>
</head>

<body>
    <h2>BOCA B2B WEBSHOP</h2>
    <hr>
    <?php
    session_start();
    ?>
    <div class="abmelden">
        <?php
            output_username(); 
        ?>
        <form action=includes/logout.inc.php method="post">  
            <button>ZUR ANMELDUNG</button>
        </form>
    </div>
        <form action="submit.inc.php" method="post">

<?php

function check_amount(int $item){
    if ($item < 0){
        $item = 0;
        return $item;
    }else{return $item;}
}

if($_SERVER['REQUEST_METHOD'] === "POST"){


    $item1 = check_amount((int)$_POST["order1"]);
    $item2 = check_amount((int)$_POST["order2"]);
    $item3 = check_amount((int)$_POST["order3"]);
    $item4 = check_amount((int)$_POST["order4"]);  
    $item5 = check_amount((int)$_POST["order5"]);
    $item6 = check_amount((int)$_POST["order6"]);
    $item7 = check_amount((int)$_POST["order7"]);

    if ($item1 == 0 && $item2 == 0 && $item3 == 0 && $item4 == 0 && $item5 == 0 && $item6 == 0 && $item7 == 0){
        header('Location: ../index.php');
        die();
    } else{
        $ggprice = 0;
        echo"<br>";
        echo "<table border='1'>";
        echo "<tr><th>Produkt-ID</th><th>Name</th><th>Preis</th><th>Anzahl</th><th>Gesamtpreis</th></tr>";

        if($item1 > 0){
            $stmt = $pdo->prepare("SELECT * FROM boca.products WHERE id_products = 1;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $id1 = $row["id_products"];
            $name1 = $row["name_products"];
            $price1 = $row["preis_products"];
            $gprice1 = (float)$row["preis_products"] * $item1;
            $ggprice += $gprice1;

            echo "<tr>";
            echo "<td>" . $id1 . "</td>";
            echo "<td>" . $name1 . "</td>";
            echo "<td>" . $price1 . " €</td>";
            echo "<td><input type='text' name='item".$id1."' value='$item1' readonly></td>";
            echo "<td>" . $gprice1 . " €</td>";
        }
        if($item2 > 0){
            $stmt = $pdo->prepare("SELECT * FROM boca.products WHERE id_products = 2;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $id2 = $row["id_products"];
            $name2 = $row["name_products"];
            $price2 = $row["preis_products"];
            $gprice2 = (float)$row["preis_products"] * $item2;
            $ggprice += $gprice2;

            echo "<tr>";
            echo "<td>" . $id2 . "</td>";
            echo "<td>" . $name2 . "</td>";
            echo "<td>" . $price2 . " €</td>";
            echo "<td><input type='text' name='item".$id2."' value='$item2' readonly></td>";
            echo "<td>" . $gprice2 . " €</td>";
        }
        if($item3 > 0){
            $stmt = $pdo->prepare("SELECT * FROM boca.products WHERE id_products = 3;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $id3 = $row["id_products"];
            $name3 = $row["name_products"];
            $price3 = $row["preis_products"];
            $gprice3 = (float)$row["preis_products"] * $item3;
            $ggprice += $gprice3;

            echo "<tr>";
            echo "<td>" . $id3 . "</td>";
            echo "<td>" . $name3 . "</td>";
            echo "<td>" . $price3 . "€</td>";
            echo "<td><input type='text' name='item".$id3."' value='$item3' readonly></td>";
            echo "<td>" . $gprice3 . " €</td>";
        }
        if($item4 > 0){
            $stmt = $pdo->prepare("SELECT * FROM boca.products WHERE id_products = 4;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $id4 = $row["id_products"];
            $name4 = $row["name_products"];
            $price4 = $row["preis_products"];
            $gprice4 = (float)$row["preis_products"] * $item4;
            $ggprice += $gprice4;

            echo "<tr>";
            echo "<td>" . $id4 . "</td>";
            echo "<td>" . $name4 . "</td>";
            echo "<td>" . $price4 . "€</td>";
            echo "<td><input type='text' name='item".$id4."' value='$item4' readonly></td>";
            echo "<td>" . $gprice4 . " €</td>";
        }
        if($item5 > 0){
            $stmt = $pdo->prepare("SELECT * FROM boca.products WHERE id_products = 5;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $id5 = $row["id_products"];
            $name5 = $row["name_products"];
            $price5 = $row["preis_products"];
            $gprice5 = (float)$row["preis_products"] * $item5;
            $ggprice += $gprice5;

            echo "<tr>";
            echo "<td>" . $id5 . "</td>";
            echo "<td>" . $name5 . "</td>";
            echo "<td>" . $price5 . "€</td>";
            echo "<td><input type='text' name='item".$id5."' value='$item5' readonly></td>";
            echo "<td>" . $gprice5 . " €</td>";
        }
        if($item6 > 0){
            $stmt = $pdo->prepare("SELECT * FROM boca.products WHERE id_products = 6;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $id6 = $row["id_products"];
            $name6 = $row["name_products"];
            $price6 = $row["preis_products"];
            $gprice6 = (float)$row["preis_products"] * $item6;
            $ggprice+= $gprice6;

            echo "<tr>";
            echo "<td>" . $id6 . "</td>";
            echo "<td>" . $name6 . "</td>";
            echo "<td>" . $price6 . "€</td>";
            echo "<td><input type='text' name='item".$id6."' value='$item6' readonly></td>";
            echo "<td>" . $gprice6 . " €</td>";
        }
        if($item7 > 0){
            $stmt = $pdo->prepare("SELECT * FROM boca.products WHERE id_products = 7;");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $id7 = $row["id_products"];
            $name7 = $row["name_products"];
            $price7 = $row["preis_products"];
            $gprice7 = (float)$row["preis_products"] * $item7;
            $ggprice += $gprice7;

            echo "<tr>";
            echo "<td>" . $id7 . "</td>";
            echo "<td>" . $name7 . "</td>";
            echo "<td>" . $price7 . " €</td>";
            echo "<td><input type='text' name='item".$id7."' value='$item7' readonly></td>";
            echo "<td>" . $gprice7 . " €</td>";
        }
        if($ggprice > 0){
            echo "<tr>";
            echo "<td>Gesamtpreis</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td name='ggpreis'>" . $ggprice . " €</td>";
        }
        echo "</table>"; 
        $pdo = null;
    }
    
} 
?>
<br>
<?php
if(isset($_SESSION['user_id'])){ ?>

    <div class="bestellen">
        <button>JETZT KOSTENPFLICHTIG BESTELLEN</button>
    </div>
</form>
<?php } ?>
</body>
<footer>
    <hr>
</footer>
</html>