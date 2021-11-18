<?php
require("../functions/sessions_functions.php");
if (isset($_GET['uuid'])) {
                $con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                }
		$uuid = $_GET['uuid'];
		//Prendre l'email grace au UUID 
		$query = mysqli_query($con, 'SELECT email FROM user WHERE verificationUUID="'.$uuid.'"');
		$rep = mysqli_fetch_assoc($query);
		$email = $rep['email'];
		// met le champ à NULL pour dire que le compte est activé
                $req=mysqli_query($con,"update user set verificationUUID=NULL where verificationUUID='" . $_GET['uuid'] . "';");
                if($req != false){
			setSessionCookie($email);
		}
                else {
                }
                }
                else {
                }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Vinyble</title>
  <!--Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu" rel="stylesheet">
  <!--CCS Stylsheet-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 
 <link rel="stylesheet" href="../css/welcome.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>

  <section id="title">

    <!-- Nav Bar -->

<div class="container-fluid">
	<?php 
		if($isCookie){
                        include '/var/www/html/projet/components/navbar-connected.php';
                } else {
                        include '/var/www/html/projet/components/navbar-not-connected.php';
                }
	?>
      <!-- Title -->
	<?php
                if (isset($_GET['uuid'])) {
                $con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                }

                // met le champ à NULL pour dire que le compte est activé
                $req=mysqli_query($con,"update user set verificationUUID=NULL where verificationUUID='" . $_GET['uuid'] . "';");
                if($req != false){
                        echo "<h1>Votre mail a bien été confirmé. Merci.</h1>";
                        echo "<a href = 'panel.php'>Accéder au panel<br /></a>";
                }
                else {
                        echo "<h1>OOPS une erreur s'est produite. Veuillez contacter l'administrateur...</h1>";
                }
                }
                else {
                        echo "<h1>Perdu? <a href = '/projet'>Revenir à la page d'accueil</a> </h1>";
                }
?>
</div>

</section>
 </body>
</html>
