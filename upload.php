<?php

    $pageTitle= "Upload your Files";
    $cssSpecific="css/home.css";


    require_once 'inc/init.php';

    if(isset($_SESSION['username'])){
        include_once("inc/nav2.php");
        $visible=true;
    }else {
        include_once "inc/nav1.php";
        $visible=false;
    }

    if(isset($_GET['error'])){

    if(array_key_exists($_GET['error'],$errors)) {
        echo "<H1>";
        echo $errors[$_GET['error']];
        echo "</H1>";
    }else{
        header('location: index.php');
    }


}else{
if($visible) {
    ?>

    <form class="upload main" method="POST" action="inc/getdata.php" enctype="multipart/form-data">
        <input type="file" name="myfile"><br>

        <label for="raw">Originalgröße beibehalten</label>
        <input type="radio" required name="radio" id="raw" value="raw"><br>
        <label for="edit">Bild beschneiden</label>
        <input type="radio" required id="edit" name="radio" value="edited" checked="checked"><br>
        <input type="text" name="size" placeholder="Längste Seite eingeben"><br><br>
        <input type="text" name="titel" placeholder="Titel" required><br>
        <input type="submit" name="submit_image" value="Upload">

    </form>


    <?php
} else{
    ?>
    <div class="main">
        <h1>Bitte melde dich an</h1>
    </div>
<?php
}
}

require_once 'inc/footer.php';
?>

