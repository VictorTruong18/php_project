
<!--Si vous avez compris pourquoi cette ligne est  ici vous comprenez pourquoi php est un language bizare-->
<?php 

	$isCookie = isset($_COOKIE['session_id'])

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
 <link rel="stylesheet" href="css/welcome.css">
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

      <div class="row">

        <div class="col-lg-6">
          <h1>La plateforme leader d'echange de Vinyles.</h1>
          <a href="/projet/auth/connect.php"><button type="button"  class="btn btn-dark btn-lg download-button" ><i class="fas fa-user"></i>Login</button></a>
          <a href="/projet/auth/inscription.php"><button type="button"  class="btn btn-outline-light btn-lg download-button"><i class="fas fa-user-plus"></i>Register</button></a>
        </div>

        <div class="col-lg-6">
          <img class="title-image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Disque_Vinyl.svg/1024px-Disque_Vinyl.svg.png" alt="iphone-mockup">
        </div>
      </div>
</div>




</section>


  <!-- Features -->

  <section id="features">
    <div class="row">
      <div class="feature-box col-lg-4 col-md-12 col-sm-12">
          <i class="icon fas fa-check-circle fa-4x"></i>
        <h3>Facile d'Utilisation.</h3>
        <p>Facilement utilisable emprunter des vinyles en quelques cliques.</p>
      </div>
      <div class="feature-box col-lg-4 col-md-12 col-sm-12 ">
        <i class="icon fas fa-bullseye fa-4x"></i>
        <h3>Clientèle d'Elite</h3>
        <p>Beaucoup de puristes déjà sur vinyble.</p>
      </div>
      <div class="feature-box col-lg-4 col-md-12 col-sm-12">
        <i class="icon fas fa-heart fa-4x"></i>
        <h3>La Meilleur Application</h3>
        <p>Vinyble a déjà été adopté par des milliers de personnes.</p>
      </div>
    </div>
  </section>



  <!-- Footer -->

  <footer id="footer">

    <p>© Copyright 2021 - Vinyble</p>

  </footer>


</body>

</html>
