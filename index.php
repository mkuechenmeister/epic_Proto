<?php

    $pageTitle= "Welcome";
    $cssSpecific="css/home.css";


    require_once 'inc/init.php';

    if(isset($_SESSION['username'])){
        include_once("inc/nav2.php");
        $visible=true;
    }else {
        include_once "inc/nav1.php";
        $visible=false;
    }

    if(!$visible){

    ?>

    <div class="main">
    
    <h1 class="elegantshadow"><?=$pageTitle?></h1>

        <p>Herzlich Willkommen</p>
        <p>Um die Web-App verwenden zu können musst du dich <a href="login.php">anmelden</a></p>
        <p>Solltest du noch keine Zugangsdaten haben kannst du gernen einen <a href="signup.php">Account erstellen</a></p>


    </div>




    
<?php
    }else
        {
        ?>

<div class="main">

    <h1 class="elegantshadow"><?=$pageTitle?></h1>

    <p><strong>Hallo <?=$_SESSION['firstName']?> </strong><br>Da du nun angemeldet bist kannst du alle features der App nutzen</p>

</div>
<?php
}

    require_once 'inc/footer.php';
?>

