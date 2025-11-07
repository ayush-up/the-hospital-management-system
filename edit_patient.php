<html>
<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Patient</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM patients WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

    <form action="edit_patient.php?id=<?php echo $id; ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Age: <input type="text" name="age" value="<?php echo $row['age']; ?>"><br>
        Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
        <input type="submit" name="submit" value="Update Patient">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];

        $sql = "UPDATE patients SET name='$name', age='$age', address='$address' WHERE id=$id";

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