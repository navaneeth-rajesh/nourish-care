<?php

include("adminheader.php");
include("connection.php");

?>
<section class="job-section recent-jobs-section section-padding" id='view-turf'>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 mb-4">
                <h2>Available Faculty</h2>
            </div>
            <div class="clearfix"></div>

            <?php
            $res1 = mysqli_query($con, "SELECT `donor`.* ,`orphanage`.`name` AS orname FROM `donor` JOIN `orphanage` WHERE `donor`.`orphanage` = `orphanage`.`id`");

            if ($res1) {
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Orphanage</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                while ($rs1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
            ?>
                    <tr>
                        <td><?php echo $rs1['name']; ?></td>
                        <td><?php echo $rs1['orname']; ?></td>
                        <td><?php echo $rs1['email']; ?></td>
                        <td><?php echo $rs1['address']; ?></td>
                        <td><?php echo $rs1['phone']; ?></td>
                        <td>
                            <form method='post'>
                                <input type="hidden" name='turf' value='<?php echo $rs1['id'] ?>'>
                                <button type='submit' class="btn btn-danger" name='delete'>Delete</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
            <?php
                } else {
                    echo "Error: " . mysqli_error($con);
                }

                if (isset($_REQUEST['delete'])) {
                    $Name = $_REQUEST['turf'];
                    $qryReg = "DELETE FROM `donor` WHERE id=$Name";
                    $qryReg2 = "DELETE FROM `login` WHERE uid=$Name";
                    
                    if ($con->query($qryReg) == TRUE && $con->query($qryReg2) == TRUE) {
                        echo "<script>alert('Faculty Removed');window.location = 'adminfaculty.php';</script>";
                    } else {
                        echo "<script>alert('Removing Faculty Failed');window.location = 'adminfaculty.php';</script>";
                    }
                }
            ?>
        </div>
    </div>
</section>


            <?php

include("commonfooter.php");

?>