

<?php
    try {
        $db = new PDO('mysql:host=localhost:3306;dbname=epicUser', 'test', 'test');
        $db->query("SET NAMES utf8;"); // der fix für das Umlaute-Problem



}catch(Exception $e){
    echo "Connection Error";
    echo $e->getMessage();
}


