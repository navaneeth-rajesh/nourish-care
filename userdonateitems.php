
<?php
session_start();
include("userheader.php");
include("connection.php");
$id=$_SESSION['id'];
?>
<style>
th,td{
    padding: 10px;
}
</style>
<div style="margin: 50px;">

    <form method="POST" enctype="multipart/form-data">
    
        <table>
            <tr>
                <td>Item</td>
                <td><select name="item"  class="form-control" required>
                <option value="" selected disabled>Select Item</option>
                <option value="Food" >Food</option>
                <option value="Toys" >Toys</option>
                <option value="Dress" >Dress</option></select></td></tr>
                
                
            </tr>
            <tr>
                <td>Orphanages :</td>
                <td><select name="orph"  class="form-control" required>
                <option value="" selected disabled>Select Orphanages</option>
                <?php
                    $qryOr = "SELECT * FROM `orphanage`";
                    $result=mysqli_query($con, $qryOr);
                    while ($row=mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php
                    }


                ?>
                
            </select></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" class="form-control" name="Image" id="Image" required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea class="form-control" name="desc"></textarea></td>
            </tr>
            <tr>
            <tr>
                <td colspan="2"><input name="submit" type="submit" class="btn btn-danger" style="color: white; width:400px;" value="Donate"></td>
            </tr>
            </tr>
           
        </table>
    </form>
</div>
</center>


<?php

if (isset($_POST['submit'])) {
    // Extract form data
    $name = $_POST['item'];
    $email = $_POST['orph'];
    $phone = $_POST['desc'];
    
    // File upload handling
    $folder = 'static/media/';
    $file = $folder . basename($_FILES['Image']['name']);
    if (move_uploaded_file($_FILES['Image']['tmp_name'], $file)) {
        // File moved successfully, now insert into database
        
        // Database connection assumed to be $con
        // Using prepared statement to avoid SQL injection
        $qry2 = "INSERT INTO `donations` (`orphanage`, `user`, `image`, `item`, `desc`) VALUES (?, ?, ?, ?, ?)";
        
        // Prepare statement
        $stmt = mysqli_prepare($con, $qry2);
        if ($stmt) {
            // Bind parameters and execute
            mysqli_stmt_bind_param($stmt, "iisss", $email, $id, $file, $name, $phone);
            $id = 1; // Assuming $id is your user ID, replace with actual value
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Donation Added');</script>";
            } else {
                echo "<script>alert('Failed to Donate');</script>";
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Failed to prepare statement');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload file');</script>";
    }
} else {
    echo "<script>alert('Form submission error');</script>";
}

   
include('commonfooter.php');

?>