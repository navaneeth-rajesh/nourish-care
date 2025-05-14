<?php
// Include necessary files
include("userheader.php");
include("connection.php");

// Function to convert degrees to radians
function toRadians($degrees) {
    return $degrees * (M_PI / 180);
}

// Function to calculate Haversine distance between two coordinates
function haversineDistance($coords1, $coords2) {
    $R = 6371; // Radius of the Earth in km
    $lat1 = toRadians($coords1['lat']);
    $lon1 = toRadians($coords1['lon']);
    $lat2 = toRadians($coords2['lat']);
    $lon2 = toRadians($coords2['lon']);

    $dLat = $lat2 - $lat1;
    $dLon = $lon2 - $lon1;

    $a = sin($dLat / 2) * sin($dLat / 2) +
         cos($lat1) * cos($lat2) *
         sin($dLon / 2) * sin($dLon / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    return $R * $c; // Distance in km
}

// Function to check if locations are within a specified threshold distance (in km)
function areLocationsNear($coords1, $coords2, $thresholdInKm) {
    $distance = haversineDistance($coords1, $coords2);
    return $distance <= $thresholdInKm;
}

// Check if POST request with coordinates is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lat']) && isset($_POST['lon'])) {
    $lat = filter_var($_POST['lat'], FILTER_VALIDATE_FLOAT);
    $lon = filter_var($_POST['lon'], FILTER_VALIDATE_FLOAT);

    if ($lat !== false && $lon !== false) {
        // Establish database connection
        
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Select all orphanages from database
        $qry1 = "SELECT * FROM orphanage";
        $result1 = mysqli_query($con, $qry1);

        if (!$result1) {
            die("Query failed: " . mysqli_error($con));
        }

        $userLocation = array('lat' => $lat, 'lon' => $lon);
        $threshold = 10; // Threshold distance in km
        $withinRange = false;

        // Fetch orphanage data and check distance from user's location
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $fixedLocation = array('lat' => $row1['lat'], 'lon' => $row1['lon']);

            if (areLocationsNear($userLocation, $fixedLocation, $threshold)) {
                $withinRange = true;
                
                // Display orphanage information and map
                echo '<center><h4 style="margin-top:20px;">'.htmlspecialchars($row1['name']).'</h4>';
                echo '<div id="mapContainer">';
                echo '<iframe id="mapFrame" src="https://maps.google.com/maps?q='.htmlspecialchars($row1['lat']).','.htmlspecialchars($row1['lon']).'&output=embed"></iframe>';
                echo '</div></div></center>';
            }
        }

        if (!$withinRange) {
            echo 'There are no orphanages within 10 km of your location.';
        }

        mysqli_free_result($result1);
        mysqli_close($con);
    } else {
        echo "<div>Invalid coordinates.</div>";
    }
} else {
    echo "<div>No coordinates received.</div>";
}
?>


<p id="location"></p>

<!-- JavaScript to get user's current location -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            document.getElementById('lat').value = position.coords.latitude;
            document.getElementById('lon').value = position.coords.longitude;
        }
    });
</script>

<!-- Form to submit user's location -->
<form method="post">
    <input type="hidden" id="lat" name="lat">
    <input type="hidden" id="lon" name="lon">
    <input type="submit" class="form-control" style="background-color: #0c1b3d;color:azure;" value="Click Here to Find Near Orphanages">
</form>

<?php

// Include common footer
include("commonfooter.php");

?>

