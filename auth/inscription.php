<?php $message_for_user = "Site en accord avec RGPD"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
//Load Composer's autoloader



if (isset($_POST['pass']) && isset($_POST['pass2']))
{
	if ($_POST['pass'] != $_POST['pass2'])
	{

		$message_for_user =  'pass differents';
	}
	
	elseif (($_POST['mail']) != '' && ($_POST['prenom']) != '' && ($_POST['nom']) != '' && ($_POST['phone']) != '')
	{
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];
	$prenom=$_POST['prenom'];
	$email=$_POST['mail'];
	$phone = $_POST['phone'];
	$ville = $_POST['ville'];
	$con = mysqli_connect("localhost",'moise','deus','projet') OR DIE("marche pas");
	
	$result = mysqli_query($con,'SELECT * FROM user WHERE email = "'.$email.'"');
	$b = mysqli_num_rows($result) > 0;
		if ($b)
		{
			$message_for_user =  'mail already exists';
		}
		else
	{
		$code = password_hash($pass, PASSWORD_DEFAULT);
		$l = uniqid();
		$query = mysqli_query($con,'INSERT INTO user VALUES (DEFAULT,"'.$email.'","'.$code.'","'.$phone.'","'.$l.'","'.$prenom.'","'.$nom.'",null,null, "'.$ville.'",null )');


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->Port       = 443;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('neighborrows@community.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient

   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Valider votre mail';
    $mail->Body    = 'Bienvenue chez Vinyble ! Cliquez <a href="rocco.13h37.io/projet/auth/confirm.php?uuid='.$l.'">ici</a> pour rejoindre la communauté !';

    $mail->send();
    $message_for_user = 'Verification mail sent';
} catch (Exception $e) {
    $message_for_user =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
		
	}
	}
	else {
		$message_for_user =  'il faut remplir chaque champ';
	}

}?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
  <title>Register</title>
  <!--Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu" rel="stylesheet">
  <!--CCS Stylsheet-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/welcome.css">
  <link rel="stylesheet" href="../css/inscription.css">
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </head>

   <body>
<section id="title">
<div class="container-fluid">
	<?php include '/var/www/html/projet/components/navbar-not-connected.php';?>
 <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles --

      <!-- Login Form -->
      <form action="inscription.php" method="POST">
	<div class="alert alert-primary" role="alert">
  	 <?= $message_for_user ?> 
	</div>
      <h3  id="form-title">Inscription a Vinyble</h3>
        <input type="text" id ="nom" class="fadeIn fourth" name="nom"placeholder="Nom"required>
        <input type="text" id ="prenom" class="fadeIn fith" name="prenom"placeholder="Prénom"required>
        <input type="text" id ="mail" class="fadeIn sixth" name="mail" placeholder="Adresse mail"required>
        <input type="text" id="telephone" class="fadeIn second" name="phone" placeholder="Numero de Telephone"required>
        <input type="text" id="ville" class="fadeIn second" name="ville" placeholder="Ville" required>
	<input type="password" id="password" class="fadeIn third" name="pass" placeholder="Mot de passe"required>
	<input type="password" id="password" class="fadeIn third" name="pass2" placeholder="Mot de passe"required>
        <input type="submit" class="fadeIn seventh" value="S'inscrire">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="/projet/auth/connect.php">Vous possédez déjà un compte? Connectez-vous !</a>
      </div>

    </div> 
  </div>

</body>
</html>
