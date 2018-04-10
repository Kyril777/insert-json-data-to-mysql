<?php

// Connect to MySql
$db = new PDO('mysql:host=localhost;dbname=', '', '');

// Read the json file contents and convert json object into a php associative array,
$jsondata = file_get_contents('data.json');
$data = json_decode($jsondata, true);

// Prepare a php statement
$stmt = $db->prepare("INSERT into studentjsondata values(?,?,?,?,?,?,?)");

// Loop through the object and insert data into MySQL.
foreach ($data as $row){
  $stmt->bindParam(1, $row['id']);
  $stmt->bindParam(2, $row['name']);
  $stmt->bindParam(3, $row['major']);
  $stmt->bindParam(4, $row['address']['roomnumber']);
  $stmt->bindParam(5, $row['address']['dorm']);
  $stmt->bindParam(6, $row['address']['telephone']);
  $stmt->bindParam(7, $row['email']);
  $stmt->execute();
}

?>
