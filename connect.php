<?php
$name = $_POST['fname'];
$email = $_POST['email'];
$message = $_POST['msg'];

//connection of database 

$conn = new mysqli( 'localhost','root','', 'contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into information(name, email,message) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Sent Successfully...";
		$stmt->close();
		$conn->close();
	}

?>