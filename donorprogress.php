<?php
session_start();
include 'donorheader.php';
include 'connection.php';
$id=$_SESSION['id'];
?>

<div>

<ul style="margin:50px ;" type="none" >

<?php 

$qry="SELECT * FROM `events` WHERE fid ='$id'";
$result=mysqli_query($con,$qry);
while($row=mysqli_fetch_array($result)){

?>

<li style="padding-top: 20px;" >
<div style="border-radius: 35px;background: #e0e0e0;box-shadow:  20px 20px 60px #bebebe,-20px -20px 60px #ffffff;height:100px;width:80%;display:flex;" >
    <diV>
        <h4 style="padding-top:40px;padding-left:40px;" ><?php echo $row['eventname'] ?></h4>
    </diV>
    <div style="padding-left:20px;padding-top:10px">
        <img src="<?php echo $row['image'] ?>" class="evntimg" style="width: 150px;height: 80px;border-radius: 35px;box-shadow:   17px 17px 35px #bebebe,
             -17px -17px 35px #ffffff;" >
    <style>
      .evntimg {
    display: inline-block;
    width: 1.2em;
    transition: all 0.2s ease-in-out;
}

.evntimg:hover {
    transform: scale(1.5);
}
        
    </style>

    </div>
    <div style="padding-left:50px;padding-top:10px">
        <div>
            <h5><?php echo $row['eventdesc'] ?></h5>
        </div>
        <div style="padding-left:50px;padding-top:20px">
        
<progress  class="progress-bar bg-success"
 
     role="progressbar"  
     value='<?php $cper=(($row['cashcollected']/$row['target'])*100); echo $cper; ?>' 
     min='0' 
     max='100'
     style="height:20px;width:500px;progress:black">Total Money Collected : <?php echo  $row['cashcollected'] ; ?> 
</progress >
        </div>
        <div >
            <h5 > Cash Needed : <?php echo $row['target']-$row['cashcollected'] ?></h5>

        </div>
        
    </div>

</div>
</li>

<?php } ?>

</ul>
</div>



<?php

include 'commonfooter.php';

?>



