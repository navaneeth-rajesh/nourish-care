<?php

include("adminheader.php");
include("connection.php");

?>

<center><table class="table table-striped" style="margin-top: 80px;padding-right:100px;width:1000px"  >

<tr>
    
   
    <th scope="col">EVENT</th>
    <th scope="col">DESCRIPTION</th>
    <th scope="col">DATE</th>
    <th scope="col">COLLECTED</th>
    <th scope="col">TARGET</th>
    <th scope="col">IMAGE</th>
    



</tr>
<?php

$qry1="SELECT * FROM events";
$result1=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_array($result1)){
    ?>
    <tr>
        <td><?php echo  $row1['eventname'];  ?></td>
        <td><?php echo  $row1['eventdesc'];  ?></td>
        <td><?php echo  $row1['eventsdate'];  ?></td>
        <td><?php echo  $row1['cashcollected'];  ?>₹</td>
        <td><?php echo  $row1['target'];  ?>₹</td>
        <td><img src="<?php echo  $row1['image'];  ?>" width="100px" ></td>
             
    </tr>
<?php } ?>
</table></center>




<?php

include("commonfooter.php");

?>