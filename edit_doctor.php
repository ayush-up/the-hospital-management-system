<html>
<head>
    <title>Edit Doctor</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Doctor</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM doctors WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

    <form action="edit_doctor.php?id=<?php echo $id; ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Specialization: <input type="text" name="specialization" value="<?php echo $row['specialization']; ?>"><br>
        <input type="submit" name="submit" value="Update Doctor">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $specialization = $_POST['specialization'];

        $sql = "UPDATE doctors SET name='$name', specialization='$specialization' WHERE id=$id";

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