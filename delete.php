<?php
include "connection.php";
$givenId = $_GET["id"]; 
//But remember the given form is deleted_(real table id),
$arr =  explode("_",$givenId);
$id = $arr[1];
$id = (int) $id;
$query ="Delete from expenses where id=$id";
$stmt = $connection->prepare($query);
$stmt->execute();

//I'm just going to return a json object that indicates the row id which we need to hide in html.
$rowId= [$id];
$json = json_encode($rowId, JSON_PRETTY_PRINT);
echo $json;  
