<?php
session_start();
include 'donorheader.php';
include 'connection.php';
$id=$_SESSION['id'];
?>

<div id="about" class="orphans">
	<div class="container">
		
		<div class="abt-grids">
    <?php
        $qry1="SELECT orphanage.* FROM orphanage JOIN donor ON orphanage.id = donor.orphanage WHERE donor.id = $id;";
        $result1=mysqli_query($con,$qry1);
        while($row1=mysqli_fetch_array($result1)){
        ?>
			<div class="col-md-6 about-center" style="display:flex;gap:100px;text-align:center">
				<div  style="height:350px;width:300px">
				<div width="250px"  style="background-color: #216BA9;border-radius: 50px;height:350px"  >
				<div ><br><br>
					<h4 style="color:aliceblue">CHILDREN</h4></div>
					<img class="orphanagecard" width="200px" style="height: 165px;"  src="./static/images/children.png">

					<p  style="padding-bottom: 70px;color:azure">Age group <span> 0 - 12 </span></p>
					
					<center>
					<div class="progress mx-auto" style="border-radius: 60px;" data-value='<?php echo $row1['children']; ?>'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-50 h-50 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold" style="margin:32px"><?php echo $row1['children']; ?><sup class="small">%</sup></div>
          </div>
        </div>
</center><br>




				</div>
				</div>
				<div  style="height:400px;width:300px">
				<div >
				</div>
       
				<div width="250px"  style="background-color: #216BA9;border-radius: 50px;height:350px"  ><br><br>
				<h4 style="color:aliceblue">TEENS</h4>
					<img class="orphanagecard" width="200px" style="height: 165px;"  src="./static/images/teens.jpg">

					<p  style="padding-bottom: 70px;color:azure">Age group <span> 13 - 19 </span></p>
					
					<center>
					<div class="progress mx-auto"  style="border-radius: 60px;" data-value='<?php echo $row1['teens']; ?>'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-50 h-50 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold" style="margin:32px"><?php echo $row1['teens']; ?><sup class="small">%</sup></div>
          </div>
        </div>
</center><br>

				</div>
				</div>
				<div  style="height:400px;width:300px">
				<div width="250px"  style="background-color: #216BA9;border-radius: 50px;height:350px"  >
				<div ><br><br>
				<h4 style="color:aliceblue">ADULTS</h4></div>
					<img class="orphanagecard" width="200px" style="height: 165px;" src="./static/images/adults.jpg">

					<p  style="padding-bottom: 70px;color:azure">Age group <span> 20 - 60 </span></p>

					<center>
					<div class="progress mx-auto"  style="border-radius: 60px;" data-value='<?php echo $row1['adults']; ?>'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-50 h-50 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold" style="margin:32px"><?php echo $row1['adults']; ?><sup class="small">%</sup></div>
          </div>
        </div>
</center><br>

				</div>
				
				</div>
				<div  style="height:400px;width:300px">
				<div width="250px"  style="background-color: #216BA9;border-radius: 50px;height:350px"  >
				<div ><br><br>
				<h4 style="color:aliceblue">ELDERS</h4></div>
					<img class="orphanagecard" width="200px" style="height: 165px;"  src="./static/images/elders.jpg">

					<p style="padding-bottom: 70px;color:azure">Age group <span> 60 -  </span></p>

					<center>
					<div class="progress mx-auto"  style="border-radius: 60px;" data-value='<?php echo $row1['olds']; ?>'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-50 h-50 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold" style="margin:32px"><?php echo $row1['olds']; ?><sup class="small">%</sup></div>
          </div>
        </div>
</center><br>
<?php } ?>
				</div>
				</div>
				<div class="about-gd-left">
				<div class="orphanagecard" ></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<style>

.orphanagecard{
	margin: 20px;
margin-left: 10px;
border-radius: 50px;
background: #e0e0e0;
box-shadow:  25px 25px 50px #074c6e,
             -25px -25px 50px transparent;
}

.progress {
  width: 100px;
  height: 100px;
  background: tra;
  position: relative;
}

.progress::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 6px solid #216BA9; /* Use hex for color consistency */
  
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px rgba(0, 0, 0, 0.19); /* Shadow effects */
  position: absolute;
  top: 0;
  left: 0;
  transition: transform 0.3s ease-in-out; /* Smooth transition for scaling */
}

.progress>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: 1;
}

.progress .progress-left {
  left: 0;
}

.progress .progress-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 6px;
  border-style: solid;
  position: absolute;
  top: 0;
}

.progress .progress-left .progress-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}

.progress .progress-right {
  right: 0;
}

.progress .progress-right .progress-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
}

.progress .progress-value {
  position: absolute;
  top: 0;
  left: 0;
}

/*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

body {
  background: #ff7e5f;
  background: -webkit-linear-gradient(to right, #ff7e5f, #feb47b);
  background: linear-gradient(to right, #ff7e5f, #feb47b);
  min-height: 100vh;
}

.rounded-lg {
  border-radius: 1rem;
}

.text-gray {
  color: #aaa;
}

div.h4 {
  line-height: 1rem;
}

</style>

<script>
	$(function() {

$(".progress").each(function() {

  var value = $(this).attr('data-value');
  var left = $(this).find('.progress-left .progress-bar');
  var right = $(this).find('.progress-right .progress-bar');

  if (value > 0) {
	if (value <= 50) {
	  right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
	} else {
	  right.css('transform', 'rotate(180deg)')
	  left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
	}
  }

})

function percentageToDegrees(percentage) {

  return percentage / 100 * 360

}

});
</script>

<?php

include 'commonfooter.php';

?>