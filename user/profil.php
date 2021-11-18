<!--Si vous avez compris pourquoi cette ligne est  ici vous comprenez pourquoi php est un language bizare-->
<?php
	require('../functions/user_functions.php');
	$isCookie = isset($_COOKIE['session_id']);
	$cookie = $_COOKIE['session_id'];
	

	
	//Si on visite le profil d'une personne on aura un champ dans get
	if(isset($_GET['userId'])){
	  //Reccupere les infos du profile visite 
	   $userInfos = getUserInfosById($_GET['userId']);
	   //Reccupere tous les vinyls qui appartiennent a l'utilisateur
	   $vinyls = getUserVinyls($_GET['userId']);
	   //reccupere les vinyls que l'utilisateur a prete
	   $vinylslend = getuserVinylsLend($_GET['userId']);

	} else {
	 //Reccupere toutes les informations du User dans le cookie
          $userInfos = getUserInfos($cookie);

         //Reccupere tous les vinyls qui appartiennent a l'utilisateur
         $vinyls = getUserVinyls($userInfos['id']);   
		
	  //reccupere les vinyls que l'utilisateur a prete
	  $vinylslend = getuserVinylsLend($userInfos['id']);
	  
	}	

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Profile</title>
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
<div class="row">

        <div class="col-lg-3">
		<img class="profile-picture" width=90%  src="https://avatarfiles.alphacoders.com/193/193523.jpg" >
	</div>

	<div class="col-lg-9">
	<h3><?php echo $userInfos['first_name']  ?> <?php  echo $userInfos['last_name']?></h3 >
	<h5><?php echo $userInfos['email'] ?></h5>
	<h5><?php echo $userInfos['phone_number']?></h5>
	<h5><?php echo $userInfos['ville']?></h5>
        </div>
      </div>

	</div>
</section>

<section id="features">
	<h3>Ma collection de vinyles </h3>
	<br/>
	<div class="card-deck">
<?php 
	while($row = mysqli_fetch_assoc($vinyls)){
	      $name = $row['name'];
	      $image = $row['picture1_id'];
      	      $artist = $row['artist_name'];
	      $year = $row['released_year'];
	      $availibility = $row['available'];	      
	      $id = $row['id'];
print <<<EOF
<div class="card">
<a href="https://rocco.13h37.io/projet/vinyl/vinyl.php?vinylId=$id">
<img class="card-img-top" src="$image" alt="Card image cap">
<div class="card-body">
<h5 class="card-title">$name</h5>
<p class="card-text">$artist </p$>
<p class="card-text"><small class="text-muted">$year - Available : $availibility</small></p>
</div>
</a>
</div>
EOF;
		
	}

?>
	</div>

</section>

<section id="features">
        <h3>Les vinyles que j'ai prete </h3>
        <br/>
        <div class="card-deck">
<?php
        while($row = mysqli_fetch_assoc($vinylslend)){
              $name = $row['name'];
              $image = $row['picture1_id'];
              $artist = $row['artist_name'];
              $year = $row['released_year'];
              $availibility = $row['available'];
              $id = $row['id'];
print <<<EOF
<div class="card">
<a href="https://rocco.13h37.io/projet/vinyl/vinyl.php?vinylId=$id">
<img class="card-img-top" src="$image" alt="Card image cap">
<div class="card-body">
<h5 class="card-title">$name</h5>
<p class="card-text">$artist </p$>
<p class="card-text"><small class="text-muted">$year - Available : $availibility</small></p>
</div>
</a>
</div>
EOF;

        }

?>
        </div>

</section>
