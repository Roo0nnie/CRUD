<?php
include 'connect.php';

// Delete Employee Data
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `employee` WHERE emp_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:display.php');
    } else {
        $error_msg = mysqli_error($conn);
        echo "Error deleting employee data: " . $error_msg;
    }
}
