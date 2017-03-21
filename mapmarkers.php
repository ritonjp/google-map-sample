<?php
require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node
//$doc = domxml_new_doc("1.0");
$doc = new DOMDocument( "1.0", "ISO-8859-15" );
$node = $doc->createElement("markers");
$parnode = $doc->appendChild($node);

// Opens a connection to a MySQL server
//$connection=mysql_connect ('localhost', $username, $password);
$connection = new mysqli('localhost', $username, $password, $database);
/*if (!$connection) {
  die('Not connected : ' . mysql_error());
}*/
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Set the active MySQL database
/*$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}*/

// Select all the rows in the markers table
/*$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);*/
$result = $connection->query("SELECT * FROM markers WHERE food_speciality<>''");
if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = $result->fetch_assoc()){
  // Add to XML document node
  $node = $doc->createElement("marker");
  $newnode = $parnode->appendChild($node);

  $newnode->setAttribute("shop_code", $row['shop_code']);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['type']);
  $newnode->setAttribute("food_speciality", $row['food_speciality']);
  $newnode->setAttribute("total_customer_visited", $row['total_customer_visited']);
  $newnode->setAttribute("daily_sales", $row['daily_sales']);
}

$xmlfile = $doc->saveXML();
echo $xmlfile;

?>