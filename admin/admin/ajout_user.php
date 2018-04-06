<?php
$fichier = basename(__FILE__, '.php').PHP_EOL;
require_once '../bdd.php';

?>
<?php

//if (isset($_SESSION['id']) AND $_SESSION['role'] == 'ROLE_ADMIN'){

?>
<?php
require_once '../header.php';
?>

<?php


        if(!empty($_POST)){
        $post = [];
        foreach ($_POST as $key => $value){

            $post[$key] = trim(strip_tags($value));
        }
        $errors = [];


        // -----------------------Vérification présence mail dans la base et autres erreurs

        $resultat = $bdd->prepare('SELECT id FROM users WHERE email = :email');
        $resultat -> bindValue(':email', $post['email']);
        $resultat->execute();
        $users = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if(count($users) > 0){
            $errors['email existe'] = 'adresse déja présente dans la base';
        }

        if(!isset($post['nom'])){
            $errors['nom'] = 'Aucune entrée';
        }

        if(!isset($post['password']) OR strlen($post['password']) <= 5 ){
            $errors['password'] = 'le mot de passe doit faire au moins 5 caractères';
        }

        if(!isset($post['email']) OR !filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email incorrect';
        }

        /*$role_auto = ['ROLE_ADMIN'];
        if(!in_array($post['role'], $role_auto)){
            $errors['role'] = 'Vous n\'avez pas la permission';
        }*/

        if(empty($errors)){
            $resultat = $bdd->prepare('INSERT INTO users (nom, email, password, role) VALUES (:nom, :email, :password, :role)');
            $resultat -> bindValue(':nom', $post['nom']);
            $resultat -> bindValue(':email', $post['email']);
            $resultat -> bindValue(':password', password_hash($post['password'], PASSWORD_DEFAULT));
            $resultat -> bindValue('role', $post['role']);

            if($resultat -> execute()){
                echo '<p class="alert alert-success"> Inscritption validée </p>';
            }

        }
        else{
            foreach($errors as $error){
                echo '<p class="alert alert-danger"> ' . $error . ' </p>';
            }
        }
    }

    ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="d-flex justify-content-center">Ajouter un utilisateur</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="nom" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <select name="role" class="form-control" id="role">
                            <option value="ROLE_SELLER">Vendeur</option>
                            <option value="ROLE_ADMIN">Administrateur</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Ajouter</button>
                </form>
            </div>
        </div>
        <?php
        // --------------Suppression utilisateur--------------------
        if(!empty($_GET['deleteUser']) AND is_numeric($_GET['deleteUser'])){
            $resultat = $bdd->prepare('DELETE FROM users WHERE id = :supp');
            $resultat ->bindValue(':supp', $_GET['deleteUser']);
            $resultat ->execute();
            $validate = 'utilisateur supprimé';
        }
        ?>
        <?php if (isset($validate)) : ?>
            <div class="alert alert-success">
                <?= $validate ?>
            </div>
        <?php endif; ?>
        <div class="row justify-content-between" style="height: 200px; padding: 100px">
            <ul class="list-group">
                <h2>ADMIN</h2>
                <?php
                // --------------Affichage des admins--------------------
                    $resultat = $bdd ->query('SElECT nom, id FROM users WHERE role = "ROLE_ADMIN"');
                    $vendeurs = $resultat ->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($vendeurs as $vendeur){
                        ?>
                        <li class="list-group-item">
                            <?= $vendeur['nom'] ?>

                            <a href="# <?= $vendeur['id'] ?>"<i class="fas fa-edit"></i> modifier</a>
                            <a href="ajout_user.php?deleteUser=<?= $vendeur['id'] ?>"<i class=""></i> supprimer</a>
                        </li>
                    <?php
                    }
                    ?>
            </ul>


            <ul class="list-group">
                <h2>SELLER</h2>
                <?php
                // --------------Affichage des vendeurs--------------------
                $resultat = $bdd ->query('SElECT nom, id FROM users WHERE role = "ROLE_SELLER"');
                $vendeurs = $resultat ->fetchAll(PDO::FETCH_ASSOC);
                foreach ($vendeurs as $vendeur){
                    ?>
                    <li class="list-group-item">
                        <?= $vendeur['nom'] ?>

                        <a href="# <?= $vendeur['id'] ?>"<i class=""></i> modifier</a>
                        <a href="ajout_user.php?deleteUser=<?= $vendeur['id'] ?>"<i class=""></i> supprimer</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
<?php
//}
 ?>
<?php
require_once '../footer.php';
?>
