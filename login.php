<?php
    $pageTitle='LoginPage';
    $cssSpecific="css/loginGrid.css";

    require_once 'inc/init.php';
    if(isset($_SESSION['username'])){
        include_once("inc/nav2.php");
        $visible=true;
    }else {
        include_once "inc/nav1.php";
        $visible=false;
    }
    ?>
    <div class="container-grid">

        <div class="form">

            <form action="helper/check.php" method="post">


                <input class="username" id="uname" type="text" required placeholder="Benutzername" name="username">
                <input id="pw" type="password" placeholder="Passwort" minlength="6" required name="pwd">
                <button id="submit" name="submit">Login</button>



            </form>

            <a href="signup.php"><button value="signup" name="signup" id="signup">Sign up</button></a>

        </div>

    </div>
































<?php
    require_once 'inc/footer.php';
?>