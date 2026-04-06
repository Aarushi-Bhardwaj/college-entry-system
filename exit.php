<?php
include "connect.php";

$id = $_POST['id'] ?? '';

if ($id == '') {
    echo "Invalid request!";
    exit();
}

mysqli_query($conn,
    "UPDATE entries 
     SET exit_time = NOW(), status = 'Exited'
     WHERE id = '$id'"
);

echo "Exit Marked Successfully!";
?>