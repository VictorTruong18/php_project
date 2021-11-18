<!--Si vous avez compris pourquoi cette ligne est  ici vous comprenez pourquoi php est un language bizare-->
<?php
	require("../functions/vinyl_functions.php");
        $isCookie = isset($_COOKIE['session_id']);
	if(isset($_GET["vinylId"])){
		$vinylInfos = getVinylInfos($_GET['vinylId']);
		$ownerInfos = getVinylOwner($vinylInfos['owner_id']);		
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
	<div class="row">

        <div class="col-lg-3">
	<img class="profile-picture" width=90%  src="<?php echo $vinylInfos['picture1_id'] ?>" >
        </div>

        <div class="col-lg-9">
        <h3><?php echo $vinylInfos['name']  ?></h3 >
        <h5><?php echo $vinylInfos['artist_name'] ?></h5>
        <h5><?php echo $vinylInfos['released_year']?></h5>
	<h5> Available : <?php echo $vinylInfos['available']?></h5>
	<a href="https://rocco.13h37.io/projet/user/profil.php?userId=<?php echo $ownerInfos['id'] ?>"><h5> Proprietaire : <?php echo $ownerInfos['first_name'] ?> <?php echo $ownerInfos['last_name']  ?> </h5></a>
        </div>
      </div>

        </div>

 </div>
</section>
