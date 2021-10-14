<?php
include ("connection.php");
error_reporting(0);
$id = $_GET['id'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$em = $_GET['em'];
$st = $_GET['st'];
$dt = $_GET['dt'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Customer Form</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>

<body>
<div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <h1> Customer Form</h1>
        </div>
        <div class="panel-body">
          <form action="index.php" method="POST">
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
              <br>
            <input type="submit" name="submit" id="update" value="UPDATE DETAILS" class="btn btn-primary " >
          </form>
       </div> 
     </div>
   </div>
 </div>
</div>
</body>
</html>
<?php
if($_GET['update'])
{
  $id = $_GET['id'];
  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $email = $_GET['email'];
  $status = $_GET['status'];
  $lap = "UPDATE TRIP SET firstname = '$firstname', lastname ='$lastname', email ='$email', status = '$status' WHERE id = '$id'";
  $data = mysqli_query($conn,$lap);
  if($data)
  {
    echo "<script>alert('Record Updated')</script>";
  }
  else
  {
    echo "<script>alert('Failed To Update Record')</script>";
  }
}
?>