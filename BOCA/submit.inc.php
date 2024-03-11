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
    <title>BOCA B2B WEBSHOP</title>
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
            <button>ABMELDEN</button>
        </form>
    </div>

<?php 

function set_order(object $pdo, int $orderId, int $userId, int $itemId, int $itemAmount ){
    $query = 'INSERT INTO boca.order (orderId, benutzerId, productsId, itemAmount) 
                            VALUES (:orderId, :benutzerId, :productsId, :itemAmount)';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':orderId', $orderId);
    $stmt->bindParam(':benutzerId', $userId);
    $stmt->bindParam(':productsId', $itemId);
    $stmt->bindParam(':itemAmount', $itemAmount);
    $stmt->execute();
    }



if($_SERVER['REQUEST_METHOD'] === "POST"){

    $item1 = (int)isset($_POST["item1"]) ? (int)$_POST["item1"] : 0;
    $item2 = (int)isset($_POST["item2"]) ? (int)$_POST["item2"] : 0;
    $item3 = (int)isset($_POST["item3"]) ? (int)$_POST["item3"] : 0;
    $item4 = (int)isset($_POST["item4"]) ? (int)$_POST["item4"] : 0;
    $item5 = (int)isset($_POST["item5"]) ? (int)$_POST["item5"] : 0;
    $item6 = (int)isset($_POST["item6"]) ? (int)$_POST["item6"] : 0;
    $item7 = (int)isset($_POST["item7"]) ? (int)$_POST["item7"] : 0;


    echo '<h3>'. $item1 .'</h3>' ;
    echo '<h3>'. $item2 .'</h3>' ;
    echo '<h3>'. $item3 .'</h3>' ;
    echo '<h3>'. $item4 .'</h3>' ;
    echo '<h3>'. $item5 .'</h3>' ;
    echo '<h3>'. $item6 .'</h3>' ;
    echo '<h3>'. $item7 .'</h3>' ;

    if($item1 > 0){
        set_order($pdo, 2, 9, 1, $item1);
    }
    if($item2 > 0){
        set_order($pdo, 2, 9, 2, $item2);
    }
    if($item3 > 0){
        set_order($pdo, 2, 9, 2, $item3);
    }
    if($item4 > 0){
        set_order($pdo, 2, 9, 2, $item4);
    }
    if($item5 > 0){
        set_order($pdo, 2, 9, 2, $item5);
    }
    if($item6 > 0){
        set_order($pdo, 2, 9, 2, $item6);
    }
    if($item7 > 0){
        set_order($pdo, 2, 9, 2, $item7);
    }






}

?>


</body>
</html>



