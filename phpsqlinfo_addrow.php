<?php
require("phpsqlajax_dbinfo.php");

// Gets data from URL parameters.
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];

// Opens a connection to a MySQL server.
$connection = new mysqli('localhost', $username, $password, $database);

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Inserts new row with place data.
$query = sprintf("INSERT INTO markers " .
         " (id, name, address, lat, lng, type ) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s');",
         $connection->real_escape_string($name),
         $connection->real_escape_string($address),
         $connection->real_escape_string($lat),
         $connection->real_escape_string($lng),
         $connection->real_escape_string($type));

$result = $connection->query($query);
if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

?>