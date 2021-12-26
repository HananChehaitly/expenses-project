<?php
include "connection.php";

$query ="Select c.name as cat, sum(e.amount) as sum from categories as c, expenses as e where c.id=e.category_id group by e.category_id";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
$i=0;
while($row = $result->fetch_assoc()){
    $temp_array[$i]=$row;
    $i++;

}

$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;  

?>