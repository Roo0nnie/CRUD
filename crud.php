<?php
// CREATING A CONNECTION TO THE DATABASE
$conn = mysqli_connect("localhost", "root", "", "block_c");

// CHECKING FOR CONNECTION ERRORS
if (!$conn) {
   $error_msg = mysqli_error($conn);
   exit($error_msg);
}

// FUNCTION FOR ADDING EMPLOYEE DATA
if(isset($_POST['add'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO employee(first_name, last_name, middle_name, address, email, phone) VALUES ('$first_name', '$last_name', '$middle_name', 
   '$address', '$email', '$phone')";

if(mysqli_query($conn, $sql)){
    header('location:display.php');
} else {
    echo "Could not insert record: ". mysqli_error($conn);
}
}

// FUNCTION FOR EDITING EMPLOYEE DATA
if(isset($_POST['edit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // IDENTIFYING THE EMPLOYEE ID THAT WILL BE EDITED IN THE DATABASE
    $employee_id = $_POST['employee_id'];

    $sql = "UPDATE employee SET 
            first_name = '$first_name',
            last_name = '$last_name',
            middle_name = '$middle_name',
            address = '$address',
            email = '$email',
            phone = '$phone'
            WHERE emp_id = $employee_id";

    if(mysqli_query($conn, $sql)){
        header('location:display.php');
    } else {
        echo "Could not update record: ". mysqli_error($conn);
    }
}
// FETCHING THE PREVIOUS DATA IN THE DATABASE
if(isset($_GET['editid'])){
    $e_id = $_GET['editid'];
    $fetch_sql = "SELECT * FROM employee WHERE emp_id = $e_id";
    $fetch_result = mysqli_query($conn, $fetch_sql);

    if($fetch_result && mysqli_num_rows($fetch_result) > 0){
        $row = mysqli_fetch_assoc($fetch_result);
        $e_first_name = $row['first_name'];
        $e_last_name = $row['last_name'];
        $e_middle_name = $row['middle_name'];
        $e_address = $row['address'];
        $e_email = $row['email'];
        $e_phone = $row['phone'];
    }
}

// FUNCTION FOR DELETING EMPLOYEE DATA
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM employee WHERE emp_id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:display.php');
    } else {
        $error_msg = mysqli_error($conn);
        echo "Error deleting employee data: " . $error_msg;
    }
}
$conn->close();
?>

<!-- TO DISPLAY THE DATA BEING EDIT IN THE BUTTON-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Edit Employee</title>

    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url("https://images.saymedia-content.com/.image/t_share/MTkzOTUzODU0MDkyODc5MzY1/particlesjs-examples.gif");
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;
    }
    header{
        text-align: center;
        font-size: 50px;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
    }

    form {
        width: 50%;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        width: auto;
    }
    #input_edit{
        font-size: 20px;
        width: 130px;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
    }
</style>
</head>
<body>
    <!-- PHP VARIABLES BEING ECHO TO DISPLAY THE RESULTS OF THE ADDED DATA IN THE DATABASE THAT CAN BE EDITED  -->
    <form method="post">
        <input type="hidden" name="employee_id" value="<?php echo $e_id; ?>">
        <label>First Name</label>
        <input type="text" name="first_name" size="30" value="<?php echo $e_first_name; ?>"><br>
        <label>Last Name</label>
        <input type="text" name="last_name" size="30" value="<?php echo $e_last_name; ?>"><br>
        <label>Middle Name</label>
        <input type="text" name="middle_name" size="30" value="<?php echo $e_middle_name; ?>"><br>
        <label>Address</label>
        <input type="text" name="address" size="50" value="<?php echo $e_address; ?>"><br>
        <label>Email</label>
        <input type="text" name="email" size="50" value="<?php echo $e_email; ?>"><br>
        <label>Phone</label>
        <input type="text" name="phone" size="50" value="<?php echo $e_phone; ?>"><br>

        <center><input id="input_edit" class="btn btn-primary my-5" type="submit" name="edit" value="Edit Data"></center>
    </form>
</body>
</html>