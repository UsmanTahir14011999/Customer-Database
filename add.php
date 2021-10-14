<?php
include ("connection.php");
error_reporting(0);
$id = $_GET['id'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$em = $_GET['em'];
$st = $_GET['st'];
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
          <input type="text" id="id" class="form-control" placeholder="Enter Customer ID" name="id" required>
              <input type="text" id="firstname" class="form-control" placeholder="First Name" name="firstname" required>
              <input type="text" id="lastname" placeholder="Last Name" class="form-control" name="lastname" required>
              <input type="text" placeholder="Enter Email Address" id="email" class="form-control" name="email" required>
              <input type="radio" name="status" id="status"  value="Active"  required>Active
              <input type="radio" name="status" id="status"  value="InActive"  required>InActive
              <br>
            <input type="submit" name="submit" id="submit" value="ADD NEW CUSTOMER" class="btn btn-primary " >
          </form>
       </div> 
     </div>
   </div>
 </div>
</div>
</body>
</html>
<?php
if($_GET['submit'])
{
  $id = $_GET['id'];
  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $email = $_GET['email'];
  $status = $_GET['status'];
  $query = "UPDATE trip SET id = '$id', firstname = '$firstname', lastname ='$lastname', email ='$email', status = '$status' WHERE id = '$id'";

  $data = mysqli_query($conn, $query);
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