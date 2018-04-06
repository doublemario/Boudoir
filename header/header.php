<?php
$root = str_ireplace(dirname(__DIR__, 2), 'http://localhost', __DIR__);
$root = str_ireplace('\\', '/', $root);
?>
<!doctype html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= $root ?>/style.css">
        <link rel="stylesheet" href="<?= $root ?>/home.css">
        <link rel="stylesheet" href="<?= $root ?>/contact.css">
        <link rel="stylesheet" href="<?= $root ?>/produits.css">
        <title>Le boudoir</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="#">
            <img src="<?= $root ?>/img/logo.png" width="50" height="50" alt="Logo">
            Le Boudoir
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item my-2 my-lg-0">
                    <a href="#" class="nav-link">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>