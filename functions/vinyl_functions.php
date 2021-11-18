<?php


	//Function to get the information of a vinyl
	function getVinylInfos($idVinyl){
		$con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "failed to connect to mysql: " . mysqli_connect_error();
                        exit();
                }
                $query = mysqli_query($con, 'select * from vinyl where id="'.$idVinyl.'"');
                $tab = mysqli_fetch_assoc($query);
                return $tab;
	

	}

	//function to get the owner of the vinyl
	function getVinylOwner($idOwner){
		$con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "failed to connect to mysql: " . mysqli_connect_error();
                        exit();
                }
                $query = mysqli_query($con, 'select * from user where id="'.$idOwner.'"');
                $tab = mysqli_fetch_assoc($query);
                return $tab;	

	}


	//function isOwner return true if the user is the owner, the idOwner is from cookie
	function isOwner($idOwner, $idVinyl){
		$con = mysqli_connect("localhost","moise","deus","projet");

                if (mysqli_connect_errno()) {
                        echo "failed to connect to mysql: " . mysqli_connect_error();
                        exit();
                }
                $query = mysqli_query($con, 'select * from vinyl where id="'.$idVinyl.'"');
                $tab = mysqli_fetch_assoc($query);
		if($tab["owner_id"] == $idOwner){
			return true;
		} else {
			return false;
		}
		
	}

?>
