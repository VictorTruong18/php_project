<?php

	function genererChaineAleatoire($longueur) {	
 		$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 		$longueurMax = strlen($caracteres);
 		$chaineAleatoire = '';
 		for ($i = 0; $i < $longueur; $i++)
 		{
 			$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 		}
		 return $chaineAleatoire;
	}	

	//Met en place le cookie id="session_id" valeur="cookie"
	//Ici le cookie est une chaine de caractere random	
	function setSessionCookie($email) {
		//Genere une chaine aleatoire de 20 caracteres
		$cookie = genererChaineAleatoire(20);
		//Ajoute la chaine de caractere dans la table du user
		$con = mysqli_connect("localhost","moise","deus","projet") OR DIE ("marche pas");
		$query = mysqli_query($con, "UPDATE `user` SET `session_id` = '".$cookie."' WHERE `user`.`email` = '".$email."';");
		//Verifier si la query a fonctionne
		if($query){
			//Metre le cookie sur le navigateur de l'utilisateur ( 1 semaine )
			setcookie('session_id', $cookie, time() + 7*24*3600, '/projet/', 'rocco.13h37.io', false, true );
			echo "setCookie function success";
		}else {
			echo "Bad query on setCookie Function";
		}
		

	}
?>
