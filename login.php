
<?php
session_start();

include "connection.php";
include 'commonbase.php';

?>

<style>
th,td{
    padding: 10px;
}
</style>
<center>
<div style="margin: 50px;">
    <h3>Login</h3>
    <form method="POST" enctype="multipart/form-data">
       
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" class="form-control" name="Sender" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password"   class="form-control" name="Password" required></td>
            </tr>
            <tr>
                <td></td>
                <td ><input type="submit" name="login" class="btn btn-dark" value="Login"></td>
            </tr>
        </table>
    </form>
</div>
</center>


<?php


if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['Sender']);
    $password = mysqli_real_escape_string($con, $_POST['Password']);

    $qry1 = "SELECT * FROM `login` WHERE `email`= '$email' AND `password`= '$password'";
    $result = mysqli_query($con, $qry1);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
       
            if($row['type'] == 'User'){
                $_SESSION['id'] = $row['uid'];
                echo "<script>alert('Welcome $row[uid]');location='userhome.php';</script>";
            } elseif($row['type'] == 'Donor'){
                $_SESSION['id'] = $row['uid'];
                echo "<script>alert('Welcome');location='donorhome.php';</script>";
            } elseif($row['type'] == 'Admin'){
                echo "<script>alert('Welcome Admin');location='adminhome.php';</script>";
            } else {
                echo "<script>alert('Unknown user type');</script>";
            }
        
    } else {
        echo "<script>alert('User Not Found');</script>";
    }
}




include 'commonfooter.php';

?>
