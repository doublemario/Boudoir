<?php
session_start();

$fichier = basename(__FILE__, '.php').PHP_EOL;
require_once 'admin/bdd.php';

if (isset($_SESSION['id'])){
    header('Location: admin/index.php');
}

if (!empty($_POST)){

    $error = '';

    $post = [];

    foreach ($_POST as $key => $item){
        $post[$key] = trim(strip_tags($item));
    }

    $result = $bdd -> prepare('SELECT * FROM users WHERE email = :email');
    $result -> bindValue(':email', $post['email']);
    $result -> execute();

    $email = $result -> fetch();

    if (!$email){
        $error = 'Identifiants invalides';
    }
    else{
        if (!password_verify($post['password'], $email['password'])){
            $error = 'Identifiants invalides';
        }

        if (empty($error)){
            $result = $bdd -> prepare('SELECT * FROM users WHERE email = :email');
            $result -> bindValue(':email', $post['email']);
            $result -> execute();

            $user = $result -> fetch();

            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            header('Location: admin/index.php');
        }
    }
}

?>

<?php
require_once 'admin/header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="post">
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button class="btn" id="bouton" type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'admin/footer.php';
?>