<?php

	//Obtenir les infos du User en lui donnant le cookie
	function getUserInfos($cookie){
		$con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "failed to connect to mysql: " . mysqli_connect_error();
                        exit();
		}
		$query = mysqli_query($con, 'select * from user where session_id="'.$cookie.'"');
		$tab = mysqli_fetch_assoc($query);
		return $tab;
				
	}
	
	//Obtenir les infos du User en lui donnant l'Id
	function getUserInfosById($id){
		$con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "failed to connect to mysql: " . mysqli_connect_error();
                        exit();
                }
                $query = mysqli_query($con, 'select * from user where id="'.$id.'"');
		$tab = mysqli_fetch_assoc($query);
		return $tab;
	}

	//Obtenir les vinyls que possede le User	
	function getUserVinyls($id){
		$con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "failed to connect to mysql: " . mysqli_connect_error();
                        exit();
                }

		$query = mysqli_query($con, 'SELECT * FROM vinyl WHERE owner_id="'.$id.'"');
		return $query;

	}


	//Obternir les vinyls que possede le User Mais qu'il a prete
	//Ce sont simplement les vinyls qui ne sont pas disponibles
	function getUserVinylsLend($id){
                $con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "failed to connect to mysql: " . mysqli_connect_error();
                        exit();
                }
                $query = mysqli_query($con, 'SELECT * FROM vinyl WHERE owner_id="'.$id.'"AND available=0');
                return $query;
	}


?>
