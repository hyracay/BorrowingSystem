<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("src/db_conn.php");

    // Get the equipment code from the POST request
    $equipmentCode = $_POST['equipmentCode'];

    // Prepare the SQL DELETE query
    $query = "DELETE FROM equipment WHERE equipmentCode = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $equipmentCode);

    // Execute the query and return a response
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $stmt->close();
    $conn->close();
}