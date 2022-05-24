<?php
	//Start session  
	session_start();
	
	//import connection to database
	include "koneksi/koneksi.php";

	//check if $_SESSION is exist
	if (isset($_SESSION)) {
		foreach ($_SESSION as $key => $val) {
			${$key} = $val;
		}


		$sql	= "INSERT INTO pendaftaran VALUES(null,'$full_name', '$stb', '$birth_place'
					, '$birth_date' ,'$gender', '$pstudi', '$fakultas', '$jkkn', '$ujaket'
					,'')";

		$exec 	= mysqli_query($conn,$sql);

		if ($exec) {

			$id 		= $conn->insert_id;
			//echo $id;
			$query 		= "INSERT INTO akun VALUES(null, '$email', '$password', '',1, $id)";

			$exec_akun 	=  mysqli_query($conn, $query);
			$query2		= "INSERT INTO detail_pendaftaran (id_user,status_pendaftaran)
						VALUES($id, 0)";

			$exec_detil	= mysqli_query($conn, $query2);

			if ($exec_akun && $exec_detil) {
				session_destroy();
				echo'<script> window.location="success_register.php"; </script> ';
			}else{
				echo mysqli_error($conn);
				echo 'gagal';
			}

		}else{
			echo mysqli_error($conn);
		}
	}
?>