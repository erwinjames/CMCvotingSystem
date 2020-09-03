<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = $_POST['password'];
		$extend_user=00;

		$sql = "SELECT * FROM voters WHERE id = '$extend_user'+'$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the ID';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				if ($row['status']==1) {
					$_SESSION['voter'] = $row['id'];
				}
				else{

					 	$_SESSION['error'] = 'user disabled/not active Please contact your administrator';
				}
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}

	header('location: index.php');

?>