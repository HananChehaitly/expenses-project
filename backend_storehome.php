<?php
include "connection.php";

$query ="Select * from expenses";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
$i=0;
while($row = $result->fetch_assoc()){
//I want to retrive category name before ..
    $query1 ="Select name from categories where id = ?";
    $stmt1 = $connection->prepare($query1);
    $stmt1->bind_param("i",$row['category_id']);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
// So that on displayed table i have name not id .. 
    $row["category_id"]=$row1["name"];
    
    
//Here is the important bit    
    $temp_array[$i]=$row;
    $i++;
}


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;  
