<?php include('../header/header.php');

// Pour pouvoir utiliser nos dépendances, on fait un require sur le fichier autoload.php généré par composer
	require_once('../vendor/autoload.php');


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	if(!empty($_POST)){
	$mail = new PHPMailer();

	// utilisation d'un stmp pour envoyer le mail
	$mail->isSMTP();
	$mail->Host ='mail.gmx.com';

	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->SMTPAuth = true;
	$mail->Username = 'promo5wf3@gmx.fr';
	$mail->Password = 'ttttttttt33'; // 9 t
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	// expéditeur ou destinataire du mail
	$mail->setFrom('promo5wf3@gmx.fr', 'Le Boudoir');
	$mail->addAddress('b.belmehdi@jbrel.fr', 'bilal');
	// On peut ajouter des cc
	// $mail->addCC('mail@truc.fr')

	// Affichage au format html
	$mail->isHTML(true);

	// Contenu du mail
	$mail->Subject = 'Mon sujet';

	$message ='Le client  ' . $_POST['name'].' <br>  ';

    if(!empty($_POST["entreprise"])){
        $message .= 'De l\'entreprise ' . $_POST['entreprise'] .'<br>';
    }

    $message .= ' mail: ' .$_POST['mail'].'<br> vous a laissé le message suivant'.$_POST['msg'];



	$mail->Body = $message;

	// Envoie du mail
	if(!$mail->send()){
        // echec de l'envoi
        echo 'Erreur : ' . $mail->ErrorInfo;
    }
    else{
        echo 'Mail envoyé';
    }
}
?>

		<section class="container-fluid" id="block">
			<div class="row justify-content-between  align-items-center">
				<div class="col-12 col-md-4 col-lg-4">
					<h3>Nous contacter</h3>	
						<form method="POST" action="">
							<div class="form-group">
							   <label>Nom</label>
							   <input name="name" type="text" class="form-control" placeholder="Entrez votre Nom...">
							</div>
							<div class="form-group">
							   <label>Entreprise (optionnel)</label>
							   <input name="entreprise" type="text" class="form-control" placeholder="Entrez le nom de votre entreprise...">
							</div>

							<div class="form-group">
							   <label>E-mail</label>
							   <input name="mail" type="email" class="form-control" placeholder="Entrez votre e-mail...">
							</div>
							<div class="form-group">
						    	<label>Message</label>
						    	<textarea name="msg" class="form-control" placeholder="Ecrive votre message..." rows="6"></textarea>
						  	</div>							
							<button type="submit" class="btn btn-block btn-primary">Envoyer</button>
						</form>
				</div>
				<div class="col-12 col-md-7 col-lg-7">
					<div class="row justify-content-center">
						
							<div class="col-12 col-sm-6 col-md-6 col-lg-4">
								<address>
									<h4><strong>Le boudoir</strong></h4>
									66 rue Abbée de l'Epée<br/>
									33 000 Bordeaux<br/>
									France
								</address>
							</div>
							<div class="col align-self-center col-12 col-sm-6 col-md-6 col-lg-4">
								<address>
									<a href="#">06.78.45.58.51</a><br/>
									<a href="#">contact@leboudoir.com</a>
								</address>
							</div>
						
					</div>
					<div id="map"></div>	
				</div>
			</div>
		</section>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCywUw56BHIHPTtDCS8Fvlm6cq2LOcs6Fo&callback=initMap">
    </script>

<?php require_once ('../footer/footer.php'); ?>