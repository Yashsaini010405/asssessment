<?php
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $scp_number = $_POST['scp_number'];
    $object_class = $_POST['object_class'];
    $containment_procedures = $_POST['containment_procedures'];
    $description = $_POST['description'];

    $sql = "INSERT INTO scp_entries (scp_number, object_class, containment_procedures, description) VALUES ('$scp_number', '$object_class', '$containment_procedures', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New SCP Record Added Successfully!</div>";
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
<title>Add New SCP Record</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<style>
        body {
            background-color: #1a1a1a; /* Dark background */
            font-family: 'Arial', sans-serif;
            color: #f4f4f4; /* Light text color for contrast */
        }
        header {
            background-color: #333; /* Dark header */
            color: #f4f4f4;
            text-align: center;
            padding: 30px;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        footer {
            background-color: #222; /* Dark footer */
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
        .container {
            max-width: 800px;
            margin-top: 40px;
        }
        .btn-submit {
            background-color: #3498db; /* Custom blue button */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #2980b9;
        }
        .form-group label {
            color: #f4f4f4;
        }
        .form-control {
            background-color: #34495e; /* Dark form fields */
            color: #f4f4f4;
            border-radius: 5px;
            border: none;
        }
        .form-control:focus {
            background-color: #2c3e50;
            border: 1px solid #3498db;
            color: white;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
<h1>Add New SCP Record</h1>
</header>

<div class="container">
    <!-- Success/Error Message -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <div class="alert alert-success">
            New SCP Record Added Successfully!
        </div>
    <?php } ?>
    <form method="POST" action="create.php">
        <div class="form-group">
            <label for="scp_number">SCP Number</label>
            <input type="text" class="form-control" id="scp_number" name="scp_number" required>
        </div>
        <div class="form-group">
            <label for="object_class">Object Class</label>
            <input type="text" class="form-control" id="object_class" name="object_class" required>
        </div>
        <div class="form-group">
            <label for="containment_procedures">Containment Procedures</label>
            <textarea class="form-control" id="containment_procedures" name="containment_procedures" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-submit btn-lg btn-block">Add SCP Record</button>
    </form>
</div>

<footer>
<p>Created by Yash Saini - A30084179</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>
