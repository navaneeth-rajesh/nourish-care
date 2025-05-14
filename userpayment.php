<?php 
session_start();
include("userheader.php");
include("connection.php");
$id=$_SESSION['id'];
?>

<center><table class="table table-striped" style="margin-top: 80px;padding-right:100px;width:1000px"  >

<tr>
    
   
    <th scope="col">DATE</th>
    <th scope="col">MONEY</th>
    <th scope="col">STATUS</th>
</tr>
<?php

$qry1="SELECT `payment`.*, `user`.*
FROM `payment`
JOIN `user` ON `payment`.`user` = `user`.`id` WHERE `user`.`id`=$id";
echo $qry1;
$result1=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_array($result1)){
    ?>
    <tr>
        <td><?php echo  $row1['date'];  ?></td>
      
        <td><?php echo  $row1['amount'];  ?></td>
        
        <td>PAID</td>
       
    </tr>
<?php } ?>
</table></center>


<?php

    include("commonfooter.php");


?>