 <?php
 error_reporting(0);
                $conn = mysqli_connect("localhost", "root", "", "trip");
                if ($conn-> connect_error){
                    die("Connection Failed:". $conn-> connect_error );
                }
                $sql = "SELECT id, firstname, lastname, email, status, datetime from trip";
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
 $id = $_GET['id'];
$query = "DELETE FROM trip WHERE id = '$id'";
$data =mysqli_query($conn,$query);
if($data)
{
    echo "<script>alert('Record Deleted from Database')</script>";
}

else
{
    echo "<script>alert('Failed to Delete this Record from Database')</script>";
}
     header("Location: index.php");
?>
