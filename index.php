<?php
include('includes/db.php');

// Query to fetch all SCP records
$sql = "SELECT * FROM scp_entries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Foundation Records</title>
    <!-- Bootstrap CSS (Latest version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6; /* Light background */
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        header {
            background-color: #2c3e50; /* Dark header */
            color: white;
            text-align: center;
            padding: 30px;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #34495e; /* Dark footer */
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
        .container {
            max-width: 1200px;
            margin-top: 40px;
        }
        .btn-custom {
            background-color: #3498db; /* Custom blue button */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #2980b9;
        }
        .table {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 15px;
            text-align: left;
        }
        table th {
            background-color: #8e44ad; /* Purple header */
            color: white;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        table tbody tr:nth-child(even) {
            background-color: #ecf0f1;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
        .action-btns a {
            background-color: #16a085;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .action-btns a:hover {
            background-color: #1abc9c;
        }
        .add-button {
            color: #e74c3c;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1>SCP Foundation Records</h1>
    
</header>

<div class="container">
    <h2 class="my-4">SCP Entries</h2>

    <!-- SCP Records Table -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>SCP Number</th>
                <th>Object Class</th>
                <th>Containment Procedures</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['scp_number']; ?></td>
                    <td><?php echo $row['object_class']; ?></td>
                    <td><?php echo $row['containment_procedures']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td class="action-btns">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Add New SCP Button (Moved to bottom) -->
    <div class="add-button">
        <a href="create.php" class="btn btn-custom btn-lg">Add New SCP</a>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 SCP Foundation. Created by Yash Saini.</p>
</footer>

<!-- Bootstrap JS (Optional for additional functionality like modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>
