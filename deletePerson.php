<?php
include "connect.php";

$college_id = $_POST['college_id'] ?? '';

if ($college_id == '') {
    echo "No person selected!";
    exit;
}

/* Check if person exists */
$check = mysqli_query($conn,
    "SELECT * FROM persons WHERE college_id='$college_id'"
);

if (mysqli_num_rows($check) == 0) {
    echo "Person not found!";
    exit;
}

/* Delete from entries first (important) */
mysqli_query($conn,
    "DELETE FROM entries WHERE college_id='$college_id'"
);

/* Delete from persons */
mysqli_query($conn,
    "DELETE FROM persons WHERE college_id='$college_id'"
);

echo "Person deleted successfully!";
?>
