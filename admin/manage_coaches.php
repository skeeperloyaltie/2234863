<?php
// Add your database connection code here
// Replace with your actual database connection details
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example: Retrieve coaches from the database
$sql = "SELECT * FROM coaches";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Coaches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+ZmePMpZ5MvsV5AeInzlc5fWny5Cce5m1FvB6Eom7Fd5t4aS" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Coaches</div>
                    <div class="card-body">
                        <a href="admin_dashboard.php" class="btn btn-secondary mb-3">Back to Dashboard</a>

                        <!-- Display coaches from the database -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Biography</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Loop through the retrieved coaches and display them
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["biography"] . "</td>";
                                        // Add edit and delete buttons with appropriate links or actions
                                        echo "<td><a href='edit_coach.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a> <a href='delete_coach.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No coaches found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
