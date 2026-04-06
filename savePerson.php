<?php
include "connect.php";

$name = $_POST['name'];
$college_id = $_POST['college_id'];
$vehicle_type = $_POST['vehicle_type'];
$vehicle_number = $_POST['vehicle_number'];
$faculty = $_POST['faculty'];

$sql = "INSERT INTO persons (name, college_id, faculty, vehicle_type, vehicle_number)
        VALUES ('$name', '$college_id', '$faculty', '$vehicle_type', '$vehicle_number')";

if(mysqli_query($conn, $sql)){
    echo "Saved successfully";
} else {
    echo mysqli_error($conn);
}
?>