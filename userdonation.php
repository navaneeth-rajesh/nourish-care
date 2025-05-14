<?php 
include("userheader.php");
include("connection.php");
?>

<center><table class="table table-striped" style="margin-top: 80px;padding-right:100px;width:1000px"  >

<tr>
    <th scope="col">EVENT NAME</th>
    <th scope="col">EVENT IMAGE</th>
    <th scope="col">FACULTY</th>
    <th scope="col">ORPHANAGE</th>
    <th scope="col">CASH NEEDED</th>
    <th scope="col">CASH COLLECTED</th>
    <th scope="col">PAY</th>
</tr>
<?php

$qry1="SELECT `events`.*, `donor`.*, `orphanage`.*
FROM `events`
JOIN `donor` ON `events`.`fid` = `donor`.`id`
JOIN `orphanage` ON `donor`.`orphanage` = `orphanage`.`id`;";
$result1=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_array($result1)){
    ?>
    <tr>
        <td><?php echo  $row1['eventname'];  ?></td>
        <td><img src="<?php echo  $row1['image'];  ?>" width="100px"></td>
        <td><?php echo  $row1[10];  ?></td>
        <td><?php echo  $row1['name'];  ?></td>
        <td><?php echo  $row1['target'];  ?></td>
        <td><?php echo  $row1['cashcollected'];  ?></td>
        <td><a class="btn btn-info" href="./payment.php?eid=<?php echo $row1['eid']; ?>">DONATE</a></td>
    </tr>
<?php } ?>
</table></center>


<?php

    include("commonfooter.php");


?>