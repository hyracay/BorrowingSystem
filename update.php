
<?php
include("src/db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipmentCode = $_POST['equipmentCode'];
    $equipmentName = $_POST['equipmentName'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    // SQL query to update the equipment details
    $sql = "UPDATE equipment SET 
            equipmentName = ?, 
            brand = ?, 
            category = ?, 
            status = ? 
            WHERE equipmentCode = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $equipmentName, $brand, $category, $status, $equipmentCode);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
?>