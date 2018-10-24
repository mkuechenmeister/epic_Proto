<?php
    session_start();
    $visible = false;
    $errors = [
        "e1"=>"Datei zu groß",
        "e2"=>"Fehlerhafter Upload",
        "e3"=>"Unerlaubte Dateiendung",
        "e4"=>"Ungültiges Password",
        "e5"=>"Die Passwörter stimmen nicht überein",
        "e6"=>"ungültige Mailadresse",
        "e7"=>"Ungültiger Nachname",
        "e8"=>"Ungültiger Vorname",
        "e9"=>"Benutzername bereits vergeben",
        "e10"=>"Fehler in der Datenbankverbindung"
    ];

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        //letzte aktivität innerhalb von 30minuten
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/meter">
    <?php if(isset($cssSpecific)) {
        echo "<link rel=\"stylesheet\" href=\"$cssSpecific\">";
    }
        if (isset($js)){
            echo $js;
        }

        /*if(isset($jsCode)){
            echo $jsCode;
        }*/
    ?>
    <title><?=$pageTitle;?></title>
</head>
<body>