<?php
    header("Content type: image/png");
    $image = imagecreate(600, 50);  // 1. création image
    
    $green = imagecolorallocate($image, 45, 151, 21); // 2. coloration image
    $blue = imagecolorallocate($image, 0, 0, 190);

    imagestring($image, 4, 35, 15, "Enfin un peu de couleur", $blue);

    imagepng($image);  // 3. affichage
?>