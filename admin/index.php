<?php
session_start();
if (!isset($_SESSION['id'])){
    header('Location: ../index.php');
}
$fichier = basename(__FILE__, '.php').PHP_EOL;
require_once 'bdd.php';
if (isset($_GET['userDeco'])){
    session_destroy();
    header('Location: ../index.php');
}
?>
<?php
require_once 'header.php';
?>
    <a href="index.php?userDeco">Deconnexion</a>
    <div class="container" id="menu">
        <div class="row justify-content-center">
            <div class="col-6 border rounded pt-2" id="shadow">
                <h3>Admin</h3>
                <a href="admin/slider.php" class="col-12 btn mb-3 mt-2">Modifier la photo de couverture</a>
                <a href="admin/users.php" class="col-12 btn btn-dark mb-3">Gérer les utilisateurs</a>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-6 border rounded pt-2" id="shadow">
                <h3>Vendeur</h3>
                <a href="seller/shop.php" class="col-12 btn mb-3 mt-2">Coordonnées de la boutique</a>
                <a href="seller/products.php" class="col-12 btn mb-3 mt-2">Gérer les produits</a>
            </div>
        </div>
    </div>
<?php
require_once 'footer.php';
?>