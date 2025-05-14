<?php
session_start();
include 'donorheader.php';
include 'connection.php';
$id=$_SESSION['id'];
?>



<style>
th,td{
    padding: 10px;
}
</style>
<center>
<div style="margin: 50px;">
    <hr><h2 style="margin: 10px;">ADD EVENTS</h2><hr>    
    <form method="POST" enctype="multipart/form-data">
    
        <table>
            <tr>
                <td>EVENT NAME</td>
                <td><input type="text" class="form-control" name="Name" required></td>
            </tr>
            <tr>
                <td>DESCRIPTION</td>
                <td><textarea class="form-control" name="Desc" required></textarea></td>
            </tr>
            
            <tr>
                <td>EVENT DATE</td>
                <td><input type="date" class="form-control" name="edate" id="edate"   required></td>
            </tr>
            
            <tr>
                <td>IMAGE</td>
                <td><input type="file" class="form-control" name="Image" id="Image" required></td>
            </tr>
            <tr>
                <td>MONEY NEEDED</td>
                <td><input type="number" class="form-control" name="Money" required></td>
            </tr>
            <tr>
                <td colspan="2"><input name="submit" type="submit" class="btn btn-danger" style="color: white; width:400px;" value="ADD"></td>
            </tr>
            
        </table>
    </form>
</div>
</center>
<script>
  // Get today's date
  var today = new Date();
  
  // Calculate tomorrow's date
  var tomorrow = new Date(today);
  tomorrow.setDate(tomorrow.getDate() + 1);
  
  // Format the date as YYYY-MM-DD (required format for <input type="date">)
  var formattedTomorrow = tomorrow.toISOString().split('T')[0];
  
  // Set the minimum attribute of the date input to tomorrow
  document.getElementById("edate").min = formattedTomorrow;
</script>

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $desc = $_POST['Desc'];
    $edate = $_POST['edate'];
    $money = $_POST['Money'];
    $folder = './static/media/';
    $file = $folder . basename($_FILES['Image']['name']);
    move_uploaded_file($_FILES['Image']['tmp_name'], $file);
  
   
    
    
        // Insert user data
        $qry2 = "INSERT INTO `events` (`eventname`,`eventdesc`,`eventsdate`,`fid`,`image`,`target`)VALUES('$name','$desc','$edate','$id','$file','$money')";
  
        $insertUser = mysqli_query($con, $qry2);

        // Insert login data
        

            if ($insertUser) {
                echo "<script>alert('Event Added successfully');</script>";
            } else {
                echo "<script>alert('Failed to Add Event ');</script>";
            }
        } else {
            echo "<script>alert('Failed to Add Event');</script>";
        }
    




include 'commonfooter.php';

?>



