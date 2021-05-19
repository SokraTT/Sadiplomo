<?php 
	
	$username = $_POST ["username"];
	$email = $_POST ["email"];
	$password = $_POST ["password"];


//bazastan dakavshireba  
	if (!empty($username) || !empy($email) || !empty($password)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "form";

		//kavshiri mgoni :/
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if(mysqli_connect_error()){
			die("Connect Error(".mysqli_connect_error().")" .mysqli_connect_error());
		} else{
			$SELECT = "SELECT email From registration Where email =? Limit 1";
			$INSERT = "INSERT into registration (username, email, password)";

			//ragaca azrze arvar raaris mara mainc :/
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("sss", $email, $username, $password,);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if ($rnum == 0) {
				$stmt->close();

						

			$stmt = $conn->prepare("insert into registration(username, email, password) values(?,?,?)");
				$stmt->bind_param("sss", $username, $email, $password);
				$stmt->execute();
				echo "registracia wamratebit dasrulda";
			}
			else{
				echo "msgavsi e-mail ukve arsebobs bazashi ";
			}
			$stmt->close();
			$conn->close();
		}

	} else {
		echo "Fill all";
		die();
	}
?>