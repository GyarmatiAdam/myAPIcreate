<?php
// Require conn.php (DB connection) file
require_once "dbconnect.php";

// This query will check do we have car_id in the table car
// for the provided $id
$sql="SELECT 
first_name, 
last_name, 
c_email, 
dob, 
cust_id 
FROM customers WHERE cust_id = $id";

// Perform a query on the DB
$result = mysqli_query($conn, $sql);

// $json=[];

// foreach($row = $key => $value) {
//     foreach ($value as $k => $v) {
//         $json[$key][$k] = $v
//     }
// }

// Fetch the query into $row
$rows = mysqli_fetch_assoc($result); 

    // Store values into the variables
    $first_name=$row['first_name']; 
    $last_name=$row['last_name'];
    $email=$row['c_email'];
    $dob=$row['dob'];

  
// Close the DB connection
mysqli_close($conn);
?>