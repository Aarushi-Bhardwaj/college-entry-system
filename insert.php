<?php
include "connect.php";

$college_id = $_POST['college_id'] ?? '';

if ($college_id == '') {
    echo "College ID missing!";
    exit;
}

/* Check if person exists */
$checkPerson = mysqli_query($conn,
    "SELECT * FROM persons WHERE college_id='$college_id'"
);

if (mysqli_num_rows($checkPerson) == 0) {
    echo "Person not found!";
    exit;
}

/* Check if already inside */
$checkInside = mysqli_query($conn,
    "SELECT * FROM entries 
     WHERE college_id='$college_id' 
     AND status='Inside'"
);

if (mysqli_num_rows($checkInside) > 0) {
    echo "Person already inside!";
    exit;
}

/* Insert Entry */
mysqli_query($conn,
    "INSERT INTO entries (college_id, entry_time, status)
     VALUES ('$college_id', NOW(), 'Inside')"
);

echo "Entry marked successfully!";
?>