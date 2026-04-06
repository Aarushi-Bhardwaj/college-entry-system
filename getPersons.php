<?php
include "connect.php";

/* Check connection */
if (!$conn) {
    die("Database connection failed!");
}

$result = mysqli_query($conn, "SELECT name, college_id FROM persons ORDER BY name ASC");

echo '<option value="">Select Person</option>';

if ($result && mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        $name = htmlspecialchars($row['name']);
        $college_id = htmlspecialchars($row['college_id']);

        echo '<option value="'.$college_id.'">'.$name.' ('.$college_id.')</option>';
    }

} else {
    echo '<option value="">No Persons Found</option>';
}
?>