<?php
require("phpsqlajax_dbinfo.php");

// Gets data from URL parameters.
$custNum = $_GET['custNum'];
$totalCustNum = $_GET['totalCustNum'];
$shop_code = $_GET['shop_code'];
$custSalesAmount = $_GET['custSalesAmount'];
$totalSales = $_GET['totalSales'];

$accumulated_cust_num = ($custNum+$totalCustNum);
$accumulated_daily_sales = ($custSalesAmount+$totalSales);

$sales_date = date('Y-m-d H:i:s');
// Opens a connection to a MySQL server.
$connection = new mysqli('localhost', $username, $password, $database);
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "UPDATE markers SET total_customer_visited='$accumulated_cust_num',daily_sales='$accumulated_daily_sales' WHERE shop_code = '$shop_code'";
$query_1 = "INSERT INTO sales_data (shop_code,date_time,num_cust,daily_sales) 
                VALUES ('$shop_code', '$sales_date','$custNum','$custSalesAmount')";

$result = $connection->query($query);
if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
} 

$result_1 = $connection->query($query_1);
if (!$result_1) {
  die('Invalid query: ' . mysqli_connect_error());
} 

?>