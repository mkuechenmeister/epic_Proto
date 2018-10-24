<?php
    include_once ("../inc/init.php");
    require_once 'functions.php';
    $maxFileSize = 50; //hier in MB angeben.
    /*    echo $_POST['Upload'];*/

    //var_dump($_FILES['myimage']);
    //echo $_FILES['myimage'];
    //$destination = '\img';

    //move_uploaded_file ( $_FILES['myimage']['tmp_name'] , $destination );

    //$img= file_get_contents($_FILES['myimage']['tmp_name']);



    if (isset($_POST['submit_image'])){
        $maxFileSize=recalcToByte($maxFileSize);
        $file = $_FILES['myfile'];
        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileSize = $_FILES['myfile']['size'];
        $fileError = $_FILES['myfile']['error'];
        $fileType = $_FILES['myfile']['type'];

        $tempExt = explode('.',$fileName); //trennt den namen am Punkt auf und liefert ein Array retour
        $ext = strtolower(end($tempExt)); // holt den letzten eintrag(== extension) und macht ihn kleingeschrieben

        $allowed = ['jpg', 'jpeg', 'png'];


        // checkt ob Extention IN dem allowed Array ist
        if(in_array($ext,$allowed)){
            if ($fileError===0){
                //Prüfung der Dateigröße
                if ($fileSize< $maxFileSize){ //in Kb?? ToDo:KM Check das Format
                    //filesize ist in Byte
                    //vergabe eines Random generierten neuen Namens
                    $fileNameNew = uniqid('',true).'.'.$ext;
                    $fileDestination='../img/uploads/'.$fileNameNew;
                    //---------------------------------------------------------------------------------

                    if($_POST['radio']== 'edited') {

                        $im = new imagick($fileTmpName);
                        $imageprops = $im->getImageGeometry();
                        $width = $imageprops['width'];
                        $height = $imageprops['height'];
                        $number = 400;//Default wert von 400px

                        if(!($_POST['size']=="")){
                            //querformat
                            if ($width > $height && $_POST['size']<$width) {
                                $number = $_POST['size'];

                            }
                            if ($width < $height && $_POST['size']<$height) {
                                $number = $_POST['size'];

                            }
                            //var_dump($number);
                        }
                        //Querformat
                        //berechnung des Formates
                        if ($width > $height) {
                            $faktor = $height / $width;
                            $newWidth = $number;
                            $newHeight = $newWidth*$faktor;
                        } else
                            //Hochformat
                        {
                            $faktor = $width / $height;
                            $newHeight = $number;
                            $newWidth = $newHeight * $faktor;
                        }
                        //Bild mit neuem Format abspeichern
                        $im->resizeImage($newWidth, $newHeight, imagick::FILTER_LANCZOS, 0);
                        $imgSrc = "./img/uploads/$fileNameNew";
                        $im->writeImage('C:\xampp\htdocs\epic_Proto\img\uploads\\' . "$fileNameNew");

                        include_once ("../helper/ddb.php");
                        try {
                            $ginsert = $db->prepare("INSERT INTO `gallery`(`g_title`, `g_source`, `g_uid`, `g_visability`) VALUES (?,?,?,?)");
                            $ginsert->execute(array($_POST['titel'], $imgSrc, $_SESSION['uID'], 0));
                        }catch (Exception $e){
                            header("Location: ../upload.php?error=e10");
                        }
                        //todo km: fix the Visibility (User-Shares...)

                        header("Location: ../gallery.php");
                        exit();


/*                        <img src="../img/uploads/ <?= $fileNameNew ?>" alt="Uploaded Picture">*/


                    }else {



                        //-------------------------------------------------------------------
                        //Falls das Bild nicht bearbetet werden soll

                        move_uploaded_file($fileTmpName,$fileDestination); //(von,nach)

                        $imgSrc = "./img/uploads/$fileNameNew";
                        //Verknüpfen des geuploadeten Bildes mit der User-ID
                        include_once ("../helper/ddb.php");
                        try {
                            $ginsert = $db->prepare("INSERT INTO `gallery`(`g_title`, `g_source`, `g_uid`, `g_visability`) VALUES (?,?,?,?)");
                            $ginsert->execute(array($_POST['titel'], $imgSrc, $_SESSION['uID'], 0));//die 0 wäre die freigabe des Bildes
                        }catch (Exception $e){
                            header("Location: ../upload.php?error=e10");
                        }
                        //todo km: fix the Visibility (User shares img...)

                        header("Location: ../gallery.php");
                        exit();

                       // header('location: ../index.php?status=success');
                    }

                }else{
                    $errors[]= htmlspecialchars("Datei zu groß");
                    header('location:index.php?error=e1');//redirects to index.php
                    exit;
                }

            }else{
                $errors[]= "Fehlerhafter Upload!!";
                header('location:index.php?error=e2');//redirects to index.php
                exit;
            }

        }else{
            $errors[]= "Unerlaute Dateiendung!!";
            header('location:index.php?error=e3');//redirects to index.php
            exit;
        }
    }
?>



