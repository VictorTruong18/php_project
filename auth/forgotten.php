<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Mot de passe oublié</title>
   </head>

   <body>

	<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../vendor/autoload.php';
	if(!isset($_POST['mail'])){
		include 'forgotten_form.php';	
	}
	else {
	// on enlève les whitespaces eventuels
	$_POST['mail'] = preg_replace('/\s+/', '', $_POST['mail']);
	if(!empty($_POST['mail'])){
		// vérification si l'adresse est valide
		if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
			include 'forgotten_form.php';	
			echo "Veuillez saisir une adresse mail valide";
		}
		else {
			$mail = new PHPMailer(true);
			try {
			$uuid = uniqid();
			$con = mysqli_connect("localhost","moise","deus","projet");
			// Check connection
			if (mysqli_connect_errno()) {
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  				exit();
			}
			$req=mysqli_query($con,"update user set verificationUUID='". $uuid . "'where email='" . $_POST['mail']  . "';");

			// A SUPPRIMER AU MERGE
			$lien_confirmation = "https://tashiro.13h37.io/projet/auth/confirm.php?uuid=" . $uuid;
			// A DECOMMENTER QUAND MERGE
			//$lien_confirmation = "https://minaro.13h37.io/projet/auth/confirm.php?uuid=" . $uuid;

    			//Recipients
    			$mail->setFrom('minaro@13h37.io', 'Minaro');
    			$mail->addAddress($_POST['mail']);     //Add a recipient
    			//Content
			$mail->isHTML(true); //Set email format to HTML
			$mail -> CharSet = "UTF-8";
			$mail->Subject = 'Récupération de mot de passe';
    			$mail->Body    = 'Bonjour, <br/> Veuillez confirmer votre mail en clickant sur ce <a href="'. $lien_confirmation . '">lien</a>.';
   			$mail->send();
			echo '<p>Merci! Un mail vous a été envoyé à l\'adresse : ' . $_POST['mail'] . '</p>';
			echo '<a href="/projet">Retour à l\'accueil</a>';
			} catch (Exception $e) {
    				echo "Le mail n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
			}
		}
	}
	else {
	include 'forgotten_form.php';	
	echo '<p>Erreur : veuillez renseigner une adresse mail.</p>';
	}
	}
	?>
   </body>
</html>
