<?php

include 'adminheader.php';
include 'connection.php';
?>
<style>
        #map {
            height: 400px;
            width: 600px;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHYhqBWSEQalKA9i-mno8od-8uycAVzx4"></script>
    <script>
        // Function to initialize the map
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                center: { lat:  10.111655387922305, lng: 76.35057901682275 },
                zoom: 8
            });

            map.addListener('click', function(e) {
                const latLng = e.latLng;
                const lat = latLng.lat();
                const lng = latLng.lng();
 // Update hidden inputs
                document.getElementById('lat').value = Number(lat).toFixed(4);
                document.getElementById('lng').value = Number(lng).toFixed(4);
            
           

                // Display the coordinates
                document.getElementById('coordinates').textContent = `Latitude: ${lat}, Longitude: ${lng}`;
            });
        }

        // Ensure the map is initialized after the DOM is fully loaded
        window.onload = function() {
            initMap();
        };
    </script>
<style>
th,td{
    padding: 10px;
}
</style>
<center>
<div style="margin: 50px;">
    <hr><h2 style="margin: 10px;">Orphanage Registration</h2><hr>    
    <form method="POST">
    
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" class="form-control" name="Name" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea class="form-control" name="Address" required></textarea></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea class="form-control" name="Desc" required></textarea></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" class="form-control" name="Contact" pattern="[6789][0-9]{9}" maxlength="10" required></td>
            </tr>
            
            <tr>
                <td>Owner</td>
                <td><input type="text" class="form-control" name="Owner"  required></td>
            </tr>
            <tr>
                <td>Incharge</td>
                <td><input type="text" class="form-control" name="Incharge"  required></td>
            </tr>
            <tr>
                <td>Number of Children in Percentage</td>
                <td><input type="text" class="form-control" name="Children"  required></td>
            </tr>
            <tr>
                <td>Number of teens in Percentage</td>
                <td><input type="text" class="form-control" name="Teens"  required></td>
            </tr>
            <tr>
                <td>Number of Adults in Percentage</td>
                <td><input type="text" class="form-control" name="Adults"  required></td>
            </tr>
            <tr>
                <td>Number of Olds in Percentage</td>
                <td><input type="text" class="form-control" name="Olds"  required></td>
            </tr>

            <tr>
                <td>Location</td>
                <td>
                <div>
                    <div id="map"></div>
                    <p>Selected Coordinates:</p>
                    <p id="coordinates"></p>
                    <input type="hidden" id="lat" name="lat">
        <input type="hidden" id="lng" name="lng">
                </div>
                </td>
            </tr>
           
            <tr>
                <td colspan="2"><input name="submit" type="submit" class="btn btn-danger" style="color: white; width:400px;" value="Register"></td>
            </tr>
            
        </table>
    </form>
</div>
</center>


<?php

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $desc = $_POST['Desc'];
    $owner = $_POST['Owner'];
    $phone = $_POST['Contact'];
    $address = $_POST['Address'];
    $incharge = $_POST['Incharge'];
    $children = $_POST['Children'];
    $teens = $_POST['Teens'];
    $adults = $_POST['Adults'];
    $olds = $_POST['Olds'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

        $qry2 = "INSERT INTO `orphanage` (`name`,`desc`,`owner`,`incharge`,`children`,`teens`,`adults`,`olds`,`phone`,`address`,`lat`,`lon`)VALUES('$name','$desc','$owner','$incharge','$children','$teens','$adults','$olds','$phone','$address','$lat','$lng')";
        
        $insertUser = mysqli_query($con, $qry2);
        
        // Insert login data
        if ($insertUser) {
                echo "<script>alert('Registered successfully');</script>";
            } else {
                echo "<script>alert('Failed to register');</script>";
            }
        } else {
            echo "<script>alert('Failed to register');</script>";
        }
   



include 'commonfooter.php';

?>