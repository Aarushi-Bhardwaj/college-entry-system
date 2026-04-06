<?php
include "connect.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM persons WHERE person_id = $id");

$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>