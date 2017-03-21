<?php
require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node
$doc = new DOMDocument( "1.0", "ISO-8859-15" );
$node = $doc->createElement("markers");
$parnode = $doc->appendChild($node);

// Opens a connection to a MySQL server
$connection = new mysqli('localhost', $username, $password, $database);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Set the active MySQL database
$result = $connection->query("SELECT Area,count(*) AS num_of_res FROM markers group by Area");
if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = $result->fetch_assoc()){
  // Add to XML document node
  $node = $doc->createElement("marker");
  $newnode = $parnode->appendChild($node);

  $newnode->setAttribute("Area", $row['Area']);
  $newnode->setAttribute("num_of_res", $row['num_of_res']);
}

$xmlfile = $doc->saveXML();
echo $xmlfile;

?>