<?php
session_start();  //we need session for user id 
include "connection.php";
$user_id = $_SESSION["user_id"];
$date = $_POST["date"];
$d = strtotime($date);
$newformat = date('Y-m-d',$d);
$amount = (int) $_POST["amount"];
$categoryId = (int) $_POST["categoryId"];

$query ="Insert into expenses (users_id,date,amount,category_id) Values (?,?,?,?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("isii",$user_id,$newformat,$amount,$categoryId);
$stmt->execute();


$newformat= "'".$newformat."'";
$query2 ="Select date,amount,category_id from expenses where users_id= $user_id and date=$newformat and amount = $amount and category_id = $categoryId";
$stmt2 = $connection->prepare($query2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();

    $query3 ="Select name from categories where id = $categoryId";
    $stmt3 = $connection->prepare($query3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $row3 = $result3->fetch_assoc();
// So that on displayed table i have name not id .. 
    $row2["category_id"]=$row3["name"];

$json = json_encode($row2, JSON_PRETTY_PRINT);
echo $json;

