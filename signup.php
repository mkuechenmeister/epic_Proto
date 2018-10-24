<?php
    $pageTitle='Signup to our Library';
    $cssSpecific="css/home.css";
    $js="<script src=\"https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js\"></script>";
    $jsCode="<script type=\"text/javascript\" src=\"js/ampel.js\"></script>";
    require_once 'inc/init.php';

    if(isset($_SESSION['username'])){
        include_once("inc/nav2.php");
        $visible=true;
    }else {
        include_once "inc/nav1.php";
        $visible=false;
    }?>


    <div class="signup main">

        <?php
            if(isset($_GET['error'])){
                echo"<h1 class='elegantshadow'>";

                echo $errors[$_GET['error']];
                echo "</h1>";
            }
        ?>

        <div class="form">
            <form action="inc/dbSignup.php" method="post" class="signup">
                <input type="text" name="fname" required placeholder="First name"><br>
                <input type="text" name="lname" required placeholder="Last name"><br>
                <input type="email" name="mail" required placeholder="Your E-Mail adresss"><br>
                <input type="text" name="username" required placeholder="Username"><br>
                <input type="password" id="password" name="pwd1" required placeholder="Password"><br>
                <input type="password" id ="password2" name="pwd2" required placeholder="retype"><br>
                <p id="pwdhint">Ein gutes Passwort besteht aus mindestens 6 Zeichen, groß und Kleinbuchstaben sowie mindestens einer Zahl</p>
                <p id="submitLeer"  style="color:blue;" >An dieser Stelle erscheint nach prüfung deiner Passworteingabe der SUBMIT-Button</p>



                <button id="submit">Sign Up</button>

                <section>
                        <!--todo KM: Ampel auf 3 Stellen-->
                    <meter max="4" id="password-strength-meter"></meter>
                    <br>
                    <p id="password-strength-text"></p><br>
                </section>
            </form>



        </div>

    </div>























<?php
    require_once 'inc/footer.php';
?>