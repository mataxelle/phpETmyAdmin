<?php
    header('Content-type: image/png');
    /*$imageForme = imagecreate(200, 200);  // ex image pour ImageSetPixel et ImageRectangle

    $pink = imagecolorallocate($imageForme, 242, 205, 234);
    $black = imagecolorallocate($imageForme, 0, 0, 0);

    ImageSetPixel($imageForme, 100, 100, $black);
    ImageRectangle($imageForme, 30, 30, 160, 120, $black);

    imagepng($imageForme);*/


    // Fusion de deux image            LE LOGO N'APPARAIT PAS DU TOUT AVEC PARTIE A ET B??????
    //chargement des images
    $imagebanniere = imagecreatefrompng("atom.png");  // image de destination
    $atomlogo = imagecreatefrompng("logo.png");  // logo

    // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image   PartieA
    /*$largeur_atomlogo = imagesx($atomlogo);
    $hauteur_atomlogo = imagesy($atomlogo);
    $largeur_imagebanniere = imagesx($imagebanniere);
    $hauteur_imagebanniere = imagesy($imagebanniere);*/
    
    // placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo   PartieB
    /*$destination_x = $largeur_atomlogo - $largeur_imagebanniere;
    $destination_y = $hauteur_atomlogo - $hauteur_imagebanniere;*/

    // On met le logo (source) dans l'image de destination (la photo)
    //imagecopymerge($imagebanniere, $atomlogo, $destination_x, $destination_y, 0, 0, $largeur_atomlogo, $hauteur_atomlogo, 70);
    imagecopymerge($imagebanniere, $atomlogo, 10, 10, 0, 0, 100, 50, 70);

    // On affiche l'image de destination qui a été fusionnée avec le logo
    imagepng($imagebanniere);

?>