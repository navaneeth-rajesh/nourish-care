<?php

include("adminheader.php");
include("connection.php");

?>

<center><table class="table table-striped" style="margin-top: 80px;padding-right:100px;width:1000px"  >

<tr>
    
   
    <th scope="col">NAME</th>
    <th scope="col">EMAIL</th>
    <th scope="col">PHONE</th>
    <th scope="col">ADDRESS</th>
</tr>
<?php

$qry1="SELECT * FROM user";
$result1=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_array($result1)){
    ?>
    <tr>
        <td><?php echo  $row1['name'];  ?></td>
        <td><?php echo  $row1['email'];  ?></td>
        <td><?php echo  $row1['phone'];  ?></td>
        <td><?php echo  $row1['address'];  ?></td>
        
             
    </tr>
<?php } ?>
</table></center>




<?php

include("commonfooter.php");

?>