<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 04.10.2018
     * Time: 22:48
     */
    $cssSpecific = "css/gallery.css";
    $pageTitle = "Image Gallery'";
    require_once("inc/init.php");

    if(isset($_SESSION['username'])){
        include_once("inc/nav2.php");
        $visible=true;
    }else {
        include_once "inc/nav1.php";
        $visible=false;
    }

    if(!$visible) {

        ?>
        <h1 class="main elegantshadow">Um unsere Gallerie zu nutzen musst du dich einloggen</h1>
        <?php
        }else{


        include_once("helper/ddb.php");
        $uiD = $_SESSION['uID'];
        $prep = $db->prepare("select * from `gallery` where g_uid =?");
        $prep->execute(array($uiD));
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
        /*echo"<pre>";
        var_dump($result);
        var_dump($uiD);
        echo"</pre>";*/

       echo" <div class='gridContainer'>";

        foreach ($result as $img):
            $title = $img['g_title'];
            $path = $img['g_source'];

                ?>
                <div class="item">


                    <h2><?= $title ?></h2>
                    <a href="<?= $path ?>"><img class="photo" src="<?= $path ?>" alt="<?= $title ?>"
                                                title="<?= $title ?>"></a>

                </div>
                <?php
                       endforeach;
        echo"</div>";


    }
?>




