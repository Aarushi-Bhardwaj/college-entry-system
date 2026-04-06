<?php
include "connect.php";

$sql = "SELECT 
            e.college_id,
            e.entry_time,
            e.exit_time,
            e.status,
            p.name,
            p.faculty,
            p.vehicle_number
        FROM entries e
        LEFT JOIN persons p 
        ON e.college_id = p.college_id";

$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

        echo "<tr>";

        echo "<td>".($row['name'] ?? '')."</td>";
        echo "<td>".($row['college_id'] ?? '')."</td>";
        echo "<td>".($row['faculty'] ?? '')."</td>";
        echo "<td>".($row['vehicle_number'] ?? '')."</td>";
        echo "<td>".($row['entry_time'] ?? '')."</td>";
        echo "<td>".($row['exit_time'] ?? '')."</td>";
        echo "<td>".($row['status'] ?? '')."</td>";

        echo "<td>";
        if(($row['status'] ?? '') != "Exited"){
            echo "<button class='exit-btn' onclick=\"markExit('".$row['college_id']."')\">Exit</button>";
        } else {
            echo "Completed";
        }
        echo "</td>";

        echo "</tr>";
    }

} else {
    echo "<tr><td colspan='8'>No records found</td></tr>";
}
?>