<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "Admin/*2021@#";
$dbname = "arcadia_zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

$data = json_decode(file_get_contents('php://input'), true);
$cardId = $data['cardId'];
$likeCount = $data['likeCount'];

$sql = "UPDATE animaux SET likes = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $likeCount, $cardId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update like count']);
}

$stmt->close();
$conn->close();
?>