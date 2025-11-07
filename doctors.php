<html>
<head>
    <title>Doctors</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Doctors</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <a class="add-link" href="add_doctor.php">Add Doctor</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Specialization</th>
            <th>Action</th>
        </tr>

        <?php
        include 'db.php';
        $sql = "SELECT * FROM doctors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['specialization'] . "</td>";
                echo "<td class='action-links'><a href='edit_doctor.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_doctor.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        $conn->close();
        ?>

    </table>
</div>

</body>
</html>