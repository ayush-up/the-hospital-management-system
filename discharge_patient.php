<?php
include 'db.php';
$id = $_GET['id'];

$sql = "UPDATE patients SET status = 'Discharged', discharged_at = NOW() WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: patients.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>