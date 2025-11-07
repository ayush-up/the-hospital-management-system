<html>
<head>
    <title>Add Staff</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Staff</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <form action="add_staff.php" method="post">
        Name: <input type="text" name="name"><br>
        Role: <input type="text" name="role"><br>
        <input type="submit" name="submit" value="Add Staff">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        include 'db.php';
        $name = $_POST['name'];
        $role = $_POST['role'];

        $sql = "INSERT INTO staff (name, role) VALUES ('$name', '$role')";

        if ($conn->query($sql) === TRUE) {
            header("Location: staff.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</div>

</body>
</html>