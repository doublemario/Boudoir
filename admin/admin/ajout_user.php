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


        // Vérification présence mail dans la base
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
            <div class="col-md-9">
                <h1>Ajouter un utilisateur</h1>
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
                            <option value="ROLE_USER">Vendeur</option>
                            <option value="ROLE_ADMIN">Administrateur</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Ajouter</button>
                </form>
            </div>
        </div>
        <div class="row border" style="height: 200px">

        </div>
    </div>
<?php
//}
 ?>
<?php
require_once '../footer.php';
?>
