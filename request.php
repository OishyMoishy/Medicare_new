<?php
// Include database connection
include 'database.php';

// Handle Approve Request
if (isset($_POST['approve_requestid']) && isset($_POST['appointment_time'])) {
    $requestId = $_POST['approve_requestid'];
    $appointmentTime = $_POST['appointment_time'];

    // Update the request with the approved appointment time
    $sql = "UPDATE request SET appointment_time = ? WHERE requestid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $appointmentTime, $requestId);
        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Request approved successfully!</p>";
        } else {
            echo "<p>Error approving request.</p>";
        }
        mysqli_stmt_close($stmt);
    }
}

// Handle Delete Request
if (isset($_POST['delete_requestid'])) {
    $requestId = $_POST['delete_requestid'];

    // Delete the request
    $sql = "DELETE FROM request WHERE requestid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $requestId);
        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Request deleted successfully!</p>";
        } else {
            echo "<p>Error deleting request.</p>";
        }
        mysqli_stmt_close($stmt);
    }
}

// Fetch all user requests
$sql = "SELECT 
            r.requestid, 
            a.name AS username, 
            r.category, 
            r.docname, 
            r.day
        FROM request r
        JOIN appoint a ON r.userid = a.id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requests</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .action-buttons form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>User Requests</h1>

    <!-- Display Requests -->
    <h2>All User Requests</h2>
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Username</th>
                    <th>Doctor Category</th>
                    <th>Doctor Name</th>
                    <th>Requested Day</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['requestid']); ?></td>
                        <td><?= htmlspecialchars($row['username']); ?></td>
                        <td><?= htmlspecialchars($row['category']); ?></td>
                        <td><?= htmlspecialchars($row['docname']); ?></td>
                        <td><?= htmlspecialchars($row['day']); ?></td>
                        <td class="action-buttons">
                            <!-- Approve Form -->
                            <form method="POST">
                                <input type="hidden" name="approve_requestid" value="<?= $row['requestid']; ?>">
                                <input type="time" name="appointment_time" required>
                                <button type="submit">Approve</button>
                            </form>

                            <!-- Delete Form -->
                            <form method="POST">
                                <input type="hidden" name="delete_requestid" value="<?= $row['requestid']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No requests found.</p>
    <?php endif; ?>

    <?php
    // Close database connection
    mysqli_close($conn);
    ?>
</body>
</html>
