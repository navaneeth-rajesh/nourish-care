<?php 
session_start();
include("donorheader.php");
include("connection.php");
$id=$_SESSION['id'];
?>

<center><table class="table table-striped" style="margin-top: 80px;padding-right:100px;width:1000px"  >

<tr>
    
   
    <th scope="col">ITEMS</th>
    <th scope="col">IMAGE</th>
    <th scope="col">USER</th>
    <th scope="col">DATE</th>
</tr>
<?php

$qry1="SELECT donations.*, donor.*, user.name FROM donations JOIN donor ON donations.orphanage = donor.orphanage JOIN `user` ON donations.user = user.id WHERE donor.id = '$id'";

$result1=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_array($result1)){
    ?>
    <tr>
        <td><?php echo  $row1['item'];  ?></td>
        <td><img src="<?php echo  $row1['image'];  ?>" width="100px"></td>
        <td><?php echo  $row1['name'];  ?></td>
        <td><?php echo  $row1['date'];  ?></td>
        
       
       
    </tr>
<?php } ?>
</table></center>


<?php

    include("commonfooter.php");


?>