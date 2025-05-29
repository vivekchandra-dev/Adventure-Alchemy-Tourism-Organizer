<?php
// Include your database connection
include('DBConnection.php');

// Check if the search term is provided
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `packages` WHERE `title` LIKE ?");
    $stmt->bind_param('s', $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch and return the results as JSON
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    // If no search term is provided, return an empty array
    echo json_encode([]);
}

// Close the database connection
$stmt->close();
$conn->close();
?>
