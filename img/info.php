<?php
   $im = new imagick('C:\xampp\htdocs\epic_Proto\img\pexels-photo-1110670.jpeg');
    $imageprops = $im->getImageGeometry();
    $width = $imageprops['width'];
    $height = $imageprops['height'];
    $number=200;
    //Querformat

    if($width>$height) {
        $faktor= $width/$height;
        $newHeight = $number;
        $newWidth = $newHeight * $faktor;
    }
    else //Hochformat
        {
        $faktor= $height/$width;
        $newWidth = $number;
        $newHeight=$newWidth*$faktor;
    }

    $im->resizeImage($newWidth,$newHeight, imagick::FILTER_LANCZOS ,0);
    //$im->cropImage ($newWidth,$newHeight,0,0);
    $im->writeImage( 'C:\xampp\htdocs\epic_Proto\img\th_80x80_test.jpg');
    echo '<img src="th_80x80_test.jpg">';
//phpinfo();


/*if (!extension_loaded('imagick')){
    echo 'imagick not installed';
}else{
    echo "ok";
}*/