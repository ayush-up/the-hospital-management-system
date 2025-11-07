<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM staff WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: staff.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>