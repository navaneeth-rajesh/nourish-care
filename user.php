<?php

include 'commonbase.php';
include 'connection.php';
?>
<style>
th,td{
    padding: 10px;
}
</style>
<center>
<div style="margin: 50px;">
    <hr><h2 style="margin: 10px;">User registration</h2><hr>    
    <form method="POST">
    
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" class="form-control" name="Name" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea class="form-control" name="Address" required></textarea></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" class="form-control" name="Contact" pattern="[6789][0-9]{9}" maxlength="10" required></td>
            </tr>
            <tr>
                <td>Aadhar</td>
                <td><input type="text" class="form-control" name="Aadhar" pattern="[0-9]{12}" maxlength="12" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" class="form-control" name="Email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="Password" required></td>
            </tr>
            <tr>
                <td colspan="2"><input name="submit" type="submit" class="btn btn-danger" style="color: white; width:400px;" value="Register"></td>
            </tr>
        </table>
    </form>
</div>
</center>


<?php

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Contact'];
    $address = $_POST['Address'];
    $pass = $_POST['Password'];
    $aadhar = $_POST['Aadhar'];
    // $folder = 'assets/media/';
    // $file = $folder . basename($_FILES['Image']['name']);
    // move_uploaded_file($_FILES['Image']['tmp_name'],$file);
    // Check if user already exists
    $qry1 = "SELECT * FROM `donor` WHERE `email`= '$email'";
    $result = mysqli_query($con, $qry1);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('User already exists');</script>";
    } else {
        // Insert user data
        $qry2 = "INSERT INTO `user` (`name`, `email`, `address`, `phone`, `aadhar`) VALUES ('$name', '$email', '$address', '$phone', '$aadhar')";
        $insertUser = mysqli_query($con, $qry2);

        // Insert login data
        if ($insertUser) {
            $qry3 = "INSERT INTO `login` (`uid`, `email`, `password`, `type`) VALUES ((SELECT MAX(`id`) FROM `user`), '$email', '$pass', 'User')";
            $insertLogin = mysqli_query($con, $qry3);

            if ($insertLogin) {
                echo "<script>alert('Registered successfully');</script>";
            } else {
                echo "<script>alert('Failed to register login '+$insertLogin);</script>";
            }
        } else {
            echo "<script>alert('Failed to register user');</script>";
        }
    }
}



include 'commonfooter.php';

?>