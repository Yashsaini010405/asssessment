<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM scp_entries WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>SCP Record Deleted Successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

$conn->close();
header("Location: index.php");
exit;
?>
