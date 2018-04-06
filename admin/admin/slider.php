<?php
session_start();
$fichier = basename(__FILE__, '.php').PHP_EOL;
require_once '../bdd.php';

?>
<?php

if (!isset($_SESSION['id']) OR $_SESSION['role'] !== 'ROLE_ADMIN'){
    header('Location: home.php');
}
?>
<?php
require_once '../header.php';
?>

<?php

if(!empty($_FILES)) {
    if ($_FILES['picture']['error'] == 0) {
        if ($_FILES ['picture']['size'] < 20000000) {

            $fileInfo = pathinfo($_FILES['picture']['name']);
            $extensions_auto = ['jpg', 'jpeg', 'png'];
            $extension = strtolower($fileInfo ['extension']);

            if (in_array($extension, $extensions_auto)) {
                $newname = md5(uniqid(rand(), true));

                $newWidth = 200;

                if ($extension == 'jpg' OR $fileInfo['extension'] == 'jpeg') {
                    $newImage = imagecreatefromjpeg($_FILES['picture']['tmp_name']);
                } elseif ($extension == 'png') {
                    $newImage = imagecreatefrompng($_FILES['picture']['tmp_name']);
                }

                $imageWidth = imagesx($newImage);
                $imageHeight = imagesy($newImage);
                $newHeight = ($imageHeight * $newWidth) / $imageWidth;
                $miniature = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresampled($miniature, $newImage, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $newHeight);

                $thumbnailsFolder = 'thumbnails/';

                if ($extension == 'jpg') {
                    imagejpeg($miniature, $thumbnailsFolder . $newname . '.' . $fileInfo['extension']);
                } elseif ($extension == 'png') {
                    imagepng($miniature, $thumbnailsFolder . $newname . '.' . $fileInfo['extension']);
                }
                move_uploaded_file($_FILES['picture']['tmp_name'], 'thumbnails/' . $newname . '.' . $fileInfo['extension']);

                $bdd->query('INSERT INTO slider (picture) VALUES ("' . $newname . '.' . $fileInfo['extension'] . '")');
                //header('Location: users.php');
            } else {
                echo 'Extension interdite';
            }
        } else {
            echo 'Le fichier est trop gros';
        }

    }
}

  ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" id="shadow2">
            <h1>Ajouter une photo</h1>
            <form method="post" action="slider.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="file" name="picture" class="form-control" id="name">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

$resultat = $bdd->query('SELECT * FROM slider');
$affichageImage = $resultat->fetchAll(PDO::FETCH_ASSOC);

foreach ($affichageImage as $value){?>
    <img width="100" height="100" src="thumbnails/<?= $value ['picture'] ?>">

<?php }
?>



    <?php
    require_once '../footer.php';
    ?>