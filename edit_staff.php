<html>
<head>
    <title>Edit Staff</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Staff</h2>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="staff.php">Staff</a>
    </div>

    <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM staff WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

    <form action="edit_staff.php?id=<?php echo $id; ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Role: <input type="text" name="role" value="<?php echo $row['role']; ?>"><br>
        <input type="submit" name="submit" value="Update Staff">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $role = $_POST['role'];

        $sql = "UPDATE staff SET name='$name', role='$role' WHERE id=$id";

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