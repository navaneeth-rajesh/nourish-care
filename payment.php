<?php
session_start();
$id=$_SESSION['id'];
include("connection.php");
include("userheader.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

   <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formPayment"></span>
                    <hr class="my-5">

                    <!-- form card cc payment -->
                    <div class="card card-outline-secondary">
                        <div class="card-body">
                            <h3 class="text-center">Credit Card Payment</h3>
                            <hr>
                            <div class="alert alert-info p-2 pb-3">
                                <a class="close font-weight-normal initialism" data-dismiss="alert" href="#"><samp>×</samp></a> 
                                CVC code is required.
                            </div>
                            <form class="form" role="form" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="cc_name">Card Holder's Name</label>
                                    <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="First and last name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" class="form-control" autocomplete="off" maxlength="20"  title="Credit card number" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Card Exp. Date</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="cc_exp_mo" size="0">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="cc_exp_yr" size="0">
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                            <option>2028</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" placeholder="CVC">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-12">Amount</label>
                                </div>
                                <div class="form-inline">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">₹</span></div>
                                        <?php 
                                        $a = $_GET['eid'];
                                        $qry1 = "SELECT * FROM `events` WHERE `eid`=$a";
                                 
                                        $result1=mysqli_query($con,$qry1);
                                        while($row1=mysqli_fetch_array($result1)){
                                        ?>
                                        <input type="text" name="amount" class="form-control text-right" id="exampleInputAmount" max="<?php echo $row1['target']-$row1['cashcollected']; ?>" placeholder="<?php echo $row1['target']-$row1['cashcollected']; ?>"><?php } ?>
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <a type="reset" class="btn btn-default btn-lg btn-block" href="./userdonation.php">Cancel</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="paid" class="btn btn-success btn-lg btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

<?php

if(isset($_POST['paid'])){
$amount=$_POST['amount'];
    $qry1 = "SELECT * FROM `events` WHERE `eid`=$a";
    
    $result1=mysqli_query($con,$qry1);
    while($row1=mysqli_fetch_array($result1)){
        $b=$row1['cashcollected']=$row1['cashcollected']+$amount;
        $qry="UPDATE `events` 
SET `cashcollected` = '$b' 
WHERE `eid` = '$a';";
$result4=mysqli_query($con,$qry);
        $qry2="INSERT INTO `payment` (`amount`,`user`,`event`) VALUES($amount,$id,$a)";
        $insertUser = mysqli_query($con, $qry2);

   
        if ($insertUser) {
            echo "<script>alert('Payment Successfull');window.location.href='./userdonation.php';</script>";


}
else {
    echo "<script>alert('Payment Failed');</script>";
}
}}



include("commonfooter.php");
?>