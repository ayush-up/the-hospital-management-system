<html>
<head>
    <title>Add Patient</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Patient</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <form action="add_patient.php" method="post">
        Name: <input type="text" name="name"><br>
        Age: <input type="text" name="age"><br>
        Address: <input type="text" name="address"><br>
        <input type="submit" name="submit" value="Add Patient">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        include 'db.php';
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];

        $sql = "INSERT INTO patients (name, age, address, status) VALUES ('$name', '$age', '$address', 'Admitted')";

        if ($conn->query($sql) === TRUE) {
            header("Location: patients.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</div>

</body>
</html>