<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM patients WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: patients.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>