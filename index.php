<?php
$insert = false;
if(isset($_POST['submit']))
{
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con)
{
    die ("connection to this database failed due to" . mysqli_connect_error());
}
//echo "Success Connecting to the db";
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$status = $_POST['status'];
$sql = "INSERT INTO `trip`.`trip` ( `id`, `firstname`, `lastname`, `email`, `status`, `datetime`) VALUES ( '$id', '$firstname', '$lastname', '$email', '$status', current_timestamp());";
//echo $sql;

if($con->query($sql)==true){
    //echo "Successfully Inserted";
}
else
{
    //echo "&nbsp; ERROR:  DUPLICATE ENTRY &nbsp;";
    //echo "ERROR: $sql <br> $con->error"; 
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Records</title>
    <style>
        *{
            margin:0px;
            padding:0px;
        }
 .btn
  {
    background-color:red;
    color:white;
    width:100%;
    font-size:100%;
    height:50px;
    float:right;
  }
  #editbtn
  {
    background-color:green;
    color:white;
    width:150px;
    font-size:20px;
    height:70px;
  }
  #editbtn1
  {
    background-color:blue;
    color:white;
    width:150px;
    font-size:20px;
    height:70px;
  }
        .container{
    background-color: blue;
    color: #fff;
    height:50px;
    display:flex;
    justify-content:center;
    align-item:center;
}
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: center;
border:"2";
cellspacing:"7";
display:flex;
justify-content:center;
align-item:center;
}
th {
background-color: #588c7e;
color: white;
colspan:"2";
align:center;
text-align:center;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
    <h1 class="container">Customer Records</h1>
    <button class="btn" onclick="document.location='add.php'">INSERT NEW CUSTOMER</button>
    <table border="2" cellspacing="7">
               <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Date Time</th>
                <th colspan= "2" align="center">Operations</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "trip");
                if ($conn-> connect_error){
                    die("Connection Failed:". $conn-> connect_error );
                }
                $sql = "SELECT id, firstname, lastname, email, status, datetime from trip";
                $result = $conn-> query($sql);
                if($result-> num_rows>0){
while ($row = $result-> fetch_assoc()){
    echo "<tr><td>" . $row["id"]." </td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["status"] . "</td><td>" . $row["datetime"]."</td><td>" . "<a href='update.php?id=$row[id]&fn=$row[firstname]&ln=$row[lastname]&em=$row[email]&st=$row[status]&dt=$row[datetime]'onclick='return checkedit()'><input type='submit' value='Edit/Update' id='editbtn'></a>" . "</td><td>" . "<a href='delete.php?id=$row[id]' onclick='return checkdelete()'><input type='submit' value='DELETE' id='editbtn1'></a>" . "</td></tr>" ;  
}
echo "</table>";
                }
            else
            {
                echo "No Record";
            }            
?>
<script>
    function checknew()
    {
        return confirm('Are You Sure You Want To add new customer in this Record');
    }
    </script>
<script>
    function checkedit()
    {
        return confirm('Are You Sure You Want To edit OR update This Record');
    }
    </script>
<script>
    function checkdelete()
    {
        return confirm('Are You Sure You Want To Delete This Record');
    }
    </script>