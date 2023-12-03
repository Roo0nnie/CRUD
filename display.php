<?php
//STEP 1
$conn = mysqli_connect("localhost", "root", "", "block_c");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/display.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>Home</title>
  <!-- END STEP 1 -->
</head>
<!-- START STEP 2 -->
<!-- TO DIPLAY EMPLOYEE LIST DATA BEING ADDED IN THE DATABASE -->

<body>
  <header id="title">Employment List</header>
  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr class="htitle">
          <th>Employee ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Middle Name</th>
          <th>Home Address</th>
          <th>Personal Email</th>
          <th>Phone Number</th>
          <!-- <th scope="col">Operations</th> -->
        </tr>
      </thead>
      <tbody>
        <!-- PHP FUNCTION TO FETCH THE EMPLOYEE DATA IN THE DATABASE AND DISPLAY THE EMPLOYMENT LIST -->
        <?php
      
        $sql = "Select * from `employee`";
        
        $result = mysqli_query($conn, $sql);
        $id_loop = 0;
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['emp_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $middle_name = $row['middle_name'];
            $address = $row['address'];
            $email = $row['mail'];
            $phone = $row['phone'];
            $id_loop += 1;
            echo '<tr class="tdata">
            <th scope="row" >' . $id_loop . '</th>
            <td>' . $first_name . '</td>
            <td>' . $last_name . '</td>
            <td>' . $middle_name . '</td>
            <td>' . $address . '</td>
            <td>' . $email . '</td>
            <td>' . $phone . '</td> 
            <td>
            </tr>';
        ?>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
    <center><button id="btn-add" class="btn btn-primary my-5"><a href="employee.html" class="text-light">Add Employee</button></center>
  </div>
</body>

</html>
<!-- <button class="btn btn-primary" id="btn-edit"><a href="edit.php?editid=' . $id . '" class="text-light">Edit</a></button> -->

<!-- END STEP 2 -->