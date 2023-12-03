<?php
$conn = mysqli_connect("localhost", "root", "", "block_c");
if (!$conn) {
    $error_msg = mysqli_error($conn);
    exit($error_msg);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$middle_name = $_POST['middle_name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
echo $first_name, $last_name, $middle_name, $address, $email, $phone;

$sql = "INSERT INTO employee(first_name, last_name, middle_name, address, mail, phone) VALUES ('$first_name', '$last_name', '$middle_name', '$address', '$email', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Could not insert record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

