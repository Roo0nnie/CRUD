<?php
include "connect.php";

$emp_ID = $_GET['emp_id'];

if(!$emp_ID) {
    echo "Employee ID Not specified.";
    return;
}

echo "<h1>$emp_ID</h1>";

$sql = "SELECT Count(*)
        FROM employee 
        WHERE emp_id='".$emp_ID."'";
 
 $result = mysqli_query($conn, $sql);
 if(!$result) {
    echo "Error:";
    exit;
 }
 
 $row = mysqli_fetch_row($result);
 $count = $row[0];
 
 if($count == 0) {
    echo "Employee ID Not Found";
 } else {
    echo "Employee ID Found";
 }

?>