<?php
include "connection.php";

if (isset($_POST["email"]) and $_POST["email"] !="")
	{
		$email = $_POST["email"];
	}else
	{
		die("Try again next time");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		die("Try again next time");
	}
$hashed = hash('sha256',$password);
$sql="Select * from users where username=? and password=?"; #Check if the email already exists in the database
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss",$email,$hashed);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please check your email and password";
    header('Location: storelogin.php');
}
else{
	session_start();
	$_SESSION["user_id"] = $row["id"];
	//$_SESSION["store_name"] = $row["name"];
	header('location: storehome.html');
}
?>