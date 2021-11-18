
<?php
//la liste des fonctions de sessions
require('../functions/sessions_functions.php');


$message_for_user = "";
if (isset($_POST['mail']) && isset($_POST['pass']))
{
    $con = mysqli_connect("localhost","moise","deus","projet") OR DIE ("marche pas");
    $mail = $_POST['mail'];
    $d = $_POST['pass'];
    $result = mysqli_query($con,'SELECT email, password FROM user WHERE email="'.$mail.'"');
    while($tab = mysqli_fetch_assoc($result))
	{
	//Le mot de passe est correct	
        if (password_verify($d, $tab['password']))
        {
		//placer le cookie
		setSessionCookie($mail);
		//Effectuer une redirection
		header('Location: https://rocco.13h37.io/projet/');
	}else {
		$message_for_user = "Identifiants Incorrects";
	}
	}
}
	


  ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
	<title>Login</title>
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
      <!-- Tabs Titles -->
      <!-- Login Form -->
      <form action="connect.php" method="POST">
	<div class="alert alert-primary" role="alert">
	 <?= $message_for_user ?>
	</div>
      <h3  id="form-title">Connexion  a Vinyble</h3>
        <input type="text" id ="mail" class="fadeIn sixth" name="mail" placeholder="Adresse mail"required>
	<input type="password" id="password" class="fadeIn third" name="pass" placeholder="Mot de passe"required>
        <input type="submit" class="fadeIn seventh" value="Se connecter">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="/projet/auth/inscription.php">Vous n'avez toujours pas de compte ? Inscrivez-vous !</a>
      </div>

    </div>
  </div>
</body>
</html>
