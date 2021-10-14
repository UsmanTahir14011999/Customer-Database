<?php
error_reporting(0);
include("connection.php");
$id = $_GET['id'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$em = $_GET['em'];
$st = $_GET['st'];
$datetime = $_GET['dt'];
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Updating Records in Database</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">

            <input type="text" id="id" class="form-control" placeholder="Enter Customer ID" value="<?php echo "$id" ?>" name="id" required>
              <input type="text" id="firstname" class="form-control" placeholder="First Name" value="<?php echo "$fn" ?>" name="firstname" required>
              <input type="text" id="lastname" placeholder="Last Name" class="form-control" name="lastname" value="<?php echo"$ln" ?>" required>
              <input type="text" placeholder="Enter Email Address" id="email" class="form-control" value="<?php echo "$em" ?>" name="email" required>
              <input type="radio" name="status" id="status"  value="Active" <?php if($st == "Active"){
              echo "checked";}
              ?> required>Active
              <input type="radio" name="status" id="status"  value="InActive" <?php if($st == "InActive"){
              echo "checked";}
               ?> required>InActive
                <input type="datetime-local" placeholder="Enter DateTime " id="dt" class="form-control" value="<?php echo "$datetime"; ?>" name="dt" required>
                            <div class="form-group mb-3">
                                <button type="submit" name="update_stud_data" class="btn btn-primary">Update Data</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
error_reporting(0);
               $conn = mysqli_connect("localhost", "root", "", "trip");
               if ($conn-> connect_error){
                   die("Connection Failed:". $conn-> connect_error );
               }
               $sql = "SELECT id, firstname, lastname, email, status, datetime from TRIP";
               $result = $conn-> query($sql);
               if($result-> num_rows>0){
while ($row = $result-> fetch_assoc()){
    "<tr><td>" . $row["id"]." </td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["status"] . "</td><td>" . $row["datetime"]."</td><td>" . "<a href='index.html?id=$row[id]'>Delete</a>" . "</td></tr>";  
}
echo "</table>";
           }
           else
           {
               echo "No Record";
           }
if(isset($_POST['update_stud_data']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $dt = $_POST['dt'];

    $query = "UPDATE TRIP SET firstname='$firstname', lastname='$lastname', email='$email', status='$status', datetime='$dt' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo "<script>alert('Record Updated')</script>";
        header("Location: index.php");
    }
    else
    {
        echo "<script>alert('Failed To Update Record')</script>";
        header("Location: index.php");
    }
}

?>