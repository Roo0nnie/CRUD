<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];

    // Assuming you have an employee ID to identify the record to update
    $employee_id = $_POST['employee_id'];

    $sql = "UPDATE employee SET 
            first_name = '$first_name',
            last_name = '$last_name',
            middle_name = '$middle_name',
            address = '$address',
            mail = '$mail',
            phone = '$phone'
            WHERE emp_id = $employee_id";

    if(mysqli_query($conn, $sql)){
        // echo "Record updated successfully";
        header('location:display.php');
    } else {
        echo "Could not update record: ". mysqli_error($conn);
    }
}

// Fetch the existing data to pre-fill the form for editing
if(isset($_GET['editid'])){
    $edit_id = $_GET['editid'];
    $fetch_sql = "SELECT * FROM employee WHERE emp_id = $edit_id";
    $fetch_result = mysqli_query($conn, $fetch_sql);

    if($fetch_result && mysqli_num_rows($fetch_result) > 0){
        $row = mysqli_fetch_assoc($fetch_result);
        $edit_first_name = $row['first_name'];
        $edit_last_name = $row['last_name'];
        $edit_middle_name = $row['middle_name'];
        $edit_address = $row['address'];
        $edit_email = $row['mail'];
        $edit_phone = $row['phone'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Edit Employee</title>
</head>
<body>
    <form method="post">
        <input type="hidden" name="employee_id" value="<?php echo $edit_id; ?>">
        <label>First Name</label>
        <input type="text" name="first_name" size="30" value="<?php echo $edit_first_name; ?>"><br>
        <label>Last Name</label>
        <input type="text" name="last_name" size="30" value="<?php echo $edit_last_name; ?>"><br>
        <label>Middle Name</label>
        <input type="text" name="middle_name" size="30" value="<?php echo $edit_middle_name; ?>"><br>
        <label>Address</label>
        <input type="text" name="address" size="50" value="<?php echo $edit_address; ?>"><br>
        <label>Email</label>
        <input type="text" name="email" size="50" value="<?php echo $edit_email; ?>"><br>
        <label>Phone</label>
        <input type="text" name="phone" size="50" value="<?php echo $edit_phone; ?>"><br>

        <input type="submit" name="submit" value="Edit">
    </form>
</body>
</html>
