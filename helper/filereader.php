<?php
        //Dieses File checkt den Ist und sollbestand der Bilder


        $verzeichnis = '../img/uploads';
        $realPics = [];


// Test, ob es sich um ein Verzeichnis handelt
        if (is_dir($verzeichnis)) {
            // öffnen des Verzeichnisses
            if ($handle = opendir($verzeichnis)) {
                // einlesen der Verzeichnisses
                while (($file = readdir($handle)) !== false) {

                    $temp = array(".", "..");
                    if (!in_array($file, $temp)) {
                        $file="./img/uploads/".$file;
                        $realPics[] = $file;

                    }

                }
                closedir($handle);
            }
        }
        //asort($realPics);

    include_once("ddb.php");
        try {
            $prep = $db->prepare("select * from `gallery`");
            $prep->execute();
            $result = $prep->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){

        }

        foreach($result as $res){

            $inDB[]=$res['g_source'];
        }
       // asort($inDB);
        $diff=array_diff($inDB,$realPics);
        foreach ($diff as $lostItems) {


            try {
                $del = $db->prepare("DELETE FROM `gallery` WHERE `gallery`.`g_source` = ?");
                $del->execute(array($lostItems));
                header("Location: ../index.php");

            }catch (Exception $e){

            }
        }









?>