<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>College Entry System</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f6f9;
        }

        .header {
            text-align: center;
            padding: 20px;
        }

        .logo {
            width: 80px;
        }

        .container {
            width: 90%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        input, select {
            padding: 8px;
            margin: 8px;
        }

        button {
            padding: 8px 15px;
            margin: 8px;
            cursor: pointer;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th {
            background: #1e3c72;
            color: white;
            padding: 10px;
        }

        td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="header">
    <img src="logo.png" class="logo">
    <h2>College Entry & Exit Management System</h2>
</div>

<div class="container">

    <h3>Entry Form</h3>

    <input type="text" id="name" placeholder="Name">
    <input type="text" id="college_id" placeholder="College ID">

    <select id="vehicle_type">
        <option value="">Vehicle Type</option>
        <option value="Car">Car</option>
        <option value="Bike">Bike</option>
    </select>

    <input type="text" id="vehicle_number" placeholder="Car Number">

    <select id="faculty">
        <option value="">Faculty?</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <br>

    <button onclick="savePerson()">Save Person</button>

    <hr>

    <h3>Current Records</h3>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Faculty</th>
            <th>Car No</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM persons");

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['college_id']."</td>";
            echo "<td>".$row['faculty']."</td>";
            echo "<td>".$row['vehicle_number']."</td>";
            echo "</tr>";
        }
        ?>
    </table>

</div>

<!-- 🔥 JS INSIDE HTML (NO ERROR NOW) -->
<script>

function savePerson() {

    let name = document.getElementById("name").value;
    let college_id = document.getElementById("college_id").value;
    let vehicle_type = document.getElementById("vehicle_type").value;
    let vehicle_number = document.getElementById("vehicle_number").value;
    let faculty = document.getElementById("faculty").value;

    fetch("savePerson.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "name=" + name +
              "&college_id=" + college_id +
              "&vehicle_type=" + vehicle_type +
              "&vehicle_number=" + vehicle_number +
              "&faculty=" + faculty
    })
    .then(res => res.text())
    .then(data => {
        alert(data);
        location.reload();
    });
}

</script>

</body>
</html>