<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM scp_entries WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $scp_number = $_POST['scp_number'];
    $object_class = $_POST['object_class'];
    $containment_procedures = $_POST['containment_procedures'];
    $description = $_POST['description'];

    $sql = "UPDATE scp_entries SET 
            scp_number='$scp_number', 
            object_class='$object_class', 
            containment_procedures='$containment_procedures', 
            description='$description'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SCP Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Edit SCP Record</h1>
    <form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="scp_number">SCP Number</label>
            <input type="text" class="form-control" id="scp_number" name="scp_number" value="<?php echo $row['scp_number']; ?>" required>
        </div>
        <div class="form-group">
            <label for="object_class">Object Class</label>
            <input type="text" class="form-control" id="object_class" name="object_class" value="<?php echo $row['object_class']; ?>" required>
        </div>
        <div class="form-group">
            <label for="containment_procedures">Containment Procedures</label>
            <textarea class="form-control" id="containment_procedures" name="containment_procedures" rows="3" required><?php echo $row['containment_procedures']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update SCP Record</button>
    </form>
</div>
</body>
</html>

<?php $conn->close(); ?>
