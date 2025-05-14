<?php

include("adminheader.php");
include("connection.php");

?>

<center><table class="table table-striped" style="margin-top: 80px;padding-right:100px;width:1000px"  >

<tr>
    
   
    <th scope="col">ORPHANAGE</th>
    <th scope="col">DESCRIPTION</th>
    <th scope="col">OWNER</th>
    <th scope="col">INCHARGE</th>
    <th scope="col">CHILDREN</th>
    <th scope="col">TEENS</th>
    <th scope="col">ADULTS</th>
    <th scope="col">OLDS</th>
    <th scope="col">ADDRESS</th>
    <th scope="col">LOCATION</th>



</tr>
<?php

$qry1="SELECT * FROM orphanage";
$result1=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_array($result1)){
    ?>
    <tr>
        <td><?php echo  $row1['name'];  ?></td>
        <td><?php echo  $row1['desc'];  ?></td>
        <td><?php echo  $row1['owner'];  ?></td>
        <td><?php echo  $row1['incharge'];  ?></td>
        <td><?php echo  $row1['children'];  ?>%</td>
        <td><?php echo  $row1['teens'];  ?>%</td>
        <td><?php echo  $row1['adults'];  ?>%</td>
        <td><?php echo  $row1['olds'];  ?>%</td>
        <td><?php echo  $row1['address'];  ?></td>
        <td><div id="mapContainer">
                          <iframe id="mapFrame" src="https://maps.google.com/maps?q=<?php echo $row1['lat']; ?>,<?php echo $row1['lon']; ?>&output=embed"></iframe>
                      </div></td>

        
       
       
    </tr>
<?php } ?>
</table></center>




<?php

include("commonfooter.php");

?>