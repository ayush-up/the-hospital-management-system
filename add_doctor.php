<html>
<head>
    <title>Add Doctor</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Doctor</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <form action="add_doctor.php" method="post">
        Name: <input type="text" name="name"><br>
        Specialization: <input type="text" name="specialization"><br>
        <input type="submit" name="submit" value="Add Doctor">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        include 'db.php';
        $name = $_POST['name'];
        $specialization = $_POST['specialization'];

        $sql = "INSERT INTO doctors (name, specialization) VALUES ('$name', '$specialization')";

        if ($conn->query($sql) === TRUE) {
            header("Location: doctors.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</div>

</body>
</html>