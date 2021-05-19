<?php 
	
	$conn = mysqli_connect("localhost", "root", "", "form");

	if(isset($_post["submit"])){
		$username = $_post["username"];
		$password = $_post["password"];

		$sql = mysqli_query($conn, "SELECT count(*)
		as total from registration where username = '".$username."' and password = '".$password."'") 
		or die(mysqli_error($conn));

		$rw = mysqli_fetch_array($sql);

		if($rw = ['total'] > 0) {
		echo "log in successfuly"; 
	}
		else{
		echo "log in failed";			
		}
	}
	
?>