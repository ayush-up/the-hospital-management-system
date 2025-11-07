<html>
<head>
    <title>Patients</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Patients</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <a class="add-link" href="add_patient.php">Add Patient</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Status</th>
            <th>Admission Date</th>
            <th>Discharge Date</th>
            <th>Action</th>
        </tr>

        <?php
        include 'db.php';
        $sql = "SELECT * FROM patients";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>" . ($row['discharged_at'] ? $row['discharged_at'] : 'N/A') . "</td>";
                echo "<td class='action-links'>";
                if ($row['status'] == 'Admitted') {
                    echo "<a href='edit_patient.php?id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='delete_patient.php?id=" . $row['id'] . "'>Delete</a> | ";
                    echo "<a href='discharge_patient.php?id=" . $row['id'] . "'>Discharge</a>";
                } else {
                    echo "Discharged";
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>0 results</td></tr>";
        }
        $conn->close();
        ?>

    </table>
</div>

</body>
</html>