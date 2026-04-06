<?php
$conn = mysqli_connect("localhost", "root", "", "college_entry", 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>